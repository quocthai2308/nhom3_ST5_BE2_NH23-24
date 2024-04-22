<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Khi người dùng truy cập '/', họ sẽ được chuyển hướng ngay lập tức đến trang đăng nhập.
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Đăng nhập
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

// Đăng ký
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Các routes khác của bạn... Biết ời cái đó tui làm tạm tại chưa có login
//21/4
// Route::get('/', [HomeController::class,'index']);
 Route::get('search', [HomeController::class,'search']);
 Route::get('category/{categoryId}', [HomeController::class,'category']);
Route::get('detail/{id}', [HomeController::class,'detail']);

Route::post('/like', 'LikeController@store')->name('like.store');







