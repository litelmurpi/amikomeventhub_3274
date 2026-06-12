<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        // echo "<pre>";
        // print_r(Auth::user()->id);
        // echo "</pre>";
        $tickets = Transaction::with('event')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(10);
            
        return view('user.tickets.index', compact('tickets'));
    }
}
