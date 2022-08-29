<?php

use App\Http\Controllers\DasboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function () {
//     Route::get('/dashboard', [DasboardController::class, 'index'])->name('dashboard.admin')->middleware('is_admin');
// });

// Route super admin
Route::prefix('admin')->middleware('auth', 'is_admin')->group(function () {
    // Halaman Dashboard admin
    Route::get('/dashboard', [DasboardController::class, 'index'])->name('dashboard.admin');
});

// Route user admin
Route::prefix('user')->middleware('auth')->group(function () {
    // Halaman Dashboard User
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard.user');
});

// Route::group(['prefix' => 'user',  'middleware' => 'auth'], function () {

//     Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard.user');
// });
