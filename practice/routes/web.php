<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home');
});
// Route::get('register', function () {
//     return view('register');
// });
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::get('dashboard', [AuthController::class, 'showDashboard'])->middleware('auth')->name('dashboard');

// post 
Route::post('register', [AuthController::class, 'makeRegister']);
Route::post('login', [AuthController::class, 'makeLogin']);
Route::post('logout', [AuthController::class, 'makeLogout'])->middleware('auth')->name('logout');

Route::get('task', [TaskController::class, 'index'])->name('task');
Route::post('dashboard', [TaskController::class, 'store'])->middleware('auth');

Route::get('edit_task/{task}', [TaskController::class, 'edit'])->name('editTask');
Route::put('edit_task/{task}', [TaskController::class, 'update'])->name('updateTask');
Route::delete('task/{task}', [TaskController::class, 'destroy'])->name('deleteTask');