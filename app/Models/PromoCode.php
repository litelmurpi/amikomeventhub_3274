<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Class PromoCode
 *
 * Represents a discount promo code that can be applied to ticket purchases.
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $code
 * @property string $type
 * @property int $value
 * @property int|null $event_id
 * @property int $max_uses
 * @property int $used_count
 * @property \Illuminate\Support\Carbon|null $valid_until
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property-read \App\Models\Event|null $event
 */
class PromoCode extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'type',
        'value',
        'event_id',
        'max_uses',
        'used_count',
        'valid_until',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active'   => 'boolean',
        'valid_until' => 'datetime',
    ];

    /**
     * Get the specific event this promo code is limited to, if any.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Check if the promo code is valid for use with the given event ID.
     *
     * @param int $eventId
     * @param string|null &$message Output parameter for error explanation.
     * @return bool
     */
    public function isValidFor(int $eventId, ?string &$message = ''): bool
    {
        // 1. Check status active
        if (!$this->is_active) {
            $message = 'Kode promo sudah tidak aktif.';
            return false;
        }

        // 2. Check expiration date
        if ($this->valid_until && $this->valid_until->isPast()) {
            $message = 'Masa berlaku kode promo telah habis.';
            return false;
        }

        // 3. Check usage limit
        if ($this->max_uses > 0 && $this->used_count >= $this->max_uses) {
            $message = 'Kuota penggunaan kode promo sudah habis.';
            return false;
        }

        // 4. Check event limitation
        if ($this->event_id !== null && $this->event_id !== $eventId) {
            $message = 'Kode promo ini tidak berlaku untuk event ini.';
            return false;
        }

        return true;
    }

    /**
     * Calculate the discount amount based on ticket price.
     *
     * @param int $ticketPrice
     * @return int
     */
    public function calculateDiscount(int $ticketPrice): int
    {
        if ($this->type === 'fixed') {
            return min($this->value, $ticketPrice);
        }

        if ($this->type === 'percent') {
            $discount = (int) (($ticketPrice * $this->value) / 100);
            return min($discount, $ticketPrice);
        }

        return 0;
    }
}
