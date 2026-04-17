<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_revenue' => '12.450.000',
            'tickets_sold' => '1.284',
            'active_events' => '8',
            'pending_orders' => '12'
        ];

        $transactions = [
            [
                'name' => 'Donni Prabowo',
                'email' => 'donni@example.com',
                'event' => 'Jazz Night 2024',
                'status' => 'Success',
                'total' => '155.000'
            ],
            [
                'name' => 'Maya Sari',
                'email' => 'maya@example.com',
                'event' => 'AI & Future Workshop',
                'status' => 'Pending',
                'total' => '455.000'
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'event' => 'Hackathon 2024',
                'status' => 'Free',
                'total' => '0'
            ],
        ];

        return view('admin.dashboard', compact('stats', 'transactions'));
    }

    public function events()
    {
        $events = [
            [
                'id' => 1,
                'title' => 'Jazz Night 2024',
                'category' => 'Musik',
                'date' => '16 Nov 2024',
                'price' => '150.000',
                'stock' => '42/100',
                'image' => 'assets/concert.png'
            ],
            [
                'id' => 2,
                'title' => 'AI & Future Workshop',
                'category' => 'Tech',
                'date' => '26 Oct 2024',
                'price' => '450.000',
                'stock' => '12/50',
                'image' => 'assets/workshop.png'
            ],
        ];

        return view('admin.events', compact('events'));
    }

    public function transactions()
    {
        $transactions = [
            [
                'id' => 'TRX-99210',
                'name' => 'Donni Prabowo',
                'email' => 'donni@example.com',
                'event' => 'Jazz Night 2024',
                'date' => '26 Mar 2024, 17:45',
                'status' => 'Success',
                'total' => '155.000'
            ],
            [
                'id' => 'TRX-99211',
                'name' => 'Maya Sari',
                'email' => 'maya@example.com',
                'event' => 'AI & Future Workshop',
                'date' => '26 Mar 2024, 15:20',
                'status' => 'Pending',
                'total' => '455.000'
            ],
            [
                'id' => 'TRX-99212',
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'event' => 'Hackathon 2024',
                'date' => '25 Mar 2024, 10:00',
                'status' => 'Free',
                'total' => '0'
            ],
        ];

        return view('admin.transactions', compact('transactions'));
    }
}
