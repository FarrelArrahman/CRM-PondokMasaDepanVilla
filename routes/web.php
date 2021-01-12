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

// Get All Bulan
Route::get('/get-bulan', [App\Http\Controllers\DashboardController::class, 'bulan'])->name('get-bulan');
Route::get('/get-responden/{periode}', [App\Http\Controllers\DashboardController::class, 'responden'])->name('get-responden');

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function() {
    Route::resource('dashboard', App\Http\Controllers\DashboardController::class);
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::resource('periode', App\Http\Controllers\PeriodeController::class);
    Route::resource('pertanyaan', App\Http\Controllers\PertanyaanController::class);
    Route::resource('responden', App\Http\Controllers\RespondenController::class);
    Route::resource('ulasan', App\Http\Controllers\UlasanMasukanController::class);
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/ulasan', [App\Http\Controllers\HomeController::class, 'ulasan'])->name('ulasan');
Route::post('/ulasan', [App\Http\Controllers\HomeController::class, 'store'])->name('ulasan.store');
