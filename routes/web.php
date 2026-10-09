
<?php

use Illuminate\Support\Facades\Route;

// Página principal: inicio de sesión
Route::get('/', function () {
    return view('login');
})->name('login');

// Panel principal del restaurante
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
