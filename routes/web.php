<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('/', [AuthController::class, 'create'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'store'])
        ->name('login.post');

});

Route::middleware('auth')->group(function () {

    Route::view('/dashboard', 'dashboard')
        ->name('dashboard');

    Route::view('/sedes', 'sedes')
        ->name('sedes.index');

    Route::view('/mesas', 'mesas')
        ->name('mesas');

    Route::view('/pedidos', 'pedidos')
        ->name('pedidos');

    Route::post('/logout', [AuthController::class, 'destroy'])
        ->name('logout');

});