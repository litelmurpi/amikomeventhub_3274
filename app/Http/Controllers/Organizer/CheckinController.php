<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Event;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

/**
 * Class CheckinController
 *
 * Handles Multi-Tenant Ticket Check-in & Gate Validation for Event Organizers.
 * Enforces Tenant Isolation so organizers can ONLY scan tickets of their own events.
 *
 * @package App\Http\Controllers\Organizer
 */
class CheckinController extends Controller
{
    /**
     * Display the check-in panel for the active organizer.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $org = $user->organization;

        if (!$org || !$org->isApproved()) {
            return redirect()->route('organizer.pending')
                ->with('error', 'Organisasi Anda belum diverifikasi oleh Superadmin.');
        }

        // Get all events owned by this organization
        $myEvents = Event::where('organization_id', $org->id)->get();
        $myEventIds = $myEvents->pluck('id');

        // Selected event filter (optional)
        $selectedEventId = $request->query('event_id');
        if ($selectedEventId !== null && !$myEventIds->contains((int) $selectedEventId)) {
            $selectedEventId = null;
        }
        $scopedEventIds = $selectedEventId ? [(int) $selectedEventId] : $myEventIds;

        // Statistics calculation for this organizer
        $totalSoldTickets = Transaction::whereIn('event_id', $scopedEventIds)
            ->where('status', 'Success')
            ->count();

        $totalCheckedIn = Transaction::whereIn('event_id', $scopedEventIds)
            ->where('status', 'Success')
            ->where('is_checked_in', true)
            ->count();

        // Recent check-in log
        $recentCheckins = Transaction::with('event')
            ->whereIn('event_id', $scopedEventIds)
            ->where('status', 'Success')
            ->where('is_checked_in', true)
            ->orderBy('checked_in_at', 'desc')
            ->limit(10)
            ->get();

        return view('organizer.checkin', compact(
            'org',
            'myEvents',
            'selectedEventId',
            'totalSoldTickets',
            'totalCheckedIn',
            'recentCheckins'
        ));
    }

    /**
     * Verify ticket code via Form POST (Manual Input).
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request): RedirectResponse
    {
        $request->validate([
            'ticket_code' => 'required|string',
        ]);

        $user = Auth::user();
        $org = $user->organization;
        $ticketCode = trim(strtoupper($request->ticket_code));

        $transaction = Transaction::with(['event.organization'])
            ->where('ticket_code', $ticketCode)
            ->first();

        // Guard 1: Ticket code exists?
        if (!$transaction) {
            return redirect()->back()
                ->with('error', "Kode Tiket [{$ticketCode}] tidak ditemukan di sistem.")
                ->withInput();
        }

        // Guard 2: Payment status Success?
        if ($transaction->status !== 'Success') {
            return redirect()->back()
                ->with('error', "Gagal Check-in: Transaksi untuk kode [{$ticketCode}] belum lunas (Status: {$transaction->status}).")
                ->withInput();
        }

        // Guard 3: TENANT ISOLATION CHECK
        // Check if the ticket's event belongs to the active organizer's organization
        if (!$transaction->event || $transaction->event->organization_id != $org->id) {
            $otherOrgName = $transaction->event->organization->name ?? 'Organisasi Lain';
            $eventTitle = $transaction->event->title ?? 'Event';

            return redirect()->back()
                ->with('error', "🚫 AKSES DITOLAK: Tiket [{$ticketCode}] ini milik event '{$eventTitle}' dari {$otherOrgName}. Anda hanya berhak memverifikasi tiket event milik {$org->name}.")
                ->withInput();
        }

        // Guard 4: Already checked in?
        if ($transaction->is_checked_in) {
            $formattedTime = Carbon::parse($transaction->checked_in_at)->format('d M Y, H:i');
            return redirect()->back()
                ->with('warning', "⚠️ PERHATIAN: Tiket [{$ticketCode}] sudah digunakan untuk Check-in pada {$formattedTime} oleh {$transaction->customer_name}.")
                ->withInput();
        }

        // Complete check-in process
        $transaction->update([
            'is_checked_in' => true,
            'checked_in_at' => now(),
        ]);

        return redirect()->back()
            ->with('success', "✓ Check-in Berhasil! Nama: {$transaction->customer_name} | Event: {$transaction->event->title}.");
    }

    /**
     * Verify ticket code via AJAX for real-time Camera QR Scanner.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function verifyAjax(Request $request): JsonResponse
    {
        $request->validate([
            'ticket_code' => 'required|string',
        ]);

        $user = Auth::user();
        $org = $user->organization;
        $ticketCode = trim(strtoupper($request->ticket_code));

        $transaction = Transaction::with(['event.organization'])
            ->where('ticket_code', $ticketCode)
            ->first();

        if (!$transaction) {
            return response()->json([
                'status' => 'error',
                'message' => "Kode Tiket [{$ticketCode}] tidak ditemukan di sistem.",
            ]);
        }

        if ($transaction->status !== 'Success') {
            return response()->json([
                'status' => 'error',
                'message' => "Gagal Check-in: Transaksi belum lunas (Status: {$transaction->status}).",
            ]);
        }

        // TENANT ISOLATION CHECK
        if (!$transaction->event || $transaction->event->organization_id != $org->id) {
            $otherOrgName = $transaction->event->organization->name ?? 'Organisasi Lain';
            $eventTitle = $transaction->event->title ?? 'Event';

            return response()->json([
                'status' => 'error',
                'message' => "🚫 AKSES DITOLAK: Tiket ini milik event '{$eventTitle}' oleh {$otherOrgName}. Anda hanya berhak memverifikasi tiket event milik {$org->name}.",
            ]);
        }

        if ($transaction->is_checked_in) {
            $formattedTime = Carbon::parse($transaction->checked_in_at)->format('d M Y, H:i');
            return response()->json([
                'status' => 'warning',
                'message' => "⚠️ PERHATIAN: Tiket [{$ticketCode}] sudah pernah di-scan pada {$formattedTime} oleh {$transaction->customer_name}.",
                'data' => [
                    'customer_name' => $transaction->customer_name,
                    'event_title' => $transaction->event->title ?? 'Event',
                    'checked_in_at' => $formattedTime,
                    'ticket_code' => $ticketCode,
                ]
            ]);
        }

        // Complete check-in process
        $transaction->update([
            'is_checked_in' => true,
            'checked_in_at' => now(),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => "Check-in Berhasil! Selamat Datang, {$transaction->customer_name}!",
            'data' => [
                'customer_name' => $transaction->customer_name,
                'event_title' => $transaction->event->title ?? 'Event',
                'ticket_code' => $ticketCode,
                'checked_in_at' => now()->format('d M Y, H:i'),
            ]
        ]);
    }
}
