<?php

use App\Http\Controllers\web\admin\brandController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     App::setLocale('fr');

//     return view('welcome');
// });

Route::get('/admin/brands',[brandController::class ,'index']);
Route::get('/admin/brands/create',[brandController::class ,'create'])->name('create');
Route::get('/admin/brands/edit',[brandController::class ,'edit'])->name('edit');
Route::get('/admin/brands/delete',[brandController::class ,'delete'])->name('delete');

