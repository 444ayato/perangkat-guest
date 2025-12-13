<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestProyekController;
use App\Http\Controllers\TahapanProyekController;

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
| DEFAULT REDIRECT
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

    // Dashboard (nama route diperbaiki)
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });

    // Resource routes
    Route::resource('proyek', ProyekController::class);
    Route::resource('users', UserController::class);
    Route::resource('tahapan', TahapanProyekController::class);
    Route::resource('progres', \App\Http\Controllers\ProgresProyekController::class)
    ->parameters([
        'progres' => 'progre'  // Ini mapping: URL parameter = 'progre', model = 'progres'
    ]);
    Route::resource('lokasi', \App\Http\Controllers\LokasiProyekController::class);
    Route::resource('kontraktor', \App\Http\Controllers\KontraktorController::class);
    // Redirect helper
    Route::get('/data-proyek', fn() => redirect()->route('proyek.index'));

    // About page
    Route::get('/about', function () {
        return view('pages.about.index');
    })->name('about');

    // Logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout.get');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
