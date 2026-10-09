
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | Restaurantes y Comedores</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #0878f9;
            --primary-dark: #075fc5;
            --navy: #102b4c;
            --text: #182b49;
            --muted: #8492a6;
            --border: #e2eaf3;
            --background: #f2f7fc;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--background);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
            color: var(--text);
        }

        .login-container {
            width: 100%;
            max-width: 1120px;
            min-height: 650px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: #fff;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 20px 70px rgba(19, 53, 89, .12);
        }

        .brand-panel {
            position: relative;
            min-height: 650px;
            padding: 42px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: #fff;
            background:
                linear-gradient(
                    180deg,
                    rgba(7, 20, 29, .50),
                    rgba(7, 20, 29, .35) 35%,
                    rgba(7, 20, 29, .94)
                ),
                url('https://images.unsplash.com/photo-1547592180-85f173990554?auto=format&fit=crop&w=1200&q=85')
                center / cover no-repeat;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .brand-icon {
            font-size: 39px;
            color: #67e5ff;
        }

        .brand-name {
            font-size: 19px;
            font-weight: 800;
            line-height: 1.15;
        }

        .brand-name span {
            display: block;
            font-size: 10px;
            letter-spacing: 3px;
            font-weight: 500;
            margin-top: 6px;
            color: #d3e8f7;
        }

        .hero-content {
            max-width: 390px;
            margin-top: 100px;
        }

        .hero-content h1 {
            font-size: clamp(32px, 4vw, 43px);
            line-height: 1.12;
            letter-spacing: -1.5px;
            margin-bottom: 20px;
        }

        .hero-content p {
            font-size: 14px;
            line-height: 1.8;
            color: #e1e8ed;
            max-width: 340px;
        }

        .features {
            display: flex;
            flex-direction: column;
            gap: 17px;
            margin-top: 40px;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 13px;
            font-size: 12px;
            color: #f0f5f8;
        }

        .feature i {
            width: 19px;
            font-size: 15px;
            color: #78dff9;
        }

        .login-panel {
            padding: 55px clamp(28px, 5vw, 70px);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .mobile-brand {
            display: none;
        }

        .welcome-label {
            color: var(--primary);
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 13px;
        }

        .login-panel h2 {
            font-size: 34px;
            letter-spacing: -1.3px;
            margin-bottom: 12px;
        }

        .subtitle {
            color: #77869a;
            font-size: 13px;
            line-height: 1.7;
            margin-bottom: 34px;
        }

        .form-group {
            margin-bottom: 21px;
        }

        .validation-error {
            margin: -10px 0 18px;
            color: #dc2626;
            font-size: 11px;
            line-height: 1.5;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .input-wrapper {
            display: flex;
            align-items: center;
            height: 49px;
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 0 14px;
            transition: border-color .2s, box-shadow .2s;
        }

        .input-wrapper:focus-within {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(8, 120, 249, .09);
        }

        .input-wrapper > i {
            color: #8b9bb0;
            font-size: 14px;
            margin-right: 12px;
        }

        .input-wrapper input {
            width: 100%;
            min-width: 0;
            border: none;
            outline: none;
            background: transparent;
            font-family: inherit;
            font-size: 12px;
            color: var(--text);
        }

        .input-wrapper input::placeholder {
            color: #a5b1c1;
        }

        .toggle-password {
            cursor: pointer;
            color: #8492a6;
            padding: 7px;
            border: none;
            background: transparent;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin: 3px 0 25px;
            font-size: 11px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 7px;
            color: #64748b;
        }

        .remember input {
            accent-color: var(--primary);
        }

        a {
            color: var(--primary);
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .login-button {
            width: 100%;
            height: 49px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            border: none;
            border-radius: 9px;
            background: var(--primary);
            color: #fff;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 7px 16px rgba(8, 120, 249, .20);
            transition: background .2s, transform .2s;
        }

        .login-button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 13px;
            color: #a1adbc;
            font-size: 11px;
            margin: 23px 0;
        }

        .divider::before,
        .divider::after {
            content: "";
            height: 1px;
            background: var(--border);
            flex: 1;
        }

        .google-button {
            width: 100%;
            height: 47px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: white;
            color: #43536a;
            font-family: inherit;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .google-button i {
            color: #4285f4;
            font-size: 16px;
        }

        .footer-note {
            margin-top: 29px;
            text-align: center;
            color: #8b98aa;
            font-size: 10px;
        }

        .footer-note i {
            color: var(--primary);
            margin-right: 5px;
        }

        @media (max-width: 760px) {
            body {
                padding: 16px;
                background: #eaf2fb;
            }

            .login-container {
                max-width: 470px;
                grid-template-columns: 1fr;
                min-height: auto;
                border-radius: 18px;
            }

            .brand-panel {
                display: none;
            }

            .login-panel {
                padding: 35px 26px;
            }

            .mobile-brand {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 35px;
                color: var(--navy);
            }

            .mobile-brand i {
                color: var(--primary);
                font-size: 30px;
            }

            .mobile-brand strong {
                font-size: 15px;
            }

            .mobile-brand small {
                display: block;
                margin-top: 4px;
                color: #8391a5;
                font-size: 9px;
                letter-spacing: 2px;
            }

            .login-panel h2 {
                font-size: 29px;
            }
        }

        @media (max-width: 360px) {
            .login-panel {
                padding: 28px 18px;
            }

            .form-options {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <main class="login-container">

        <section class="brand-panel">
            <div class="brand">
                <i class="fa-solid fa-kitchen-set brand-icon"></i>

                <div class="brand-name">
                    Restaurantes
                    <br>
                    Comedores
                    <span>SISTEMA DE GESTIÓN</span>
                </div>
            </div>

            <div class="hero-content">
                <h1>Buena comida,<br>grandes equipos.</h1>

                <p>
                    Administra tus restaurantes y comedores industriales
                    de forma simple y eficiente desde una sola plataforma.
                </p>

                <div class="features">
                    <div class="feature">
                        <i class="fa-solid fa-utensils"></i>
                        <span>Control de operaciones</span>
                    </div>

                    <div class="feature">
                        <i class="fa-solid fa-users"></i>
                        <span>Gestión de sedes y usuarios</span>
                    </div>

                    <div class="feature">
                        <i class="fa-solid fa-chart-column"></i>
                        <span>Reportes en tiempo real</span>
                    </div>
                </div>
            </div>

            <div style="font-size:10px;color:#d3dce4;">
                © 2026 Sistema de Gestión de Restaurantes
            </div>
        </section>

        <section class="login-panel">

            <div class="mobile-brand">
                <i class="fa-solid fa-kitchen-set"></i>
                <div>
                    <strong>Restaurantes y Comedores</strong>
                    <small>SISTEMA DE GESTIÓN</small>
                </div>
            </div>

            <div class="welcome-label">Bienvenido de nuevo</div>

            <h2>Iniciar sesión</h2>

            <p class="subtitle">
                Ingresa tus credenciales para acceder al sistema
                de gestión de restaurantes y comedores industriales.
            </p>

            <form action="{{ route('login.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Correo electrónico</label>

                    <div class="input-wrapper">
                        <i class="fa-regular fa-envelope"></i>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="tu@empresa.com"
                            value="{{ old('email') }}"
                            autocomplete="username"
                            autofocus
                            required
                        >
                    </div>
                </div>

                @error('email')
                    <p class="validation-error" role="alert">{{ $message }}</p>
                @enderror

                <div class="form-group">
                    <label for="password">Contraseña</label>

                    <div class="input-wrapper">
                        <i class="fa-solid fa-lock"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Tu contraseña"
                            autocomplete="current-password"
                            required
                        >

                        <button
                            type="button"
                            class="toggle-password"
                            onclick="togglePassword()"
                            aria-label="Mostrar u ocultar contraseña"
                        >
                            <i class="fa-regular fa-eye" id="eye-icon"></i>
                        </button>
                    </div>
                </div>

                <div class="form-options">
                    <label class="remember">
                        <input type="checkbox" name="remember">
                        <span>Recordarme</span>
                    </label>

                    <a href="#" onclick="return false;">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>

                <button type="submit" class="login-button">
                    Ingresar
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>

            <div class="divider">o</div>

            <button
                type="button"
                class="google-button"
                onclick="alert('El acceso con Google requiere configuración adicional.')"
            >
                <i class="fa-brands fa-google"></i>
                Ingresar con Google
            </button>

            <div class="footer-note">
                <i class="fa-solid fa-shield-halved"></i>
                Una sola plataforma para toda tu operación.
            </div>

        </section>
    </main>

    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const icon = document.getElementById('eye-icon');

            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>

</body>
</html>
