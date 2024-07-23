<?php

use Illuminate\Support\Facades\Route;

// Route::controller(LoginController::class)->group(function () {
//     Route::get('/', 'index')->name('login.index');
//     Route::post('/login', 'store')->name('login.store');
//     Route::get('/logout', 'destroy')->name('login.destroy');
// });

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('auth.dashboard');
//     })->name('dashboard');
// });

Route::get('/', function () {
    return view('welcome');
})->name('login.index');
