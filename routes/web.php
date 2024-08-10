<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\KursusController as AdminKursusController;
use App\Http\Controllers\Admin\MateriController as AdminMateriController;
use App\Http\Controllers\Front\LandingController;
use App\Http\Controllers\Front\DetailController;

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

// Rute untuk halaman depan
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Rute untuk halaman detail materi
Route::get('/materi/{id}', [DetailController::class, 'show'])->name('materi.detail');

// Rute untuk admin dengan middleware
Route::prefix('admin')->name('admin.')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin' // Pastikan middleware ini ada dan dikonfigurasi di Kernel
])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('kursus', AdminKursusController::class);
    Route::resource('materi', AdminMateriController::class);
});
