<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_code',
        'user_id',
        'field_id',
        'booking_date',
        'start_time',
        'end_time',
        'total_price',
        'status', // e.g., 'pending', 'paid', 'cancelled'
    ];

    // Relasi: Booking dilakukan oleh satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Booking ditujukan untuk satu Lapangan
    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    // Relasi: Booking memiliki satu Pembayaran
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}