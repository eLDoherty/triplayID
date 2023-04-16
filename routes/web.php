<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmbedController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SingleController;
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

// Home
Route::get('/', [HomeController::class, 'index']);

// Admin page
Route::get('admin', [AdminController::class, 'index'])->middleware('auth')->name('adminPage');

// Authentication
Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'userAuthLogin']);
Route::get('register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('register', [RegisterController::class, 'addUser']);

// Images
Route::post('addBanner', [ImageController::class, 'addBanner'])->name('imageBanner');
Route::post('addSlider', [ImageController::class, 'addSlider'])->name('imageSlider');
Route::post('addPayment', [ImageController::class, 'addPayment'])->name('imagePayment');
Route::get('deleteBanner/{id}', [ImageController::class, 'deleteBanner']);
Route::get('deleteSlider/{id}', [ImageController::class, 'deleteSlider']);
Route::get('deletePayment/{id}', [ImageController::class, 'deletePayment']);

// Embeded
Route::post('addUrl', [EmbedController::class, 'addUrl'])->name('addUrl');
Route::get('deleteEmbed/{id}', [EmbedController::class, 'deleteEmbed']);

// Product page
Route::get('product', [ProductController::class, 'index']);
Route::post('product', [ProductController::class, 'addProduct']);
Route::get('deleteProduct/{id}', [ProductController::class, 'deleteProduct']);
Route::get('editProduct/{id}', [ProductController::class, 'editProduct']);
Route::post('editProduct', [ProductController::class, 'changeProduct'])->name('editProduct');
Route::get('addPrice/{id}', [ProductController::class, 'addPrice']);
Route::post('addPrice', [ProductController::class, 'productPrice'])->name('productPrice');

// Single Product page
Route::get('product/{slug}', [SingleController::class, 'index']);