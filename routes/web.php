<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/products', [ProductController::class, 'store']);
Route::get('/products', [ProductController::class, 'create']);
Route::get('/cart', [ProductController::class, 'cart']);

Route::post('/addToCart', [ProductController::class, 'addToCart']);
Route::post('/removeFromCart', [ProductController::class, 'removeFromCart']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/addOrder', [OrderController::class, 'addOrder']);
Route::get('/orders', [OrderController::class, 'orders']);
