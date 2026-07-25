<?php

use App\Models\User;
use App\Models\Category;
use App\Models\Event;
use App\Models\Transaction;
use App\Mail\EventTicketMail;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('event ticket mail can be built and rendered correctly', function () {
    $user = User::factory()->create();
    $category = Category::create(['name' => 'Seminar', 'slug' => 'seminar']);
    
    $event = Event::create([
        'category_id' => $category->id,
        'title' => 'Web Development Seminar',
        'slug' => 'web-development-seminar',
        'date' => '2026-07-10 09:00:00',
        'location' => 'Amikom Yogyakarta',
        'price' => 50000,
        'stock' => 10,
        'organizer_name' => 'HIMA',
    ]);

    $transaction = Transaction::create([
        'event_id' => $event->id,
        'user_id' => $user->id,
        'order_id' => 'TRX-TEST-12345',
        'customer_name' => 'Test Customer',
        'customer_email' => 'customer@example.com',
        'customer_phone' => '08123456789',
        'total_price' => 55000,
        'status' => 'Success',
        'ticket_code' => 'EVT-ABCDE-12345',
    ]);

    $mailable = new EventTicketMail($transaction);

    $mailable->assertHasSubject('E-Ticket Resmi Anda: Web Development Seminar');
    $mailable->assertSeeInHtml('Test Customer');
    $mailable->assertSeeInHtml('Web Development Seminar');
    $mailable->assertSeeInHtml('EVT-ABCDE-12345');
    $mailable->assertSeeInHtml('Amikom Yogyakarta');
});
