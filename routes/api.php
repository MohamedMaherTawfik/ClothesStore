<?php

use App\Http\Controllers\admin\brandController;
use App\Http\Controllers\admin\categoreyController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\orders\cartController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\auth\AuthController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
    Route::post('/profile', [AuthController::class, 'profile'])->middleware('auth:api');
    Route::post('/user/addreses', [AuthController::class, 'userAddresses'])->middleware('auth:api');
});


Route::controller(brandController::class)->group(function () {
    Route::get('/brands', 'index');
    Route::get('/brand/{id}', 'show');
    Route::post('/brand', 'store');
    Route::post('/brand/{id}', 'update');
    Route::delete('/brand/{id}', 'destroy');
    Route::get('/brand/{id}/products', 'products');
});

Route::controller(categoreyController::class)->group(function () {
    Route::get('/categories', 'index');
    Route::get('/category/{id}', 'show');
    Route::post('/category', 'store');
    Route::post('/category/{id}', 'update');
    Route::delete('/category/{id}', 'destroy');
    Route::get('/category/{id}/products', 'products');
});

Route::controller(productController::class)->group(function () {
    Route::get('/products', 'index');
    Route::get('/product/{id}', 'show');
    Route::get('/product/{id}/colors', 'colors');
    Route::get('/product/{id}/sizes', 'sizes');
    Route::get('/product/{id}/colorsizes', 'ColorsSizes');
    Route::post('/product', 'store');
    Route::post('/product/{id}', 'update');
    Route::delete('/product/{id}','destroy');
});

Route::controller(cartController::class)->group(function () {
    Route::post('/cart/{cart}', 'addToCart');
    Route::get('/cart', 'getCartItems');
    Route::delete('/cart', 'deleteFromCart');
    Route::delete('/cart/clear', 'clearCart');
});


