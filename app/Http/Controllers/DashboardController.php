<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Data statistik simulasi (bisa diganti dengan query database Anda)
        $totalBooking = 24;
        $totalPendapatan = 4320000;
        $totalPengunjung = 18;
        $totalRating = 4.8;

        return view('dashboard', compact(
            'user',
            'totalBooking',
            'totalPendapatan',
            'totalPengunjung',
            'totalRating'
        ));
    }
}