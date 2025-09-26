<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GuestProyekController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/guest/proyek', [GuestProyekController::class, 'index'])->name('guest.proyek');
