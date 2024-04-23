<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
<<<<<<< HEAD
use App\Http\Controllers\CartController;
=======
use App\Http\Controllers\LikeController;
>>>>>>> 4d40221a1898f9913b0811c8f831bb9f3f6cd54d

Route::post('/like', [HomeController::class, 'addLike'])->name('like.store');
Route::post('/get-like-status', [LikeController::class, 'getLikeStatus'])->name('getLikeStatus');

// Khi người dùng truy cập '/', họ sẽ được chuyển hướng ngay lập tức đến trang đăng nhập.
// Route::get('/', function () {
//     return view('home');
// });



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/{id}', [CartController::class, 'addToCart']);

// Đăng nhập
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

// Logout
Route::get('/logout', [LoginController::class, 'logout']);


// Đăng ký
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Giỏ hàng 
Route::get('/shopping-cart', [HomeController::class, 'shopping_cart'])->name('shopping-cart');
Route::get('/shopping-cart', [CartController::class, 'showCart']);
Route::get('/shopping-cart/{id}', [CartController::class, 'removeFromCart']);



// Các routes khác của bạn... Biết ời cái đó tui làm tạm tại chưa có login
//21/4
// Route::get('/', [HomeController::class,'index']);
 Route::get('search', [HomeController::class,'search']);
 Route::get('category/{categoryId}', [HomeController::class,'category']);
Route::get('detail/{id}', [HomeController::class,'detail']);








