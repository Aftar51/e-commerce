<?php

use App\Http\Controllers\Admin\MyTransactionController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\user\CategoryController;
use App\Http\Controllers\user\ProductController;
use App\Http\Controllers\user\ProductGalleryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

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
