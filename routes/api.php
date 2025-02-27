<?php

use App\Http\Controllers\admin\brandController;
use App\Http\Controllers\admin\categoreyController;
use App\Http\Controllers\admin\colorSizesController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\mail\MailController;
use App\Http\Controllers\orders\cartController;
use App\Http\Controllers\orders\orderController;
use App\Http\Controllers\reviews\blogConteroller;
use App\Http\Middleware\checkAdmin;
use App\Http\Middleware\CheckBelongsTo;
use App\Http\Middleware\ownCart;
use App\Http\Middleware\ownOrder;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\auth\AuthController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api');
    Route::post('/profile', [AuthController::class, 'profile'])->middleware('auth:api');
    Route::post('/user/address', [AuthController::class, 'addAddress'])->middleware('auth:api');
});

Route::middleware(checkAdmin::class)->group(function () {

    Route::controller(colorSizesController::class)->group(function () {
        Route::post('/addColor/{lang}', 'addColor');
        Route::post('/addSize/{lang}', 'addSize');
        Route::get('/colors/{lang}', 'getAllColors');
        Route::get('/sizes/{lang}', 'getAllSizes');
    });

});

Route::controller(brandController::class)->group(function () {
    Route::get('/brands', 'index');
    Route::get('/brand/{id}', 'show');
    Route::post('/brand', 'store')->middleware(checkAdmin::class);
    Route::post('/brand/{id}', 'update')->middleware(checkAdmin::class);
    Route::delete('/brand/{id}', 'destroy')->middleware(checkAdmin::class);
    Route::get('/brand/{id}/products', 'products');
});

Route::controller(categoreyController::class)->group(function () {
    Route::get('/categories', 'index');
    Route::get('/category/{id}', 'show');
    Route::post('/category', 'store')->middleware(checkAdmin::class);
    Route::post('/category/{id}', 'update')->middleware(checkAdmin::class);
    Route::delete('/category/{id}', 'destroy')->middleware(checkAdmin::class);
    Route::get('/category/{id}/products', 'products');
});


Route::controller(productController::class)->group(function () {
    Route::get('/products', 'index');
    Route::get('/product/{id}', 'show');
    Route::post('/product', 'store')->middleware(checkAdmin::class);
    Route::post('/product/{id}', 'update')->middleware(checkAdmin::class);
    Route::delete('/product/{id}','destroy')->middleware(checkAdmin::class);
    Route::get('/product/{id}/colors', 'colors');
    Route::get('/product/{id}/sizes', 'sizes');
    Route::get('/product/{id}/colorSizes', 'colorSizes');
});


Route::controller(cartController::class)->group(function () {
    Route::post('/cart', 'addToCart');
    Route::get('/cart', 'getCartItems')->middleware(ownCart::class);
    Route::delete('/cart', 'deleteFromCart')->middleware(ownCart::class);
    Route::delete('/cart/clear', 'clearCart')->middleware(ownCart::class);
});

Route::controller(orderController::class)->group(function () {
    Route::get('/orders', 'index')->middleware(checkAdmin::class);
    Route::get('/order/{id}', 'show');
    Route::post('/order', 'store');
    Route::get('/user/orders', 'getUserOrders')->middleware(ownOrder::class);
    Route::post('/order/{id}/status', 'ChangeStatus')->middleware(ownOrder::class);
    Route::delete('/order/{id}', 'destroy')->middleware(ownOrder::class);
});

Route::controller(MailController::class)->group(function () {
    Route::post('/send-email', 'sendEmail')->middleware(checkAdmin::class);
    Route::get('/send-email', 'sendEmail');
});


Route::controller(blogConteroller::class)->group(function () {
    Route::get('/blogs', 'index');
    Route::get('/blog/{id}', 'show');
    Route::get('/user/blogs', 'userBlogs')->middleware(CheckBelongsTo::class);
    Route::post('/product/{id}/blog', 'store');
    Route::post('blog/{id}', 'update')->middleware(CheckBelongsTo::class);
    Route::delete('/blog/{id}', 'destroy')->middleware(CheckBelongsTo::class);
    Route::get('/product/{id}/blogs', 'productBlogs');
});
