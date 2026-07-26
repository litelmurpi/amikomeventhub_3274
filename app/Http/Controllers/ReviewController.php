<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function store(Request $request, $slug)
    {
        // Validasi input form
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $event = Event::where('slug', $slug)->firstOrFail();
        $user = Auth::user();

        // Validasi 1: Event sudah lewat tanggalnya
        // Menggunakan waktu saat ini di server
        $eventDate = Carbon::parse($event->date);
        if (now()->lessThan($eventDate)) {
            return back()->with('error', 'Ulasan ditolak: Kamu baru bisa memberikan ulasan setelah event ini selesai.');
        }

        // Validasi 2: User punya transaksi Success untuk event ini
        $hasTicket = Transaction::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->where('status', 'success')
            ->exists();

        if (!$hasTicket) {
            return back()->with('error', 'Ulasan ditolak: Kamu harus memiliki tiket (transaksi sukses) untuk dapat memberikan ulasan.');
        }

        // Validasi 3: Belum pernah review event ini sebelumnya
        $hasReviewed = Review::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->exists();

        if ($hasReviewed) {
            return back()->with('error', 'Ulasan ditolak: Kamu sudah memberikan ulasan untuk event ini sebelumnya.');
        }

        // Jika semua validasi lolos, simpan Review ke database
        Review::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Terima kasih! Ulasan dan rating kamu berhasil dikirim.');
    }
}