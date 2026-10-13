<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cuenta | Alta Cocina</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <main class="auth-page" style="--auth-background: url('{{ asset('imagenes/logingif.gif') }}')">
        <section class="auth-card auth-card-register" aria-labelledby="register-title">
            <div class="brand-panel">
                <div class="brand-content">
                    <h1>Únete a<br><strong>Alta Cocina</strong></h1>
                    <p>Crea tu cuenta y comienza a gestionar las operaciones de tu restaurante desde un solo lugar.</p>
                </div>
            </div>
            <div class="form-panel">
                <div class="form-content">
                    <header class="form-header compact-header">
                        <h2 id="register-title">Crear cuenta</h2>
                        <p>Completa tus datos para comenzar.</p>
                    </header>
                    @if ($errors->any())
                        <div class="form-alert" role="alert">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <span>{{ $errors->first() }}</span>
                        </div>
                    @endif
                    <form action="{{ route('register.post') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <div class="input-wrapper @error('nombre') has-error @enderror">
                                <i class="fa-solid fa-user"></i>
                                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Tu nombre" autocomplete="given-name" required autofocus>
                            </div>
                        </div>
                        <div class="name-grid">
                            <div class="form-group">
                                <label for="apellido_p">Apellido paterno</label>
                                <div class="input-wrapper @error('apellido_p') has-error @enderror">
                                    <i class="fa-solid fa-user-tag"></i>
                                    <input type="text" id="apellido_p" name="apellido_p" value="{{ old('apellido_p') }}" placeholder="Paterno" autocomplete="family-name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="apellido_m">Apellido materno</label>
                                <div class="input-wrapper @error('apellido_m') has-error @enderror">
                                    <i class="fa-solid fa-user-tag"></i>
                                    <input type="text" id="apellido_m" name="apellido_m" value="{{ old('apellido_m') }}" placeholder="Materno">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <div class="input-wrapper @error('email') has-error @enderror">
                                <i class="fa-solid fa-envelope"></i>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="ejemplo@restaurante.com" autocomplete="email" required>
                            </div>
                        </div>
                        <div class="name-grid">
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <div class="input-wrapper @error('password') has-error @enderror">
                                    <i class="fa-solid fa-lock"></i>
                                    <input type="password" id="password" name="password" placeholder="Mínimo 8 caracteres" autocomplete="new-password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirmar</label>
                                <div class="input-wrapper">
                                    <i class="fa-solid fa-shield-halved"></i>
                                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repite la contraseña" autocomplete="new-password" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="primary-button">Crear cuenta</button>
                    </form>
                    <div class="auth-switch">
                        <span>¿Ya tienes una cuenta?</span>
                        <a href="{{ route('login') }}">Iniciar sesión</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
