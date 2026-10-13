<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Field;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('role', 'user')->first();
        $field = Field::first();

        if ($user && $field) {
            // Sample Booking
            $booking = Booking::firstOrCreate(
                ['booking_code' => 'WNG-20260930-001'],
                [
                    'user_id' => $user->id,
                    'field_id' => $field->id,
                    'booking_date' => now()->addDays(2)->format('Y-m-d'),
                    'start_time' => '19:00:00',
                    'end_time' => '21:00:00',
                    'total_price' => $field->price_per_hour * 2, // 2 Jam Sewa
                    'status' => 'paid',
                ]
            );

            // Sample Payment untuk Booking diatas
            Payment::firstOrCreate(
                ['booking_id' => $booking->id],
                [
                    'payment_method' => 'qris',
                    'payment_proof' => 'payments/proof-001.jpg',
                    'amount' => $booking->total_price,
                    'status' => 'verified',
                    'paid_at' => now(),
                ]
            );
        }
    }
}