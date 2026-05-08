<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'description',
        'description2',
        'date',
        'location',
        'price',
        'stock',
        'poster_path',
        'organizer_name',
        'organizer_initials',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageAttribute()
    {
        return $this->poster_path;
    }

    // Rename to getPriceAttribute so $event['price'] returns the formatted string
    public function getPriceAttribute($value)
    {
        if ($value == 0) {
            return 'Gratis';
        }
        return 'Rp ' . number_format($value, 0, ',', '.');
    }

    // Original raw price if needed
    public function getPriceValueAttribute()
    {
        return $this->attributes['price'];
    }

    public function getCategoryNameAttribute()
    {
        return $this->category->name ?? 'Uncategorized';
    }


    // Standard date format if needed by view
    // The previous array had "16 November 2024"
    public function getDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->translatedFormat('d F Y');
    }
}
