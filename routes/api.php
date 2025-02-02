<?php

use App\Http\Controllers\admin\brandController;
use App\Http\Controllers\admin\categoreyController;
use App\Http\Controllers\admin\productController;
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
});


Route::controller(brandController::class)->group(function () {
    Route::get('/brands', 'index');
    Route::get('/brand/{id}', 'show');
    Route::post('/brand', 'store');
    Route::put('/brand/{id}', 'update');
    Route::delete('/brand/{id}', 'destroy');
    Route::get('/brand/{id}/products', 'products');
});

Route::controller(categoreyController::class)->group(function () {
    Route::get('/categories', 'index');
    Route::get('/category/{id}', 'show');
    Route::post('/category', 'store');
    Route::put('/category/{id}', 'update');
    Route::delete('/category/{id}', 'destroy');
    Route::get('/category/{id}/products', 'products');
});

Route::controller(productController::class)->group(function () {
    Route::get('/products', 'index');
    Route::get('/product/{id}', 'show');
    Route::post('/product', 'store');
    Route::put('/product/{id}', 'update');
    Route::delete('/product/{id}','destroy');
});


