<?php

use App\Http\Controllers\web\admin\brandController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     App::setLocale('fr');

//     return view('welcome');
// });

Route::group([
    'prefix' => 'admin/brand',
],function(){
    Route::get('/',[brandController::class,'index'])->name('brand');
    Route::get('/create',[brandController::class,'create'])->name('createBrand');
    Route::post('/create/store',[brandController::class,'store'])->name('storeBrand');
    Route::get('/edit/{id}',[brandController::class,'edit'])->name('editBrand');
    Route::post('/edit/{id}/update',[brandController::class,'update'])->name('updateBrand');
    Route::get('/delete/{id}',[brandController::class,'delete'])->name('deleteBrand');
});

