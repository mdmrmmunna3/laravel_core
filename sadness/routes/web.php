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
// create task 
Route::post('dashboard', [TaskController::class, 'store'])->middleware('auth');
// edit task 
Route::get('editTask/{task}', [TaskController::class, 'edit'])->name('editTask');
Route::put('editTask/{task}', [TaskController::class, 'update'])->name('updateTask');
Route::delete('task/{task}', [TaskController::class, 'destroy'])->name('deleteTask');