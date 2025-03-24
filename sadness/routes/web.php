<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
// Route::get('login', [UserController::class, 'index']);
// Route::post('login', [UserController::class, 'store']);
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::post('register', [AuthController::class, 'makeRegister']);
Route::post('login', [AuthController::class, 'makeLogin']);
Route::post('logout', [AuthController::class, 'makeLogout'])->middleware('auth')->name('logout');