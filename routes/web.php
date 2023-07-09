<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ExtracurricularController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/train', function() {
    return view('train');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/student', [StudentController::class, 'student']);
Route::get('/student/{id}', [StudentController::class, 'details']);
Route::get('/student-add', [StudentController::class, 'create']);
Route::post('/students', [StudentController::class, 'insert']);
Route::put('student-edit/{id}', [StudentController::class, 'edit']);
Route::get('student-del/{id}', [StudentController::class, 'del']);
Route::delete('student-delete/{id}', [StudentController::class, 'delete']);


Route::get('/class', [ClassController::class, 'class']);
Route::get('/class/{id}', [ClassController::class, 'details']);
Route::get('/class/student/{id}', [StudentController::class, 'details']);
Route::get('/class-add', [ClassController::class, 'create']);

Route::get('/extracurricular', [ExtracurricularController::class, 'index']);
Route::get('/extracurricular/{id}', [ExtracurricularController::class, 'details']);

Route::get('/teacher', [TeacherController::class, 'index']);
Route::get('/teacher/{id}', [TeacherController::class, 'details']);

