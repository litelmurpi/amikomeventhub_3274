<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class CheckinController
 *
 * Handles the ticket check-in and attendance validation system for admins/staff.
 *
 * @package App\Http\Controllers\Admin
 */
class CheckinController extends Controller
{
    /**
     * Display the check-in verification panel dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        // Calculate check-in statistics
        $totalSoldTickets = Transaction::where('status', 'Success')->count();
        $totalCheckedIn = Transaction::where('status', 'Success')->where('is_checked_in', true)->count();

        // Get the latest 10 check-ins
        $recentCheckins = Transaction::with('event')
            ->where('status', 'Success')
            ->where('is_checked_in', true)
            ->orderBy('checked_in_at', 'desc')
            ->limit(10)
            ->get();

        return view('admin.checkin', compact('totalSoldTickets', 'totalCheckedIn', 'recentCheckins'));
    }

    /**
     * Verify the scanned or typed ticket code and register check-in.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request): RedirectResponse
    {
        $request->validate([
            'ticket_code' => 'required|string',
        ]);

        $ticketCode = trim(strtoupper($request->ticket_code));

        // Find the transaction by ticket code
        $transaction = Transaction::with('event')
            ->where('ticket_code', $ticketCode)
            ->first();

        // Guard: Check if transaction exists
        if (!$transaction) {
            return redirect()->back()
                ->with('error', "Kode Tiket [{$ticketCode}] tidak ditemukan.")
                ->withInput();
        }

        // Guard: Check payment status
        if ($transaction->status !== 'Success') {
            return redirect()->back()
                ->with('error', "Gagal Check-in: Transaksi untuk kode [{$ticketCode}] belum lunas (Status: {$transaction->status}).")
                ->withInput();
        }

        // Guard: Check if already checked in
        if ($transaction->is_checked_in) {
            $formattedTime = Carbon::parse($transaction->checked_in_at)->format('d M Y, H:i');
            return redirect()->back()
                ->with('warning', "Perhatian: Tiket [{$ticketCode}] sudah digunakan untuk Check-in pada {$formattedTime} oleh {$transaction->customer_name}.")
                ->withInput();
        }

        // Complete check-in process
        $transaction->update([
            'is_checked_in' => true,
            'checked_in_at' => now(),
        ]);

        $eventTitle = $transaction->event->title ?? 'Event';

        return redirect()->back()
            ->with('success', "✓ Check-in Berhasil! Nama: {$transaction->customer_name} | Acara: {$eventTitle}.");
    }
}
