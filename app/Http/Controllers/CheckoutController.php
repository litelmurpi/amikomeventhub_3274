<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function create($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        return view('checkout.create', compact('event', 'categories'));
    }

    public function store(Request $request, $slug)
    {
        // 1. Validasi Input Kredensial Pelanggan
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
        ]);

        $event = Event::where('slug', $slug)->firstOrFail();

        // 2. Cegah Check-out Jika Tiket Habis
        if ($event->stock <= 0) {
            return back()->with('error', 'Mohon maaf, tiket untuk acara ini sudah habis.');
        }

        // 3. Generate Kode TRX (Unik)
        $orderId = 'TRX-' . time() . '-' . Str::random(5);
        $totalPrice = $event->price_value + 5000; // Menambahkan biaya admin

        // 4. Merekam Transaksi ke Database
        $transaction = Transaction::create([
            'event_id' => $event->id,
            'user_id' => Auth::id(),
            'order_id' => $orderId,
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'total_price' => $totalPrice,
            'status' => 'Pending', // Status Awal
        ]);

        // 5. Arahkan ke rute dummy halaman sukses sementara
        // (Akan diubah di fase 2 menjadi integrasi Midtrans)
        return redirect('/');
    }
}
