<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\PromoCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class PaymentController
 *
 * Handles checkout form rendering, checkout AJAX requests, Midtrans transaction generation,
 * asynchronous webhook processing, and the checkout success page.
 *
 * @package App\Http\Controllers
 */
class PaymentController extends Controller
{
    /**
     * Set up Midtrans configuration using values from the config file.
     *
     * @return void
     */
    private function setupMidtrans(): void
    {
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds');
    }

    /**
     * Show the checkout page for the specified event.
     *
     * @param string $slug The unique identifier of the event.
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function create(string $slug): View|RedirectResponse
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        $serviceFee = config('midtrans.service_fee', 5000);

        // Guard: Check if the event is already over
        $eventDate = $event->getRawOriginal('date');
        if ($eventDate && \Carbon\Carbon::parse($eventDate)->startOfDay()->isPast()) {
            return redirect()->route('event-detail', $slug)
                ->with('error', 'Event sudah berakhir.');
        }

        // Guard: Check if ticket stock is depleted
        if ($event->stock <= 0) {
            return redirect()->route('event-detail', $slug)
                ->with('error', 'Maaf, tiket sudah habis.');
        }

        return view('checkout.create', compact('event', 'categories', 'serviceFee'));
    }

    /**
     * Validate the provided promo code against the event and user session.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function validatePromo(Request $request): JsonResponse
    {
        $request->validate([
            'code'     => 'required|string',
            'event_id' => 'required|exists:events,id',
        ]);

        $promo = PromoCode::where('code', strtoupper(trim($request->code)))->first();

        if (!$promo) {
            return response()->json([
                'valid'   => false,
                'message' => 'Kode promo tidak ditemukan.'
            ], 404);
        }

        $message = '';
        if (!$promo->isValidFor((int) $request->event_id, $message)) {
            return response()->json([
                'valid'   => false,
                'message' => $message
            ], 400);
        }

        $event = Event::find($request->event_id);
        $discountAmount = $promo->calculateDiscount((int) $event->price_value);

        return response()->json([
            'valid'           => true,
            'code'            => $promo->code,
            'type'            => $promo->type,
            'value'           => $promo->value,
            'discount_amount' => $discountAmount,
        ]);
    }

    /**
     * Process checkout request, create a pending transaction, and request a Midtrans Snap token.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $slug The unique identifier of the event.
     * @return \Illuminate\Http\JsonResponse
     */
    public function process(Request $request, string $slug): JsonResponse
    {
        // 1. Validate customer input credentials
        $request->validate([
            'customer_name'  => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'promo_code'     => 'nullable|string',
        ]);

        $event = Event::where('slug', $slug)->firstOrFail();

        // Guard: Check event date
        $eventDate = $event->getRawOriginal('date');
        if ($eventDate && \Carbon\Carbon::parse($eventDate)->startOfDay()->isPast()) {
            return response()->json([
                'message' => 'Event sudah berakhir'
            ], 400);
        }

        // Guard: Check stock
        if ($event->stock <= 0) {
            return response()->json([
                'message' => 'Maaf, tiket untuk event ini sudah habis.'
            ], 400);
        }

        // 2. Promo code verification logic
        $discountAmount = 0;
        $promoCode = null;

        if ($request->filled('promo_code')) {
            $promoCode = PromoCode::where('code', strtoupper(trim($request->promo_code)))->first();
            if ($promoCode) {
                $message = '';
                if ($promoCode->isValidFor($event->id, $message)) {
                    $discountAmount = $promoCode->calculateDiscount((int) $event->price_value);
                } else {
                    return response()->json([
                        'message' => 'Kode promo tidak valid: ' . $message
                    ], 400);
                }
            } else {
                return response()->json([
                    'message' => 'Kode promo tidak ditemukan.'
                ], 400);
            }
        }

        // 3. Prevent duplicate pending transactions for the same user and event (re-use within 24 hours)
        // Note: We check if the previous pending transaction used the SAME promo code configuration to prevent abuse
        $existingTransaction = Transaction::where('user_id', Auth::id())
            ->where('event_id', $event->id)
            ->where('status', 'Pending')
            ->where('promo_code', $promoCode ? $promoCode->code : null)
            ->where('created_at', '>', now()->subHours(24))
            ->whereNotNull('snap_token')
            ->first();

        if ($existingTransaction) {
            return response()->json([
                'snap_token' => $existingTransaction->snap_token,
                'order_id'   => $existingTransaction->order_id,
            ]);
        }

        // 4. Generate unique order ID
        $orderId = 'TRX-' . time() . '-' . strtoupper(Str::random(5));
        $serviceFee = config('midtrans.service_fee', 5000);
        
        // Calculate total price with discount applied. Price cannot drop below 0.
        $totalPrice = max(0, $event->price_value - $discountAmount + $serviceFee);

        // 5. Create Transaction record in database with initial status 'Pending'
        $transaction = Transaction::create([
            'event_id'        => $event->id,
            'user_id'         => Auth::id(),
            'order_id'        => $orderId,
            'customer_name'   => $request->customer_name,
            'customer_email'  => $request->customer_email,
            'customer_phone'  => $request->customer_phone,
            'total_price'     => $totalPrice,
            'status'          => 'Pending',
            'promo_code'      => $promoCode ? $promoCode->code : null,
            'discount_amount' => $discountAmount,
        ]);

        // 6. Build Midtrans Snap parameters
        $this->setupMidtrans();
        
        $itemDetails = [
            [
                'id'       => 'evt-' . $event->id,
                'price'    => (int) $event->price_value,
                'quantity' => 1,
                'name'     => substr($event->title, 0, 50),
            ],
            [
                'id'       => 'service-fee',
                'price'    => (int) $serviceFee,
                'quantity' => 1,
                'name'     => 'Biaya Layanan',
            ]
        ];

        // Append promo code discount as a negative item details
        if ($discountAmount > 0 && $promoCode) {
            $itemDetails[] = [
                'id'       => 'promo-' . $promoCode->code,
                'price'    => -(int) $discountAmount,
                'quantity' => 1,
                'name'     => 'Diskon: ' . $promoCode->code,
            ];
        }

        $params = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => (int) $totalPrice,
            ],
            'customer_details' => [
                'first_name' => $request->customer_name,
                'email'      => $request->customer_email,
                'phone'      => $request->customer_phone,
            ],
            'item_details' => $itemDetails,
        ];

        try {
            // Get snap token from Midtrans
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            
            // Save snap token to transaction record
            $transaction->update([
                'snap_token' => $snapToken,
            ]);

            return response()->json([
                'snap_token' => $snapToken,
                'order_id'   => $orderId,
            ]);
        } catch (\Exception $e) {
            // Log error and update transaction status to Expired/Failed if token creation fails
            $transaction->update([
                'status' => 'Expired'
            ]);

            return response()->json([
                'message' => 'Gagal terhubung dengan layanan pembayaran: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Handle asynchronous webhook notification from Midtrans.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function callback(Request $request): JsonResponse
    {
        $this->setupMidtrans();

        try {
            $notification = new \Midtrans\Notification();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal membaca payload notifikasi: ' . $e->getMessage()
            ], 400);
        }

        // Verify notification signature key for security
        $serverKey = config('midtrans.server_key');
        $calculatedSignature = hash(
            'sha512',
            $notification->order_id . $notification->status_code . $notification->gross_amount . $serverKey
        );

        if ($calculatedSignature !== $notification->signature_key) {
            return response()->json([
                'message' => 'Tanda tangan transaksi (Signature Key) tidak valid.'
            ], 403);
        }

        // Find the transaction record in our database
        $transaction = Transaction::where('order_id', $notification->order_id)->first();

        if (!$transaction) {
            return response()->json([
                'message' => 'Transaksi tidak ditemukan.'
            ], 404);
        }

        // Map Midtrans status to standard database status: 'Success', 'Pending', or 'Expired'
        $status = 'Pending';
        if ($notification->transaction_status === 'capture') {
            if ($notification->fraud_status === 'accept') {
                $status = 'Success';
            } else {
                $status = 'Pending';
            }
        } elseif ($notification->transaction_status === 'settlement') {
            $status = 'Success';
        } elseif (in_array($notification->transaction_status, ['deny', 'expire', 'cancel'])) {
            $status = 'Expired';
        }

        // Update database and adjust event stock based on mapped payment status
        if ($status === 'Success') {
            // Run a thread-safe database transaction with pessimistic locking
            DB::transaction(function () use ($transaction, $notification) {
                // Lock the event record to prevent race conditions on stock check
                $event = Event::lockForUpdate()->find($transaction->event_id);

                if (!$event) {
                    $transaction->update(['status' => 'Expired']);
                    return;
                }

                // If transaction is already successful, do nothing (idempotent webhook)
                if ($transaction->status === 'Success') {
                    return;
                }

                // Prevent negative stock
                if ($event->stock <= 0) {
                    $transaction->update([
                        'status' => 'Expired'
                    ]);
                    return;
                }

                // Decrement stock, update transaction status, and generate ticket code
                $event->decrement('stock');
                $transaction->update([
                    'status'       => 'Success',
                    'payment_type' => $notification->payment_type,
                    'ticket_code'  => Transaction::generateTicketCode(),
                ]);

                // Increment promo code used_count if a promo was used in the transaction
                if ($transaction->promo_code) {
                    $promo = PromoCode::where('code', $transaction->promo_code)->first();
                    if ($promo) {
                        $promo->increment('used_count');
                    }
                }
            });
        } elseif ($status === 'Expired') {
            $transaction->update([
                'status' => 'Expired',
            ]);
        }

        return response()->json([
            'status' => 'OK'
        ]);
    }

    /**
     * Render the payment success page and verify ownership of the transaction.
     * Includes active status pulling from Midtrans API as a fallback if webhook is delayed.
     *
     * @param string $order_id The unique order ID of the transaction.
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function success(string $order_id): View|RedirectResponse
    {
        $transaction = Transaction::where('order_id', $order_id)->firstOrFail();

        // Security Guard: Check if the logged-in user owns this transaction
        if ($transaction->user_id !== Auth::id()) {
            abort(403, 'Akses tidak sah ke detail transaksi ini.');
        }

        // Active Status Pulling Fallback: If status is still Pending, check status directly from Midtrans API
        if ($transaction->status === 'Pending') {
            $this->setupMidtrans();
            try {
                $status = \Midtrans\Transaction::status($order_id);
                
                $mappedStatus = 'Pending';
                if ($status->transaction_status === 'capture') {
                    if ($status->fraud_status === 'accept') {
                        $mappedStatus = 'Success';
                    }
                } elseif ($status->transaction_status === 'settlement') {
                    $mappedStatus = 'Success';
                } elseif (in_array($status->transaction_status, ['deny', 'expire', 'cancel'])) {
                    $mappedStatus = 'Expired';
                }

                if ($mappedStatus === 'Success') {
                    DB::transaction(function () use ($transaction, $status) {
                        $event = Event::lockForUpdate()->find($transaction->event_id);
                        
                        // Prevent race condition or duplicate stock decrement
                        if ($event && $transaction->status !== 'Success') {
                            if ($event->stock > 0) {
                                $event->decrement('stock');
                                $transaction->update([
                                    'status'       => 'Success',
                                    'payment_type' => $status->payment_type,
                                    'ticket_code'  => Transaction::generateTicketCode(),
                                ]);
                                
                                // Increment promo used count if a code was applied
                                if ($transaction->promo_code) {
                                    $promo = PromoCode::where('code', $transaction->promo_code)->first();
                                    if ($promo) {
                                        $promo->increment('used_count');
                                    }
                                }
                            } else {
                                $transaction->update([
                                    'status' => 'Expired'
                                ]);
                            }
                        }
                    });
                    $transaction->refresh();
                } elseif ($mappedStatus === 'Expired') {
                    $transaction->update([
                        'status' => 'Expired'
                    ]);
                    $transaction->refresh();
                }
            } catch (\Exception $e) {
                // Log warning and proceed to render view normally
                \Illuminate\Support\Facades\Log::warning("Midtrans Active Pulling failed: " . $e->getMessage());
            }
        }

        return view('payment-success', compact('transaction'));
    }
}
