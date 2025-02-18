<?php

use App\Http\Controllers\admin\brandController;
use App\Http\Controllers\admin\categoreyController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\mail\MailController;
use App\Http\Controllers\orders\cartController;
use App\Http\Controllers\orders\orderController;
use App\Http\Controllers\reviews\blogConteroller;
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
    Route::post('/user/address', [AuthController::class, 'addAddress'])->middleware('auth:api');
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
    Route::post('/product', 'store');
    Route::post('/product/{id}', 'update');
    Route::delete('/product/{id}','destroy');
    Route::get('/product/{id}/colors', 'colors');
    Route::get('/product/{id}/sizes', 'sizes');
    Route::get('/product/{id}/colorSizes', 'colorSizes');
    Route::post('/product/{id}/color', 'addColors');
    Route::post('/product/{id}/size', 'addSizes');
});

Route::controller(cartController::class)->group(function () {
    Route::post('/cart', 'addToCart');
    Route::get('/cart', 'getCartItems');
    Route::delete('/cart', 'deleteFromCart');
    Route::delete('/cart/clear', 'clearCart');
});

Route::controller(orderController::class)->group(function () {
    Route::get('/orders', 'index');
    Route::get('/order/{id}', 'show');
    Route::post('/order', 'store');
    Route::get('/user/orders', 'getUserOrders');
    Route::post('/order/{id}/status', 'ChangeStatus');
    Route::delete('/order/{id}', 'destroy');
});

Route::controller(MailController::class)->group(function () {
    Route::post('/send-email', 'sendEmail');
    Route::get('/send-email', 'sendEmail');
});


Route::controller(blogConteroller::class)->group(function () {
    Route::get('/blogs', 'index');
    Route::get('/blog/{id}', 'show');
    Route::post('/blog', 'store');
    Route::post('/blog/{id}', 'update');
    Route::delete('/blog/{id}', 'destroy');
});
