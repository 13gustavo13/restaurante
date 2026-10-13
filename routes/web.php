```php
<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Sistema Restaurante
|--------------------------------------------------------------------------
*/

// Rutas para usuarios que NO han iniciado sesión
Route::middleware('guest')->group(function () {

    // Mostrar el login en la página principal
    Route::get('/', [AuthController::class, 'create'])
        ->name('login');

    // Procesar el formulario de inicio de sesión
    Route::post('/', [AuthController::class, 'store'])
        ->name('login.post');
});

// Rutas protegidas para usuarios autenticados
Route::middleware('auth')->group(function () {

    // Panel principal
    Route::view('/dashboard', 'dashboard')
        ->name('dashboard');

    // Gestión del restaurante
    Route::view('/sedes', 'sedes')
        ->name('sedes.index');

    Route::view('/mesas', 'mesas')
        ->name('mesas');

    Route::view('/pedidos', 'pedidos')
        ->name('pedidos');

    // Cerrar sesión
    Route::post('/logout', [AuthController::class, 'destroy'])
        ->name('logout');
});
```