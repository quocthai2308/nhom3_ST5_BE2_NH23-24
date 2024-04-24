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


//chức năng thích
Route::post('/like', [HomeController::class, 'addLike'])->name('like.store');
Route::post('/get-like-status', [LikeController::class, 'getLikeStatus'])->name('getLikeStatus');
Route::get('/my-wishlist', [LikeController::class, 'getLikeList'])->name('myWishList');

// Khi người dùng truy cập '/', họ sẽ được chuyển hướng ngay lập tức đến trang đăng nhập.
// Route::get('/', function () {
//     return view('home');
// });

Route::get('/myAccount', function () {
    return view('myAccount');
});
/// test load view
Route::get('/manage-blog', function () {
    return view('admin.manage-blog');
});


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










