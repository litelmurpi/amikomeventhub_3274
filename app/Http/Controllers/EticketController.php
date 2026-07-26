<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\View\View;

/**
 * Class EticketController
 *
 * Handles showing public e-tickets using a secure unique ticket code.
 *
 * @package App\Http\Controllers
 */
class EticketController extends Controller
{
    /**
     * Display the public e-ticket page for the specified ticket code.
     *
     * @param string $ticket_code The unique randomly generated ticket code.
     * @return \Illuminate\View\View
     */
    public function show(string $ticket_code): View
    {
        // Find the transaction with the matching ticket code and a successful payment status
        $transaction = Transaction::where('ticket_code', $ticket_code)
            ->where('status', 'Success')
            ->firstOrFail();

        return view('eticket', compact('transaction'));
    }
}
