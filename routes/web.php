<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UpdateController;
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
// Untuk route pada halaman home dan product detail
Route::get('/', [ProductController::class, 'index']);
Route::get('/product/{product:id}', [ProductController::class, 'detail']);
Route::post('/product/{product:id}', [ProductController::class, 'cart']);

// untuk route pada halaman cart 
Route::get('/cart', [TransactionController::class, 'index'])->middleware('auth');
Route::delete('/cart/{transaction:id}', [TransactionController::class, 'destroy']);
Route::put('/transaction/{user:id}', [TransactionController::class, 'checkOut']);

// untuk route pada halaman transaction
Route::get('/transaction', [TransactionController::class, 'view'])->middleware('auth');
Route::get('/detail/{transaction:transaction_time}', [TransactionController::class, 'find'])->middleware('auth');

// untuk route pada search
Route::get('/search', [ProductController::class, 'search']);

// untuk route pada halaman update product
Route::get('/product/update/{product:id}', [ProductController::class, 'index1']);
Route::post('/product/update/{product:id}', [ProductController::class, 'upload']);

//untuk route pada halaman insert product
Route::get('/insert', [UpdateController::class, 'index1']);
Route::post('/insert', [UpdateController::class, 'store']);

// untuk route pada halaman user
Route::get('/user', [LoginController::class, 'user']);
Route::delete('/user/{user:id}', [LoginController::class, 'delete']);

// Login
Route::get('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// Register
Route::get('/register', [RegisterController::class, 'register'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Update Profile
Route::get('/update', [UpdateController::class, 'index']);
Route::put('/update', [UpdateController::class, 'update']);
