<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/student', function () {
//     return view('display_student');
// });

Route::get('/student', [StudentController::class, 'index']);
Route::get('/teachers', [TeacherController::class, 'loadAllTeachers']);
Route::get('/add/teacher', [TeacherController::class, 'loadTeacherForm']);
Route::post('/add/teacher', [TeacherController::class, 'addTeacher'])->name('addTeacher');
Route::get('/delete/{id}', [TeacherController::class, 'deleteTeacher']);
Route::get('/edit/{id}', [TeacherController::class, 'loadEditTeacherForm']);
Route::post('/edit/teacher', [TeacherController::class, 'editTeacher'])->name('editTeacher');