<?php

use App\Http\Controllers\Admin\MyTransactionController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\user\CategoryController;
use App\Http\Controllers\user\ProductController;
use App\Http\Controllers\user\ProductGalleryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\FrontEnd\FronEndController::class, 'index']);
Route::get('/detail-product/{slug}', [App\Http\Controllers\FrontEnd\FronEndController::class, 'detailProduct'])->name('detail.product');
Route::get('/detail-category/{slug}', [App\Http\Controllers\FrontEnd\FronEndController::class, 'detailCategory'])->name('detail.category');

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/cart', [App\Http\Controllers\FrontEnd\FronEndController::class, 'cart'])->name('cart');
    Route::post('/cart/{id}', [App\Http\Controllers\FrontEnd\FronEndController::class, 'addToCart'])->name('card.add');
    Route::delete('/cart/{id}', [App\Http\Controllers\FrontEnd\FronEndController::class, 'deleteCart'])->name('card.delete');
    Route::post('/checkout', [App\Http\Controllers\FrontEnd\FronEndController::class, 'checkout'])->name('card.checkout');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('admin.')->prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashbord', [\App\Http\Controllers\Admin\DashbordController::class, 'index'])->name('dashbord');
    Route::resource('/category', CategoryController::class)->except(['create', 'show', 'edit']);
    Route::resource('/product', ProductController::class)->except(['create', 'show', 'edit']);
    Route::resource('/product.gallery', ProductGalleryController::class)->except('create', 'show', 'edit', 'update');
    Route::resource('/transition', TransactionController::class);
    Route::resource('/my-transition', MyTransactionController::class)->only('index', 'show');
});

Route::prefix('user')->name('user.')->middleware('user')->group(function () {
    Route::get('/dashbord', [\App\Http\Controllers\user\DashbordController::class, 'index'])->name('dashbord');
    Route::resource('/my-transition', MyTransactionController::class)->only('index', 'show');
});

