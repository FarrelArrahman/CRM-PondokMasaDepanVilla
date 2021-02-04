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

// API
Route::get('/get-responden/{periode}', [App\Http\Controllers\HasilController::class, 'responden'])->name('get-responden');
Route::get('/get-nilai/{periode}', [App\Http\Controllers\HasilController::class, 'nilai'])->name('get-nilai');
Route::get('/datatable-responden/{periode}', [App\Http\Controllers\HasilController::class, 'datatableResponden'])->name('datatable.responden');
Route::post('/user-responden-store', [App\Http\Controllers\UserController::class, 'store'])->name('user.responden.store');

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function() {
    Route::middleware('checkrole:admin,staff')->group(function() {
        Route::resource('dashboard', App\Http\Controllers\DashboardController::class);
        Route::resource('responden', App\Http\Controllers\RespondenController::class);
        Route::resource('ulasan', App\Http\Controllers\UlasanMasukanController::class);
        Route::get('hasil', [App\Http\Controllers\HasilController::class, 'index'])->name('hasil.index');
        Route::get('hasil/{id_responden}', [App\Http\Controllers\HasilController::class, 'show'])->name('hasil.show');
    });

    Route::middleware('checkrole:admin')->group(function () {
        Route::resource('user', App\Http\Controllers\UserController::class);
        Route::resource('periode', App\Http\Controllers\PeriodeController::class);
        Route::resource('pertanyaan', App\Http\Controllers\PertanyaanController::class);
    });
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/ulasan', [App\Http\Controllers\HomeController::class, 'ulasan'])->name('ulasan');
Route::post('/ulasan', [App\Http\Controllers\HomeController::class, 'store'])->name('ulasan.store');