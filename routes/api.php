<?php
use App\Http\Controllers\api\admin\brandController;
use App\Http\Controllers\api\admin\categoreyController;
use App\Http\Controllers\api\admin\colorSizesController;
use App\Http\Controllers\api\admin\productController;
use App\Http\Controllers\api\auth\AuthController;
use App\Http\Controllers\api\orders\cartController;
use App\Http\Controllers\api\orders\orderController;
use App\Http\Controllers\api\reviews\blogConteroller;
use App\Http\Controllers\mail\MailController;
use App\Http\Middleware\api\checkAdmin;
use App\Http\Middleware\api\CheckBelongsTo;
use App\Http\Middleware\api\ownCart;
use App\Http\Middleware\api\ownOrder;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('jwt.auth');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('jwt.auth');
    Route::post('/profile', [AuthController::class, 'profile'])->middleware('jwt.auth');
    Route::post('/user/address', [AuthController::class, 'addAddress'])->middleware('jwt.auth');
});

Route::middleware(checkAdmin::class)->group(function () {

    Route::controller(colorSizesController::class)->group(function () {
        Route::post('/addColor', 'addColor');
        Route::post('/addSize', 'addSize');
        Route::get('/colors', 'getAllColors');
        Route::get('/sizes', 'getAllSizes');
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
    Route::post('product/{id}/stock', 'updateStock')->middleware(checkAdmin::class);
});

Route::controller(cartController::class)->group(function () {
    Route::post('/cart', 'addToCart');
    Route::get('/cart', 'getCartItems');
    Route::delete('/cart', 'deleteFromCart')->middleware(ownCart::class);
    Route::delete('/cart/clear', 'clearCart')->middleware(ownCart::class);
});

Route::controller(orderController::class)->group(function () {
    Route::get('/orders', 'index')->middleware(checkAdmin::class);
    Route::get('/order/{id}', 'show');
    Route::post('/order', 'store');
    Route::get('/user/orders', 'getUserOrders');
    Route::post('/order/{id}/status', 'ChangeStatus')->middleware(ownOrder::class);
    Route::delete('/order/{id}', 'destroy')->middleware(ownOrder::class);
});

Route::controller(MailController::class)->group(function () {
    Route::post('/send-email', 'sendEmail')->middleware('jwt.auth');
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
