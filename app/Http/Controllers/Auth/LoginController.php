<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Muestra la vista del formulario de inicio de sesión.
     */
    public function showLoginForm()
    {
        // Busca el archivo directamente en resources/views/login.blade.php
        return view('login'); 
    }

    /**
     * Procesa la solicitud de inicio de sesión.
     */
    public function login(Request $request)
    {
        // 1. Validar que el usuario envió los datos correctamente
        $request->validate([
            'correo' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Preparar las credenciales para la base de datos
        $credenciales = [
            'correo' => $request->correo,
            'password' => $request->password
        ];

        // 3. Intentar autenticar con la tabla de usuarios
        if (Auth::attempt($credenciales, $request->boolean('remember'))) {
            // Regenerar la sesión para evitar ataques de fijación de sesión
            $request->session()->regenerate();
            
            // Redirigir al panel principal (dashboard)
            return redirect()->intended('dashboard');
        }

        // 4. Si las credenciales fallan, regresar al login con un mensaje de error
        return back()->withErrors([
            'correo' => 'Las credenciales proporcionadas no son correctas o no existen.',
        ])->onlyInput('correo');
    }

    /**
     * Cierra la sesión del usuario.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        // Invalida la sesión actual
        $request->session()->invalidate();
        
        // Regenera el token CSRF
        $request->session()->regenerateToken();
        
        // Redirige a la página principal (login)
        return redirect('/');
    }
}