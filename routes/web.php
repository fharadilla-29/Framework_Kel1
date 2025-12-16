<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routes untuk Super Admin
Route::middleware(['auth', 'check.role:super_admin'])->group(function () {
    Route::get('/super-admin', function () {
        return 'Halaman Super Admin';
    });
});

// Routes untuk User
Route::middleware(['auth', 'check.role:user'])->group(function () {
    Route::get('/user', function () {
        return 'Halaman User';
    });
});
