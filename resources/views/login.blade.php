<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Alta Cocina</title>

    <!-- Fuentes e Iconos -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        /* ==========================================================================
           Variables de Color y Tema (Alta Cocina - Negro Mate y Oro Viejo)
           ========================================================================== */
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
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-dark);
            min-height: 100vh;
            margin: 0;
            padding: 0;
            color: var(--text-main);
        }

        /* ==========================================================================
           Contenedor del Fondo (GIF) y la Capa Oscura (Opacidad)
           ========================================================================== */
        .login-background-wrapper {
            position: relative;
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;

            /* RUTA DEL GIF:
               Si estás en Laravel, usa esta línea y borra la de abajo:
               background-image: url('{{ asset("images/logingif.gif") }}'); */
            background-image: url('logingif.gif');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: 1;
        }

        .login-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* Ajusta el 0.80 para hacer el fondo más (0.9) o menos (0.5) oscuro */
            background: rgba(10, 10, 10, 0.80);
            z-index: 2;
        }

        /* ==========================================================================
           Contenedor Principal del Formulario
           ========================================================================== */
        .login-container {
            position: relative;
            z-index: 3; /* Mantiene el formulario sobre el fondo oscuro */
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

        /* ==========================================================================
           Panel Izquierdo: Imagen de Chef Emplatando
           ========================================================================== */
        .brand-panel {
            position: relative;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            background:
                linear-gradient(180deg, rgba(10, 10, 10, 0.2) 20%, rgba(14, 14, 14, 0.95) 90%),
                url('https://images.unsplash.com/photo-1577219491135-ce391730fb2c?q=80&w=1200&auto=format&fit=crop') center / cover no-repeat;
        }

        .hero-content h1 {
            font-size: clamp(2rem, 3vw, 2.6rem);
            font-weight: 300;
            line-height: 1.2;
            margin-bottom: 15px;
            color: #ffffff;
        }

        .hero-content h1 strong {
            font-weight: 600;
            color: var(--primary);
            text-shadow: 0 2px 15px rgba(197, 160, 89, 0.4);
        }

        .hero-content p {
            color: #cccccc;
            font-size: 13.5px;
            line-height: 1.6;
            max-width: 380px;
        }

        /* ==========================================================================
           Panel Derecho: Formulario de Acceso
           ========================================================================== */
        .login-panel {
            padding: 60px 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: #141414;
        }

        .login-header-text h2 {
            font-size: 30px;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .subtitle {
            color: var(--text-muted);
            font-size: 14px;
            margin-bottom: 35px;
            line-height: 1.5;
        }

        /* ==========================================================================
           Campos de Formulario (Inputs)
           ========================================================================== */
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
            height: 52px;
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
            background: transparent;
            border: none;
            outline: none;
            color: var(--text-main);
            font-size: 15px;
            font-family: inherit;
        }

        .input-wrapper input::placeholder {
            color: #555555;
        }

        /* ==========================================================================
           Opciones y Botones
           ========================================================================== */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .login-button {
            width: 100%;
            height: 52px;
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

        /* ==========================================================================
           Diseño Responsivo
           ========================================================================== */
        @media (max-width: 900px) {
            .login-container {
                grid-template-columns: 1fr;
                max-width: 480px;
            }

            .brand-panel {
                display: none;
            }

            .login-panel {
                padding: 40px 30px;
            }
        }
    </style>
</head>

<body>

    <!-- CONTENEDOR DEL FONDO ANIMADO Y LA CAPA OSCURA -->
    <div class="login-background-wrapper">

        <!-- Capa de color para bajar opacidad al GIF -->
        <div class="login-overlay"></div>

        <!-- CONTENEDOR DEL LOGIN ORIGINAL -->
        <div class="login-container">

            <!-- Panel Izquierdo -->
            <div class="brand-panel">
                <div class="hero-content">
                    <h1>Alta<br><strong>Cocina</strong></h1>
                    <p>Accede al sistema de gestión de tu restaurante para administrar reservas, inventarios y personal.</p>
                </div>
            </div>

            <!-- Panel Derecho (Formulario) -->
            <div class="login-panel">
                <div class="login-header-text">
                    <h2>Iniciar sesión</h2>
                    <p class="subtitle">Ingresa tus credenciales para continuar.</p>
                </div>

                <!-- NOTA: Si usas Laravel, puedes apuntar el action a la ruta correspondiente, ej: action="{{ route('login.post') }}" -->
                <form action="#" method="POST">
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <div class="input-wrapper">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" id="email" name="email" placeholder="ejemplo@restaurante.com" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <div class="input-wrapper">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" id="password" name="password" placeholder="••••••••" required>
                        </div>
                    </div>

                    <div class="form-options">
                        <label>
                            <input type="checkbox" name="remember"> Recordarme
                        </label>
                        <a href="#">¿Olvidaste tu contraseña?</a>
                    </div>

                    <button type="submit" class="login-button">Acceder</button>
                </form>
            </div>

        </div>
    </div>

</body>
</html>
