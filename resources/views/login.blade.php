<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | Alta Cocina</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <main class="auth-page" style="--auth-background: url('{{ asset('imagenes/logingif.gif') }}')">
        <section class="auth-card" aria-labelledby="login-title">
            <div class="brand-panel">
                <div class="brand-content">
                    <h1>Alta<br><strong>Cocina</strong></h1>
                    <p>Accede al sistema de gestión de tu restaurante para administrar reservas, inventarios y personal.</p>
                </div>
            </div>

            <div class="form-panel">
                <div class="form-content">
                    <header class="form-header">
                        <h2 id="login-title">Iniciar sesión</h2>
                        <p>Ingresa tus credenciales para continuar.</p>
                    </header>

                    @if ($errors->any())
                        <div class="form-alert" role="alert">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <span>{{ $errors->first() }}</span>
                        </div>
                    @endif

                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <div class="input-wrapper @error('email') has-error @enderror">
                                <i class="fa-solid fa-envelope"></i>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="ejemplo@restaurante.com" autocomplete="email" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <div class="input-wrapper @error('password') has-error @enderror">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" id="password" name="password" placeholder="••••••••" autocomplete="current-password" required>
                            </div>
                        </div>

                        <div class="form-options">
                            <label class="remember-option">
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span>Recordarme</span>
                            </label>
                        </div>

                        <button type="submit" class="primary-button">Acceder</button>
                    </form>

                    <div class="auth-switch">
                        <span>¿Aún no tienes una cuenta?</span>
                        <a href="{{ route('register') }}">Registrarse</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
