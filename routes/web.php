<?php

use App\Http\Controllers\user\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('admin.')->prefix('admin')->middleware('admin')->group(function() {
    Route::get('/dashbord', [\App\Http\Controllers\Admin\DashbordController::class, 'index'])->name('dashbord');
    
});

Route::name('user.')->prefix('user')->middleware('user')->group(function() {
    Route::get('/dashbord', [\App\Http\Controllers\user\DashbordController::class, 'index'])->name('dashbord');
    Route::resource('/category', CategoryController::class)->except(['create','show','edit']);
});
