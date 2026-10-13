<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::view('settings/profile', 'pages.settings.⚡profile')
        ->name('profile.edit');

    Route::view('settings/appearance', 'pages.settings.⚡appearance')
        ->name('appearance.edit');

    Route::view('settings/security', 'pages.settings.⚡security')
        ->name('security.edit');
});