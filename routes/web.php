<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestProyekController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\TahapanProyekController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (TANPA LOGIN)
|--------------------------------------------------------------------------
*/

Route::get('/auth/login', [AuthController::class, 'index'])->name('guest.login');
Route::post('/auth/login', [AuthController::class, 'login']);

Route::get('/guest/proyek', [GuestProyekController::class, 'index'])->name('guest.proyek');

Route::post('/login-proses', [LoginController::class, 'loginProses'])->name('login.proses');

/*
|--------------------------------------------------------------------------
| REDIRECT DEFAULT
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTES (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/

Route::middleware('auth.access')->group(function () {

    //Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth.access')
    ->name('guest.dashboard');


    Route::resource('proyek', ProyekController::class);
    Route::resource('users', UserController::class);
    Route::resource('tahapan', TahapanProyekController::class);

    Route::get('/data-proyek', fn() => redirect()->route('proyek.index'));

    Route::get('/about', function () {
        return view('pages.about.index');
    })->name('about');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout.get');
    Route::resource('kontraktor', \App\Http\Controllers\KontraktorController::class);
    Route::resource('lokasi', \App\Http\Controllers\LokasiProyekController::class);
    Route::resource('progres', \App\Http\Controllers\ProgresProyekController::class);
});
