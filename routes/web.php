<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;

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
Route::resource('products', \App\Http\Controllers\ProductController::class);

Route::resource('auth', AuthController::class);

Route::get('auth', [AuthController::class, 'index'])->name('auth');

Route::resource('pelanggan', PelangganController::class);

//Route('pelanggan.update', $dataPelanggan->pelanggan_id);