<?php

use App\Livewire\CompanySetting;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::redirect('/', 'dashboard')->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('company-settings', CompanySetting::class)->name('company-settings');
    Route::view('departments-and-positions', 'admin.departments-and-positions')->name('departments-and-positions');
});

require __DIR__.'/auth.php';
