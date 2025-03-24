<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');

Route::post('register', [AuthController::class, 'postRegister']);
Route::post('login', [AuthController::class, 'postLogin']);
Route::post('logout', [AuthController::class, 'postLogout'])->middleware('auth')->name('logout');

// task 
Route::get('task', [TaskController::class, 'index'])->name('task');
Route::post('dashboard', [TaskController::class, 'store'])->middleware('auth');
Route::delete('task/{task}', [TaskController::class, 'destroy'])->name('deleteTask');