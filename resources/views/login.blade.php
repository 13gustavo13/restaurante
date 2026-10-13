
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Alta Cocina</title>

    <!-- Fuentes e iconos -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --bg-dark: #0a0a0a;
            --panel-bg: #141414;
            --primary: #C5A059;
            --primary-hover: #d4b06a;
            --text-main: #F4F4F0;
            --text-muted: #9e9e9e;
            --border-color: #2a2a2a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-dark);
            min-height: 100vh;
            color: var(--text-main);
        }

        /* Fondo animado original: NO quitar el GIF */
        .login-background-wrapper {
            position: relative;
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;

            background-image: url('{{ asset("imagenes/logingif.gif") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            isolation: isolate;
        }

        .login-overlay {
            position: absolute;
            inset: 0;
            background: rgba(10, 10, 10, 0.80);
            z-index: -1;
        }

        .login-container {
            position: relative;
            width: 100%;
            max-width: 1150px;
            min-height: 620px;
            display: grid;
            grid-template-columns: 1.25fr 1fr;
            background: var(--panel-bg);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.7);
            border: 1px solid rgba(197, 160, 89, 0.25);
            animation: fadeIn 0.7s ease-out forwards;
        }

        /* Panel izquierdo */
        .brand-panel {
            position: relative;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            background:
                linear-gradient(
                    180deg,
                    rgba(10, 10, 10, 0.2) 20%,
                    rgba(14, 14, 14, 0.95) 90%
                ),
                url('https://images.unsplash.com/photo-1577219491135-ce391730fb2c?q=80&w=1200&auto=format&fit=crop')
                center / cover no-repeat;
        }

        .hero-content h1 {
            font-size: clamp(2rem, 3vw, 2.6rem);
            font-weight: 300;
            line-height: 1.2;
            margin-bottom: 15px;
            color: #fff;
        }

        .hero-content h1 strong {
            font-weight: 600;
            color: var(--primary);
            text-shadow: 0 2px 15px rgba(197, 160, 89, 0.4);
        }

        .hero-content p {
            color: #ccc;
            font-size: 13.5px;
            line-height: 1.6;
            max-width: 380px;
        }

        /* Panel del formulario */
        .login-panel {
            padding: 60px 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: var(--panel-bg);
        }

        .login-header-text h2 {
            font-size: 30px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .subtitle {
            color: var(--text-muted);
            font-size: 14px;
            margin-bottom: 35px;
            line-height: 1.5;
        }

        /* Errores de validación */
        .alert-error {
            background: rgba(255, 74, 74, 0.1);
            border-left: 3px solid #ff4a4a;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 4px;
            font-size: 13px;
            color: #ff8b8b;
        }

        .alert-error p {
            margin-bottom: 5px;
        }

        .alert-error p:last-child {
            margin-bottom: 0;
        }

        .alert-success {
            background: rgba(45, 180, 100, 0.12);
            border-left: 3px solid #2db464;
            padding: 12px;
            margin-bottom: 20px;
            color: #7ee2a8;
            font-size: 13px;
            border-radius: 4px;
        }

        /* Campos */
        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-size: 11.5px;
            font-weight: 600;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: var(--primary);
            margin-bottom: 8px;
        }

        .input-wrapper {
            display: flex;
            align-items: center;
            min-height: 52px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 0 16px;
            transition: all 0.3s ease;
        }

        .input-wrapper:focus-within {
            border-color: var(--primary);
            background: rgba(197, 160, 89, 0.04);
            box-shadow: 0 0 0 3px rgba(197, 160, 89, 0.12);
        }

        .input-wrapper i {
            color: var(--primary);
            margin-right: 14px;
            font-size: 16px;
        }

        .input-wrapper input {
            width: 100%;
            min-width: 0;
            background: transparent;
            border: none;
            outline: none;
            color: var(--text-main);
            font-size: 15px;
            font-family: inherit;
        }

        .input-wrapper input::placeholder {
            color: #777;
        }

        /* Opciones */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
            margin: 18px 0 32px;
            font-size: 13px;
        }

        .form-options label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-muted);
            cursor: pointer;
        }

        .form-options input[type="checkbox"] {
            accent-color: var(--primary);
            width: 15px;
            height: 15px;
            cursor: pointer;
        }

        .form-options a {
            color: var(--primary);
            text-decoration: none;
            transition: opacity 0.2s;
        }

        .form-options a:hover {
            opacity: 0.8;
            text-decoration: underline;
        }

        /* Botón de acceso */
        .login-button {
            width: 100%;
            min-height: 52px;
            background: var(--primary);
            color: var(--bg-dark);
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(197, 160, 89, 0.25);
        }

        .login-button:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(197, 160, 89, 0.4);
        }

        .login-button:disabled {
            opacity: 0.7;
            cursor: wait;
        }

        @media (max-width: 900px) {
            .login-container {
                grid-template-columns: 1fr;
                max-width: 480px;
                min-height: auto;
            }

            .brand-panel {
                display: none;
            }

            .login-panel {
                padding: 40px 30px;
            }
        }

        @media (max-width: 400px) {
            .login-background-wrapper {
                padding: 12px;
            }

            .login-panel {
                padding: 32px 20px;
            }

            .form-options {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <!-- Fondo GIF original -->
    <div class="login-background-wrapper">
        <div class="login-overlay"></div>

        <div class="login-container">

            <!-- Panel izquierdo -->
            <div class="brand-panel">
                <div class="hero-content">
                    <h1>Alta<br><strong>Cocina</strong></h1>

                    <p>
                        Accede al sistema de gestión de tu restaurante
                        para administrar reservas, inventarios y personal.
                    </p>
                </div>
            </div>

            <!-- Panel derecho: formulario -->
            <div class="login-panel">

                <div class="login-header-text">
                    <h2>Iniciar sesión</h2>
                    <p class="subtitle">
                        Ingresa tus credenciales para continuar.
                    </p>
                </div>

                <!-- Mensajes de sesión -->
                @if (session('status'))
                    <div class="alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- Errores de validación o autenticación -->
                @if ($errors->any())
                    <div class="alert-error">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="email">Correo electrónico</label>

                        <div class="input-wrapper">
                            <i class="fa-solid fa-envelope"></i>

                            <!-- IMPORTANTE: name="email" -->
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="ejemplo@restaurante.com"
                                autocomplete="username"
                                required
                                autofocus
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>

                        <div class="input-wrapper">
                            <i class="fa-solid fa-lock"></i>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="••••••••"
                                autocomplete="current-password"
                                required
                            >
                        </div>
                    </div>

                    <div class="form-options">
                        <label for="remember">
                            <input
                                type="checkbox"
                                id="remember"
                                name="remember"
                                value="1"
                                {{ old('remember') ? 'checked' : '' }}
                            >
                            Recordarme
                        </label>

                        <a href="#"
                           onclick="return false;"
                           title="La recuperación de contraseña aún no está configurada">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </div>

                    <button type="submit" class="login-button">
                        Acceder
                    </button>
                </form>

            </div>
        </div>
    </div>

</body>
</html>
