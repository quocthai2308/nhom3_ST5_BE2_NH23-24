<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
// reviews 
Route::post('/review', [HomeController::class, 'review'])->name('review');
Route::post('/rating', [HomeController::class, 'getAverageRating'])->name('rating');
Route::post('/count', [HomeController::class, 'countRV'])->name('count');


// này nè dùng để thêm hoặc bỏ admin á nhen 
Route::post('/make-admin/{user}', [UserController::class, 'makeAdmin'])->name('make-admin');
Route::post('/remove-admin/{user}', [UserController::class, 'removeAdmin'])->name('remove-admin');


//chức năng thích
Route::post('/like', [HomeController::class, 'addLike'])->name('like.store');
Route::post('/get-like-status', [LikeController::class, 'getLikeStatus'])->name('getLikeStatus');
Route::get('/my-wishlist', [LikeController::class, 'getLikeList'])->name('myWishList');

// chức năng blog
Route::get('/add-blog', [BlogController::class, 'addView'])->name('addBlog');
Route::get('/manage-blog', [BlogController::class, 'index'])->name('manage-blog');
Route::post('/store', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blog', [BlogController::class, 'blogIndex'])->name('blog-index');
Route::get('/blog-details/{id}', [BlogController::class, 'blogDetail'])->name('blog.detail');
Route::post('/send', [BlogController::class, 'comment'])->name('blog.comment');
Route::post('/get-comment', [BlogController::class, 'getComment'])->name('blog.getComment');

// Khi người dùng truy cập '/', họ sẽ được chuyển hướng ngay lập tức đến trang đăng nhập.
// Route::get('/', function () {
//     return view('home');
// });

//vô hiệu hóa tài khoảng 
Route::post('/deactivate-user/{id}', [UserController::class, 'deactivateUser'])->name('deactivate-user');
// web.php
Route::post('/user/{id}/deactivate', [UserController::class, 'deactivateUser'])->name('deactivate-user');
Route::post('/user/{id}/activate', [UserController::class, 'activateUser'])->name('activate-user');



Route::get('/myAccount', function () {
    return view('myAccount');
});
/// test load view

// Route cho AJAX pagination load trang 5 nguoi
Route::get('/ajax-users-page', [AdminController::class, 'ajaxUsersPage'])->name('ajax.users.page');

Route::get('/manage-user', [AdminController::class, 'index'])->name('manage-user');

Route::put('/user/update', [UserController::class, 'update'])->name('user.update');

// trang home
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
Route::post('/shopping-cart/update', [CartController::class, 'updateCart']);
Route::get('/shopping-cart/{id}', [CartController::class, 'removeFromCart']);
Route::get('/checkout', [CartController::class, 'checkout']);





// Các routes khác của bạn... Biết ời cái đó tui làm tạm tại chưa có login
//21/4
// Route::get('/', [HomeController::class,'index']);
 Route::get('search', [HomeController::class,'search']);
 Route::get('category/{categoryId}', [HomeController::class,'category']);
Route::get('detail/{id}', [HomeController::class,'detail']);


// CRUD sản phẩm
Route::get('/manage-product', [ProductController::class, 'index'])->name('manage-product');

// Hiển thị form
Route::get('/form-edit-product/{id}', [ProductController::class, 'showEditProduct'])->name('form-edit-product');
Route::get('/add-product', [ProductController::class, 'showAddProduct']);


// Thêm
Route::post('/product', [ProductController::class, 'add'])->name('product.add');

// Sửa
Route::put('/product/{id}', [ProductController::class, 'modify'])->name('product.modify');

// Xoá
Route::delete('/product/{id}', [ProductController::class, 'delete'])->name('product.delete');

// quản lý catelory
Route::get('/manage-category', [CategoryController::class, 'index']);
Route::get('/manage-category/page', [CategoryController::class, 'pageAddCategory']);
Route::get('/manage-category/add', [CategoryController::class, 'addCategory']);
Route::get('/edit-category', [CategoryController::class, 'index_edit']);










