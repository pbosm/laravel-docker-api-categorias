<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\LoginController;

Route::post('/register', [LoginController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('categorias', [CategoriasController::class, 'store']);
    Route::get('categorias', [CategoriasController::class, 'index']);
    Route::get('categorias/{id}', [CategoriasController::class, 'show']);
    Route::delete('categorias/{id}', [CategoriasController::class, 'destroy']);

    Route::get('/logout', [LoginController::class, 'logout']);
});

