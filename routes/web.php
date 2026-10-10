<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Rutas Públicas (Acceso sin sesión)
|--------------------------------------------------------------------------
*/

// Página principal: inicio de sesión (conectada al controlador)
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

// Procesa los datos enviados desde el formulario
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Procesa el cierre de sesión
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| Rutas Protegidas (Requieren inicio de sesión)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    
    // Panel principal del restaurante
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Gestión de mesas
    Route::get('/mesas', function () {
        return view('mesas');
    })->name('mesas');
    
    // Gestión de pedidos
    Route::get('/pedidos', function () {
        return view('pedidos');
    })->name('pedidos');

});