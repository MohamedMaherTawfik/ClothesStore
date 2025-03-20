<?php

use App\Http\Controllers\web\admin\brandController;
use App\Http\Controllers\web\admin\categoreyController;
use App\Http\Controllers\web\admin\productController;
use App\Http\Controllers\web\home\indexController;
use App\Http\Middleware\checkAdmin;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'dashboard',
],function(){
    Route::get('/',[indexController::class,'index'])->name('dashboard');
});

Route::group([
    'prefix' => 'dashboard/brand',
],function(){
    Route::get('/',[brandController::class,'index'])->name('brand');
    Route::get('/create',[brandController::class,'create'])->name('createBrand');
    Route::post('/create/store',[brandController::class,'store'])->name('storeBrand');
    Route::get('/edit/{id}',[brandController::class,'edit'])->name('editBrand');
    Route::post('/edit/{id}/update',[brandController::class,'update'])->name('updateBrand');
    Route::get('/delete/{id}',[brandController::class,'delete'])->name('deleteBrand');
});

Route::group([
    'prefix' => 'dashboard/category',
],function(){
    Route::get('/',[categoreyController::class,'index'])->name('category');
    Route::get('/create',[categoreyController::class,'create'])->name('createCategorey');
    Route::post('/create/store',[categoreyController::class,'store'])->name('storeCategorey');
    Route::get('/edit/{id}',[categoreyController::class,'edit'])->name('editCategorey');
    Route::post('/edit/{id}/update',[categoreyController::class,'update'])->name('updateCategorey');
    Route::get('/delete/{id}',[categoreyController::class,'delete'])->name('deleteCategorey');
});


Route::group([
    'prefix' => 'dashboard/product',
],function(){
    Route::get('/',[productController::class,'index'])->name('product');
    Route::get('/create',[productController::class,'create'])->name('createProduct');
    Route::post('/create/store',[productController::class,'store'])->name('storeProduct');
    Route::get('/edit/{id}',[productController::class,'edit'])->name('editProduct');
    Route::post('/edit/{id}/update',[productController::class,'update'])->name('updateProduct');
    Route::get('/delete/{id}',[productController::class,'delete'])->name('deleteProduct');
});




