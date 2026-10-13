<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'sport_category_id',
        'name',
        'description',
        'price_per_hour',
        'image',
        'is_active',
    ];

    // Relasi: Lapangan milik satu Kategori
    public function category()
    {
        return $this->belongsTo(
            SportCategory::class,
            'sport_category_id'
        );
    }

    // Relasi: Lapangan memiliki banyak Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}