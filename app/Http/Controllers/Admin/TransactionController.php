<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class TransactionController
 *
 * Handles management and reporting of transactions in the Admin Dashboard.
 *
 * @package App\Http\Controllers\Admin
 */
class TransactionController extends Controller
{
    /**
     * Display a listing of transactions, optionally filtered and searched.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request): View
    {
        $query = Transaction::with('event');

        // Filter by Search Query (Order ID, Customer Name, Email, or Ticket Code)
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('order_id', 'LIKE', "%{$search}%")
                  ->orWhere('customer_name', 'LIKE', "%{$search}%")
                  ->orWhere('customer_email', 'LIKE', "%{$search}%")
                  ->orWhere('ticket_code', 'LIKE', "%{$search}%");
            });
        }

        // Filter by Mapped Status ('Success', 'Pending', 'Expired')
        if ($request->has('status') && $request->status != '' && $request->status != 'Semua Status') {
            $query->where('status', $request->status);
        }

        // Get paginated transactions list
        $transactions = $query->latest()->paginate(20)->withQueryString();

        return view('admin.transactions.index', compact('transactions'));
    }

    /**
     * Manually expire pending transactions that are older than 24 hours.
     * Fallback mechanism for hosting setups that do not support cron jobs.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function expirePending(): RedirectResponse
    {
        $expiredCount = Transaction::where('status', 'Pending')
            ->where('created_at', '<', now()->subHours(24))
            ->update(['status' => 'Expired']);

        return redirect()->route('admin.transactions')
            ->with('success', "Berhasil membersihkan database. Sebanyak {$expiredCount} transaksi pending (lebih dari 24 jam) diubah menjadi kadaluarsa.");
    }
}
