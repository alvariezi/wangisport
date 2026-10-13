<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Admin\Http\Controllers\AdminFieldController;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

Route::middleware(['auth', 'verified', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');

        Route::patch(
            '/fields/{field}/status',
            [AdminFieldController::class, 'toggleStatus']
        )->name('fields.status');
    });

require __DIR__.'/settings.php';