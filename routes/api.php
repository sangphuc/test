<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    dd($request);
    return $request->user();
});

Route::get('/sanpham', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('/danhmuc', [App\Http\Controllers\CategoryController::class, 'index']);
Route::get('/thuonghieu', [App\Http\Controllers\BrandController::class, 'index']);
Route::get('/chitietsanpham/{id}', [App\Http\Controllers\ProductController::class, 'apisanpham']);
Route::get('/chitietdanhmuc/{id}', [App\Http\Controllers\CategoryController::class, 'apidanhmuc']);
Route::get('/chitietthuonghieu/{id}', [App\Http\Controllers\BrandController::class, 'apithuonghieu']);
Route::get('/sanphamtheodanhmuc/{id}', [App\Http\Controllers\HomeController::class, 'apisanphamtheodanhmuc']);
Route::get('/sanphamtheothuonghieu/{id}', [App\Http\Controllers\HomeController::class, 'apisanphamtheothuonghieu']);
Route::get('/locsanpham/{id1}/{id2}', [App\Http\Controllers\HomeController::class, 'apilocsanpham']);
Route::get('/loctheoten/{slug}', [App\Http\Controllers\HomeController::class, 'apiloctheoten']);
Route::get('/laygiohang/{id}', [App\Http\Controllers\HomeController::class, 'apilaygiohang']);



