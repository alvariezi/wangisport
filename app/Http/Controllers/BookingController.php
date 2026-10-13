<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    // Membuat reservasi / booking baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'field_id' => 'required|exists:fields,id',
            'booking_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'duration_hours' => 'required|integer|min:1',
        ]);

        $field = Field::findOrFail($request->field_id);
        $startTime = $request->start_time;
        $endTime = date('H:i:s', strtotime("+$request->duration_hours hour", strtotime($startTime)));

        // Cek Bentrok Jam Penyewaan Lapangan
        $isBooked = Booking::where('field_id', $field->id)
            ->where('booking_date', $request->booking_date)
            ->where('status', '!=', 'cancelled')
            ->where(function ($query) use ($startTime, $endTime) {
                $query->whereBetween('start_time', [$startTime, $endTime])
                      ->orWhereBetween('end_time', [$startTime, $endTime]);
            })->exists();

        if ($isBooked) {
            return response()->json([
                'status' => 'error',
                'message' => 'Jadwal pada jam tersebut sudah dipesan orang lain.'
            ], 422);
        }

        // Hitung Total Harga
        $totalPrice = $field->price_per_hour * $request->duration_hours;

        // Simpan Booking
        $booking = Booking::create([
            'booking_code' => 'WNG-' . strtoupper(Str::random(8)),
            'user_id' => $request->user_id,
            'field_id' => $field->id,
            'booking_date' => $request->booking_date,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Booking berhasil dibuat. Silakan lakukan pembayaran.',
            'data' => $booking
        ], 201);
    }
}