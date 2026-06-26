<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

/**
 * Class Transaction
 *
 * Represents a payment transaction for an event ticket.
 *
 * @package App\Models
 *
 * @property int $id
 * @property int|null $event_id
 * @property int $user_id
 * @property string $order_id
 * @property string $customer_name
 * @property string $customer_email
 * @property string $customer_phone
 * @property int $total_price
 * @property string $status
 * @property string|null $snap_token
 * @property string|null $payment_type
 * @property string|null $ticket_code
 * @property bool $is_checked_in
 * @property \Illuminate\Support\Carbon|null $checked_in_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read \App\Models\Event|null $event
 * @property-read \App\Models\User $user
 */
class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'event_id',
        'user_id',
        'order_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'total_price',
        'status',
        'snap_token',
        'payment_type',
        'ticket_code',
        'is_checked_in',
        'checked_in_at',
        'promo_code',
        'discount_amount',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_checked_in' => 'boolean',
        'checked_in_at' => 'datetime',
    ];

    /**
     * Get the event associated with the transaction.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the user who made the transaction.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Generate a unique ticket code: EVT-XXXXX-XXXXX
     *
     * @return string
     */
    public static function generateTicketCode(): string
    {
        do {
            $code = 'EVT-' . strtoupper(Str::random(5)) . '-' . strtoupper(Str::random(5));
        } while (self::where('ticket_code', $code)->exists());

        return $code;
    }
}
