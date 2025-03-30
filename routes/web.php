<?php
use App\Http\Controllers\web\admin\colorController;
use App\Http\Controllers\web\admin\dashboardController;
use App\Http\Controllers\web\admin\brandController;
use App\Http\Controllers\web\admin\categoreyController;
use App\Http\Controllers\web\admin\productController;
use App\Http\Controllers\web\admin\sizeController;
use App\Http\Controllers\web\auth\AuthController;
use App\Http\Controllers\web\home\indexController;
use App\Http\Controllers\web\orders\cartController;
use App\Http\Controllers\web\orders\orderController;
use App\Http\Middleware\web\AuthCheck;
use App\Http\Middleware\web\checkAdmin;
use Illuminate\Support\Facades\Route;

Route::controller(indexController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/categorey/{id}', 'showCategorey')->name('showCategorey');
    Route::get('/brand/{id}', 'showbrand')->name('showbrand');
    Route::get('/about', 'about_us')->name('about');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/signup', 'signUp')->name('register');
    Route::post('/signup', 'register')->name('register');
    Route::get('/login', 'signIn')->name('login');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/profile', 'profile')->name('profile');
});


Route::controller(dashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard')->middleware(checkAdmin::class);
});


Route::group([
    'prefix' => 'dashboard/brand',
    'middleware' => checkAdmin::class
], function () {
    Route::get('/', [brandController::class, 'index'])->name('brand');
    Route::get('/create', [brandController::class, 'create'])->name('createBrand');
    Route::post('/create/store', [brandController::class, 'store'])->name('storeBrand');
    Route::get('/edit/{id}', [brandController::class, 'edit'])->name('editBrand');
    Route::post('/edit/{id}/update', [brandController::class, 'update'])->name('updateBrand');
    Route::get('/delete/{id}', [brandController::class, 'delete'])->name('deleteBrand');
});

Route::group([
    'prefix' => 'dashboard/category',
    'middleware' => checkAdmin::class
], function () {
    Route::get('/', [categoreyController::class, 'index'])->name('category');
    Route::get('/create', [categoreyController::class, 'create'])->name('createCategorey');
    Route::post('/create/store', [categoreyController::class, 'store'])->name('storeCategorey');
    Route::get('/edit/{id}', [categoreyController::class, 'edit'])->name('editCategorey');
    Route::post('/edit/{id}/update', [categoreyController::class, 'update'])->name('updateCategorey');
    Route::get('/delete/{id}', [categoreyController::class, 'delete'])->name('deleteCategorey');
});


Route::group([
    'prefix' => 'dashboard/product',
    'middleware' => checkAdmin::class
], function () {
    Route::get('/', [productController::class, 'index'])->name('product');
    Route::get('/create', [productController::class, 'create'])->name('createProduct');
    Route::post('/create/store', [productController::class, 'store'])->name('storeProduct');
    Route::get('/edit/{id}', [productController::class, 'edit'])->name('editProduct');
    Route::post('/edit/{id}/update', [productController::class, 'update'])->name('updateProduct');
    Route::get('/delete/{id}', [productController::class, 'destroy'])->name('deleteProduct');
});

Route::group([
    'prefix' => 'dashboard/color',
    'middleware' => checkAdmin::class
], function () {
    Route::get('/', [colorController::class, 'index'])->name('color');
    Route::get('/create', [colorController::class, 'create'])->name('createColor');
    Route::post('/create/store', [colorController::class, 'store'])->name('storeColor');
});

Route::group([
    'prefix' => 'dashboard/size',
    'middleware' => checkAdmin::class
], function () {
    Route::get('/', [sizeController::class, 'index'])->name('size');
    Route::get('/create', [sizeController::class, 'create'])->name('createSize');
    Route::post('/create/store', [sizeController::class, 'store'])->name('storeSize');
});

Route::group([
    'middleware' => AuthCheck::class
], function () {
    Route::get('/cart', [cartController::class, 'index'])->name('cart');
    Route::post('/cart/{id}', [cartController::class, 'addToCart'])->name('addToCart');
    Route::post('/cart', [cartController::class, 'clearCart'])->name('clearCart');
    Route::get('/cart/delete/{id}', [cartController::class, 'confirmDelete'])->name('deleteFromCart');
    Route::post('/cart/delete/{id}', [cartController::class, 'deleteFromCart'])->name('deleteFromCart');
});


Route::group([
    'prefix' => 'dashboard/orders',
    'middleware' => checkAdmin::class
], function () {
    Route::get('/', [orderController::class, 'index'])->name('orders');
    Route::get('/find/{id}', [orderController::class, 'findOrder'])->name('findOrder');
    Route::post('/delete/{id}', [orderController::class, 'deleteOrder'])->name('deleteOrder');
    Route::post('/find/{id}', [orderController::class, 'changeStatus'])->name('changeStatus');
});

Route::controller(orderController::class)->group(function () {
    Route::get('/order/checkout', 'checkout')->name('checkout');
    Route::post('/order/checkout', 'createOrder')->name('createOrder');
    Route::get('/order/{id}', 'findOrder')->name('findOrder');
    Route::post('order/{id}', 'deleteOrder')->name('deleteOrder');
    Route::get('/orders', 'getUserOrders')->name('userOrders');
});
