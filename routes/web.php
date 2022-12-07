<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->middleware(['isAdmin','auth'])->group(function() {
    Route::get('/', [App\Http\Controllers\ProductController::class, 'adminlogin']);

    Route::get('/sanpham', [App\Http\Controllers\ProductController::class, 'viewindex'])->name('sanpham');

    Route::get('/suasanpham/{id}', [App\Http\Controllers\ProductController::class, 'suasp'])->name('suasp');

    Route::get('/suadanhmuc/{id}', [App\Http\Controllers\CategoryController::class, 'suadm'])->name('suadm');

    Route::get('/suathuonghieu/{id}', [App\Http\Controllers\BrandController::class, 'suath'])->name('suath');

    Route::get('/danhmuc', [App\Http\Controllers\CategoryController::class, 'viewdanhmuc'])->name('danhmuc');

    Route::get('/thuonghieu', [App\Http\Controllers\BrandController::class, 'viewthuonghieu'])->name('thuonghieu');

    Route::post('/suasanpham/{id}', [App\Http\Controllers\ProductController::class, 'sua'])->name('sua');

    Route::post('/suadanhmuc/{id}', [App\Http\Controllers\CategoryController::class, 'sua'])->name('sua');

    Route::post('/suathuonghieu/{id}', [App\Http\Controllers\BrandController::class, 'sua'])->name('sua');

    Route::get('/themsanpham', [App\Http\Controllers\ProductController::class, 'themsp'])->name('themsp');

    Route::get('/themdanhmuc', [App\Http\Controllers\CategoryController::class, 'themdm'])->name('themdm');

    Route::get('/themthuonghieu', [App\Http\Controllers\BrandController::class, 'themth'])->name('themth');

    Route::post('/themsanpham', [App\Http\Controllers\ProductController::class, 'them'])->name('them');

    Route::post('/themdanhmuc', [App\Http\Controllers\CategoryController::class, 'them'])->name('them');

    Route::post('/themthuonghieu', [App\Http\Controllers\BrandController::class, 'them'])->name('them');

    Route::get('/xoasanpham/{id}', [App\Http\Controllers\ProductController::class, 'xoa'])->name('xoasp');

    Route::get('/xoadanhmuc/{id}', [App\Http\Controllers\CategoryController::class, 'xoa'])->name('xoadm');

    Route::get('/xoathuonghieu/{id}', [App\Http\Controllers\BrandController::class, 'xoa'])->name('xoath');

    Route::get('/xoaspgiohang/{id}', [App\Http\Controllers\HomeController::class, 'xoaspgh'])->name('xoaspgh');

    Route::get('/donnhaphang', [App\Http\Controllers\HomeController::class, 'donnhaphang'])->name('donnhaphang');

    Route::get('/hoadon', [App\Http\Controllers\HomeController::class, 'hoadon'])->name('hoadon');

    Route::get('/thongke', [App\Http\Controllers\HomeController::class, 'thongke'])->name('thongke');
 
});

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/', [App\Http\Controllers\HomeController::class, 'addcart'])->name('addcart')->middleware(['auth']);
    Route::get('/cart', [App\Http\Controllers\HomeController::class, 'cart'])->name('cart')->middleware(['auth']);
    Route::post('/cart', [App\Http\Controllers\HomeController::class, 'buy'])->name('buy')->middleware(['auth']);

    Route::get('/search/category/{slug}', [App\Http\Controllers\HomeController::class, 'searchTH'])->name('searchDM');
    Route::get('/search/brand/{slug}', [App\Http\Controllers\HomeController::class, 'searchDM'])->name('searchTH');
    Route::get('/search/all/{slug}', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
    Route::get('/search', [App\Http\Controllers\HomeController::class, 'search2'])->name('search2');
    Route::post('/search/category/{slug}', [App\Http\Controllers\HomeController::class, 'addcart'])->name('addcart')->middleware(['auth']);
    Route::post('/search/brand/{slug}', [App\Http\Controllers\HomeController::class, 'addcart'])->name('addcart')->middleware(['auth']);
    Route::post('/search/all/{slug}', [App\Http\Controllers\HomeController::class, 'addcart'])->name('addcart')->middleware(['auth']);
    Route::post('/search', [App\Http\Controllers\HomeController::class, 'addcart'])->name('addcart')->middleware(['auth']);



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
