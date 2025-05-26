<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('posts', 'posts')
    ->middleware(['auth', 'verified'])
    ->name('posts');

Route::view('reels', 'reels')
    ->middleware(['auth', 'verified'])
    ->name('reels');

Route::view('videos', 'videos')
    ->middleware(['auth', 'verified'])
    ->name('videos');

// Route::view('articles', 'articles')
//     ->middleware(['auth', 'verified'])
//     ->name('articles');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    Volt::route('articles', 'articles')->name('articles');
});

require __DIR__ . '/auth.php';
