<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function create(): View
    {
        return view('login');
    }

    public function createRegister(): View
    {
        return view('register');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $credentials = [
            'correo' => $validated['email'],
            'password' => $validated['password'],
        ];

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors(['email' => 'Las credenciales proporcionadas no son correctas.'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido_p' => ['nullable', 'string', 'max:255'],
            'apellido_m' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:usuarios,correo'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $user = User::create([
            'nombre' => $validated['nombre'],
            'apellido_p' => $validated['apellido_p'] ?? null,
            'apellido_m' => $validated['apellido_m'] ?? null,
            'correo' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
