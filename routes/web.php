<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
})->middleware('auth');

//Login Route
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login-fill', [AuthController::class, 'loginFill'])->middleware('guest');
//regsiter Route
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');
Route::post('/register-fill', [AuthController::class, 'registerFill'])->middleware('guest');
//Logout route
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

//Student Section
Route::get('/student', [StudentController::class, 'student'])->middleware('auth');
Route::get('/student/{id}', [StudentController::class, 'details'])->middleware(['auth', 'only-admin-and-teacher']);
Route::get('/student-add', [StudentController::class, 'create'])->middleware(['auth', 'only-admin-and-teacher']);
Route::post('/students', [StudentController::class, 'insert'])->middleware(['auth', 'only-admin-and-teacher']);
Route::put('student-edit/{id}', [StudentController::class, 'edit'])->middleware(['auth', 'only-admin-and-teacher']);
Route::get('student-del/{id}', [StudentController::class, 'del'])->middleware(['auth', 'only-admin']);
Route::delete('student-delete/{id}', [StudentController::class, 'delete'])->middleware(['auth', 'only-admin']);
Route::get('/student-deleted', [StudentController::class, 'deleted'])->middleware(['auth', 'only-admin']);
Route::get('/student/{id}/restore', [StudentController::class, 'restore'])->middleware(['auth', 'only-admin']);

//Class Section
Route::get('/class', [ClassController::class, 'class'])->middleware('auth');
Route::get('/class/{id}', [ClassController::class, 'details'])->middleware(['auth', 'only-admin-and-teacher']);
Route::get('/class/student/{id}', [StudentController::class, 'details'])->middleware(['auth', 'only-admin-and-teacher']);
Route::get('/class-add', [ClassController::class, 'create'])->middleware(['auth', 'only-admin-and-teacher']);

//Extracurricular Section
Route::get('/extracurricular', [ExtracurricularController::class, 'index'])->middleware('auth');
Route::get('/extracurricular/{id}', [ExtracurricularController::class, 'details'])->middleware(['auth', 'only-admin-and-teacher']);

//Teacher Section
Route::get('/teacher', [TeacherController::class, 'index'])->middleware('auth');
Route::get('/teacher/{id}', [TeacherController::class, 'details'])->middleware(['auth', 'only-admin-and-teacher']);

Route::get('/student-mass-update', [StudentController::class, 'massUpdate']);