<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('dashboard', App\Http\Controllers\DashboardController::class);
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::resource('periode', App\Http\Controllers\PeriodeController::class);
    Route::resource('pertanyaan', App\Http\Controllers\PertanyaanController::class);
});

Auth::routes();
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
