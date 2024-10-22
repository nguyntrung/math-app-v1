<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route cho trang lý thuyết
Route::get('/lessons/theory', [LessonController::class, 'showTheory'])->name('lessons.theory');

// Route cho trang video bài giảng
Route::get('/lessons/videos', [LessonController::class, 'showVideos'])->name('lessons.videos');

// Route cho trang giải bài tập SGK
Route::get('/lessons/solutions', [LessonController::class, 'showSolutions'])->name('lessons.solutions');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login'); // Hiển thị form đăng nhập
Route::post('/login', [AuthController::class, 'login']); // Xử lý form đăng nhập
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register'); // Hiển thị form đăng ký
Route::post('/register', [AuthController::class, 'register']); // Xử lý form đăng ký
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // Xử lý đăng xuất
