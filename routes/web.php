<?php

use App\Models\TahapanProyek;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestProyekController;
use App\Http\Controllers\TahapanProyekController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/guest/proyek', [GuestProyekController::class, 'index'])->name('guest.proyek');


//Route::get('/', [LoginController::class, 'index'])->name('guest.login');
Route::post('/login-proses', [LoginController::class, 'loginProses'])->name('login.proses');

Route::get('/', [DashboardController::class, 'index'])->name('guest.dashboard');

// Route::post('question/store', [AuthController::class, 'store'])
// 		->name('question.store');

Route::get('/auth/login', [AuthController::class, 'index'])->name('guest.login');

Route::post('/auth/login', [AuthController::class, 'login']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('guest.dashboard');

Route::resource('proyek', ProyekController::class);

Route::get('/data-proyek', fn() => redirect()->route('proyek.index'));

Route::resource('users', UserController::class);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout.get');

Route::get('/about', function () {
    return view('pages.about.index');
})->name('about');

Route::resource('tahapan', TahapanProyekController::class);
