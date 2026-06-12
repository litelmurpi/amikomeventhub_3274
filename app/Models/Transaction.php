<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Transaction extends Model
{
    protected $fillable = [
        'event_id', 'user_id', 'order_id', 'customer_name', 'customer_email',
        'customer_phone', 'total_price', 'status', 'snap_token',
    ];

    protected $casts = [
        'is_checked_in' => 'boolean',
        'checked_in_at' => 'datetime',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generateTicketCode(): string
    {
        do {
            $code = 'EVT-' . strtoupper(Str::random(5)) . '-' . strtoupper(Str::random(5));
        } while (self::where('ticket_code', $code)->exists());
        return $code;
    }
}
