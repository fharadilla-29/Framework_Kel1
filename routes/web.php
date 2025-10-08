<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ketua', function () {
    return view('ketua');
});
Route::get('/anggota', function () {
    return view('anggota');
});

Route::get('/anggota2', function () {
    return view('anggota2');
});

Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
