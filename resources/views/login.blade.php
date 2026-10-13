<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión | Alta Cocina</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- Tu hoja de estilos principal -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <!-- Estilos añadidos para el fondo GIF y la capa de opacidad -->
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        /* Contenedor principal que sostiene el GIF de fondo */
        .login-background-wrapper {
            position: relative;
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            
            /* Usando Laravel asset() apuntando a la carpeta "imagenes" */
            background-image: url('{{ asset("imagenes/logingif.gif") }}'); 
            
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: 1;
        }

        /* Capa superpuesta para oscurecer el GIF (opacidad baja) */
        .login-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* El 0.85 controla qué tan oscuro es. Cámbialo si quieres ver más o menos el GIF */
            background: rgba(10, 10, 10, 0.85); 
            z-index: 2;
        }

        /* Aseguramos que tu contenedor original quede por encima de la capa oscura */
        .login-container {
            position: relative;
            z-index: 3;
        }
    </style>
</head>
<body>

    <!-- NUEVO CONTENEDOR PARA EL FONDO ANIMADO -->
    <div class="login-background-wrapper">
        
        <!-- CAPA OSCURA -->
        <div class="login-overlay"></div>

        <!-- TU ESTRUCTURA ORIGINAL (INTACTA) -->
        <div class="login-container">
            <!-- Panel Izquierdo: Imagen del Chef Emplatando -->
            <div class="brand-panel">
                <div class="brand-name">
                    <!-- Espacio superior limpio o marca de alta cocina -->
                </div>
                <div class="hero-content">
                    <h1>El arte de gestionar la <strong>Alta Cocina</strong>.</h1>
                    <p>Plataforma exclusiva para la administración integral de sedes, servicios y control operativo industrial.</p>
                </div>
            </div>

            <!-- Panel Derecho: Formulario de Acceso -->
            <div class="login-panel">
                <div class="login-header-text">
                    <h2>INICIO DE SESIÓN</h2>
                    <p class="subtitle">Ingresa tus credenciales autorizadas para gestionar tus operaciones.</p>
                </div>

                <!-- Mensajes de Error de Validación -->
                @if ($errors->any())
                    <div style="background: rgba(255, 74, 74, 0.1); border-left: 3px solid #ff4a4a; padding: 12px; margin-bottom: 20px; border-radius: 4px; font-size: 13px; color: #ff8b8b;">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="correo">Correo Electrónico</label>
                        <div class="input-wrapper">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" id="correo" name="correo" value="{{ old('correo') }}" placeholder="ejemplo@correo.com" required autofocus>
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

                    <button type="submit" class="login-button">Ingresar al Dashboard</button>
                </form>
            </div>
        </div>
        <!-- FIN DE TU ESTRUCTURA ORIGINAL -->

    </div>

</body>
</html>