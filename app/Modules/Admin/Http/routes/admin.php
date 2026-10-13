<?php

use App\Modules\Admin\Http\Controllers\AdminFieldController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::patch('/fields/{field}/status', [AdminFieldController::class, 'toggleStatus'])
            ->name('fields.status');
    });