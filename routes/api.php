<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\BookingController;
use App\Modules\Admin\Http\Controllers\AdminFieldController;

// Public Routes
Route::get('/fields', [FieldController::class, 'index']);
Route::get('/fields/{id}', [FieldController::class, 'show']);
Route::post('/bookings', [BookingController::class, 'store']);

// Admin Routes
Route::middleware(['auth:sanctum'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::patch('/fields/{field}/status', [AdminFieldController::class, 'toggleStatus'])
            ->name('fields.status');
    });