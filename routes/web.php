<?php

use App\Http\Controllers\web\admin\dashboardController;
use App\Http\Controllers\web\admin\brandController;
use App\Http\Controllers\web\admin\categoreyController;
use App\Http\Controllers\web\admin\productController;
use App\Http\Controllers\web\auth\AuthController;
use App\Http\Controllers\web\home\indexController;
use App\Http\Middleware\web\checkAdmin;
use Illuminate\Support\Facades\Route;

Route::controller(indexController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/categorey/{id}', 'showCategorey')->name('showCategorey');
    Route::get('/brand/{id}', 'showbrand')->name('showbrand');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/signup', 'signUp')->name('register');
    Route::post('/signup', 'register')->name('register');
    Route::get('/login', 'signIn')->name('login');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});


Route::controller(dashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard')->middleware(checkAdmin::class);
});


Route::group([
    'prefix' => 'dashboard/brand',
    'middleware' => checkAdmin::class
],function(){
    Route::get('/',[brandController::class,'index'])->name('brand');
    Route::get('/create',[brandController::class,'create'])->name('createBrand')->middleware(checkAdmin::class);
    Route::post('/create/store',[brandController::class,'store'])->name('storeBrand');
    Route::get('/edit/{id}',[brandController::class,'edit'])->name('editBrand')->middleware(checkAdmin::class);
    Route::post('/edit/{id}/update',[brandController::class,'update'])->name('updateBrand');
    Route::get('/delete/{id}',[brandController::class,'delete'])->name('deleteBrand')->middleware(checkAdmin::class);
});

Route::group([
    'prefix' => 'dashboard/category',
    'middleware' => checkAdmin::class
],function(){
    Route::get('/',[categoreyController::class,'index'])->name('category');
    Route::get('/create',[categoreyController::class,'create'])->name('createCategorey')->middleware(checkAdmin::class);
    Route::post('/create/store',[categoreyController::class,'store'])->name('storeCategorey');
    Route::get('/edit/{id}',[categoreyController::class,'edit'])->name('editCategorey')->middleware(checkAdmin::class);
    Route::post('/edit/{id}/update',[categoreyController::class,'update'])->name('updateCategorey');
    Route::get('/delete/{id}',[categoreyController::class,'delete'])->name('deleteCategorey')->middleware(checkAdmin::class);
});


Route::group([
    'prefix' => 'dashboard/product',
    'middleware' => checkAdmin::class
],function(){
    Route::get('/',[productController::class,'index'])->name('product');
    Route::get('/create',[productController::class,'create'])->name('createProduct')->middleware(checkAdmin::class);
    Route::post('/create/store',[productController::class,'store'])->name('storeProduct');
    Route::get('/edit/{id}',[productController::class,'edit'])->name('editProduct')->middleware(checkAdmin::class);
    Route::post('/edit/{id}/update',[productController::class,'update'])->name('updateProduct');
    Route::get('/delete/{id}',[productController::class,'delete'])->name('deleteProduct')->middleware(checkAdmin::class);
});

