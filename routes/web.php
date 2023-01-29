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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('shop');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('checkout/{product_id}', [\App\Http\Controllers\OrderController::class, 'create'])->name('checkout');
    Route::post('checkout', [\App\Http\Controllers\OrderController::class, 'store'])->name('checkout.store');
    Route::get('/order/{id}', [App\Http\Controllers\OrderController::class, 'show'])->name('order.show');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function() {

    Route::resource('/user', \App\Http\Controllers\UserController::class);
    Route::resource('/product', \App\Http\Controllers\ProductController::class);
    Route::resource('/order', \App\Http\Controllers\OrderController::class)->only(['index', 'edit', 'update']);



});
