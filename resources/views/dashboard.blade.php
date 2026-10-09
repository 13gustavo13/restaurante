
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Restaurante</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-light: #eff6ff;
            --sidebar: #142b4a;
            --sidebar-hover: #203f65;
            --background: #f3f7fc;
            --white: #ffffff;
            --text: #1e293b;
            --muted: #64748b;
            --border: #e2e8f0;
            --success: #16a34a;
            --warning: #d97706;
            --info: #0284c7;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--background);
            color: var(--text);
        }

        a {
            text-decoration: none;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* MENÚ LATERAL */

        .sidebar {
            width: 255px;
            min-width: 255px;
            background: var(--sidebar);
            color: white;
            padding: 25px 17px;
            display: flex;
            flex-direction: column;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 5px 10px 30px;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            border-radius: 12px;
            background: var(--primary);
            display: grid;
            place-items: center;
            font-size: 21px;
        }

        .brand h2 {
            font-size: 19px;
            font-weight: 700;
        }

        .brand span {
            display: block;
            font-size: 10px;
            color: #a9c4e5;
            font-weight: 400;
            margin-top: 2px;
        }

        .menu-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #8faac9;
            margin: 18px 12px 11px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 14px;
            margin-bottom: 5px;
            color: #d1deee;
            border-radius: 9px;
            font-size: 12px;
            transition: .2s;
        }

        .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 15px;
        }

        .nav-link:hover,
        .nav-link.active {
            background: var(--primary);
            color: white;
        }

        .nav-link.active {
            box-shadow: 0 5px 15px rgba(37, 99, 235, .22);
        }

        .logout-button {
            width: 100%;
            border: 0;
            background: transparent;
            font-family: inherit;
            cursor: pointer;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 25px;
        }

        .help-card {
            background: rgba(255, 255, 255, .07);
            border: 1px solid rgba(255, 255, 255, .08);
            border-radius: 12px;
            padding: 16px;
            margin: 12px 3px;
        }

        .help-card i {
            color: #93c5fd;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .help-card strong {
            display: block;
            font-size: 12px;
            margin-bottom: 6px;
        }

        .help-card p {
            color: #a9bed8;
            font-size: 10px;
            line-height: 1.7;
        }

        /* CONTENIDO */

        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            min-height: 82px;
            padding: 18px 32px;
            background: var(--white);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .page-title h1 {
            font-size: 21px;
            font-weight: 700;
        }

        .page-title p {
            font-size: 11px;
            color: var(--muted);
            margin-top: 5px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .notification {
            position: relative;
            color: #64748b;
            font-size: 19px;
        }

        .notification-dot {
            position: absolute;
            right: -4px;
            top: -4px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #ef4444;
            border: 1px solid white;
        }

        .user {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .avatar {
            width: 42px;
            height: 42px;
            background: #dbeafe;
            color: var(--primary);
            display: grid;
            place-items: center;
            border-radius: 50%;
            font-size: 14px;
            font-weight: 700;
        }

        .user-info strong {
            display: block;
            font-size: 12px;
        }

        .user-info span {
            display: block;
            color: var(--muted);
            font-size: 10px;
            margin-top: 3px;
        }

        .content {
            padding: 30px 32px;
            max-width: 1600px;
            margin: auto;
        }

        /* BIENVENIDA */

        .welcome {
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 31px;
            margin-bottom: 28px;
            border-radius: 16px;
            color: white;
            background: linear-gradient(115deg, #1d4ed8, #3b82f6);
        }

        .welcome::after {
            content: "";
            position: absolute;
            width: 240px;
            height: 240px;
            border: 35px solid rgba(255,255,255,.07);
            border-radius: 50%;
            right: 45px;
            top: -110px;
        }

        .welcome-text {
            position: relative;
            z-index: 1;
        }

        .welcome h2 {
            font-size: 24px;
            margin-bottom: 9px;
        }

        .welcome p {
            font-size: 12px;
            color: #e0edff;
            line-height: 1.8;
            max-width: 550px;
        }

        .welcome-button {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-top: 18px;
            padding: 11px 17px;
            background: white;
            color: var(--primary);
            border-radius: 8px;
            font-size: 11px;
            font-weight: 600;
            transition: .2s;
        }

        .welcome-button:hover {
            background: #eff6ff;
            transform: translateY(-2px);
        }

        .welcome-icon {
            position: relative;
            z-index: 1;
            margin-right: 25px;
            font-size: 67px;
            color: rgba(255,255,255,.88);
        }

        /* TÍTULOS */

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 17px;
        }

        .section-heading h3 {
            font-size: 16px;
            font-weight: 600;
        }

        .section-heading p,
        .section-heading span {
            color: var(--muted);
            font-size: 11px;
        }

        /* INDICADORES */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--white);
            padding: 21px;
            border: 1px solid var(--border);
            border-radius: 13px;
            transition: .2s;
        }

        .stat-card:hover {
            border-color: #bfdbfe;
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(30, 64, 175, .05);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 17px;
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            border-radius: 11px;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 18px;
        }

        .stat-card:nth-child(2) .stat-icon {
            background: #fff7ed;
            color: #ea580c;
        }

        .stat-card:nth-child(3) .stat-icon {
            background: #ecfdf5;
            color: #059669;
        }

        .stat-card:nth-child(4) .stat-icon {
            background: #f5f3ff;
            color: #7c3aed;
        }

        .stat-card h4 {
            font-size: 27px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-card p {
            font-size: 11px;
            color: var(--muted);
        }

        .stat-change {
            color: var(--success);
            font-size: 10px;
            margin-top: 12px;
        }

        /* ACCESOS RÁPIDOS */

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .action-card {
            display: block;
            background: white;
            padding: 21px 17px;
            border: 1px solid var(--border);
            border-radius: 12px;
            color: var(--text);
            transition: .2s;
        }

        .action-card:hover {
            border-color: #93c5fd;
            box-shadow: 0 7px 20px rgba(37, 99, 235, .07);
            transform: translateY(-3px);
        }

        .action-icon {
            display: grid;
            place-items: center;
            width: 43px;
            height: 43px;
            margin-bottom: 14px;
            border-radius: 11px;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 19px;
        }

        .action-card strong {
            display: block;
            font-size: 12px;
            margin-bottom: 6px;
        }

        .action-card span {
            color: var(--muted);
            font-size: 10px;
        }

        /* TABLA DE PEDIDOS */

        .table-container {
            background: white;
            border: 1px solid var(--border);
            border-radius: 13px;
            overflow: hidden;
        }

        .table-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 20px;
            border-bottom: 1px solid var(--border);
        }

        .table-header h3 {
            font-size: 15px;
        }

        .view-all {
            font-size: 11px;
            color: var(--primary);
            font-weight: 600;
        }

        .table-scroll {
            overflow-x: auto;
        }

        table {
            width: 100%;
            min-width: 600px;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 16px 20px;
            border-bottom: 1px solid #edf2f7;
            font-size: 11px;
        }

        th {
            background: #f8fafc;
            color: var(--muted);
            font-weight: 500;
        }

        td {
            color: #475569;
        }

        tbody tr:hover {
            background: #f8fbff;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .order-id {
            color: var(--primary);
            font-weight: 600;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        .completed {
            background: #dcfce7;
            color: #15803d;
        }

        .pending {
            background: #fef3c7;
            color: #a16207;
        }

        .preparing {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .footer {
            padding: 24px;
            text-align: center;
            color: #94a3b8;
            font-size: 10px;
        }

        /* DISEÑO RESPONSIVO */

        @media (max-width: 1200px) {
            .stats,
            .quick-actions {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .content {
                padding: 25px 22px;
            }
        }

        @media (max-width: 760px) {
            .layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                min-width: 0;
                padding: 17px;
            }

            .brand {
                padding-bottom: 15px;
            }

            .menu-label {
                margin-top: 12px;
            }

            .sidebar-bottom {
                display: none;
            }

            .topbar {
                padding: 17px;
            }

            .topbar-right {
                gap: 13px;
            }

            .user-info {
                display: none;
            }

            .content {
                padding: 20px 14px;
            }

            .welcome {
                padding: 23px;
            }

            .welcome h2 {
                font-size: 20px;
            }

            .welcome-icon {
                font-size: 42px;
                margin-right: 0;
            }

            .stats,
            .quick-actions {
                gap: 11px;
            }

            .stat-card {
                padding: 15px;
            }

            .stat-card h4 {
                font-size: 23px;
            }

            .action-card {
                padding: 16px 12px;
            }
        }

        @media (max-width: 400px) {
            .stats,
            .quick-actions {
                grid-template-columns: 1fr;
            }

            .welcome-icon {
                display: none;
            }

            .page-title h1 {
                font-size: 17px;
            }
        }
    </style>
</head>

<body>
<div class="layout">

    <!-- MENÚ LATERAL -->
    <aside class="sidebar">

        <div class="brand">
            <div class="brand-icon">
                <i class="fa-solid fa-utensils"></i>
            </div>

            <div>
                <h2>Restaurante</h2>
                <span>Sistema de administración</span>
            </div>
        </div>

        <p class="menu-label">General</p>

        <a href="{{ route('dashboard') }}" class="nav-link active">
            <i class="fa-solid fa-house"></i>
            Panel principal
        </a>

        <<a href="{{ route('pedidos') }}" class="nav-link">
    <i class="fa-solid fa-clipboard-list"></i>
    Pedidos
</a>

        <a href="#" class="nav-link">
            <i class="fa-solid fa-bowl-food"></i>
            Menú de alimentos
        </a>

        <a href="#" class="nav-link">
            <i class="fa-solid fa-calendar-days"></i>
            Reservaciones
        </a>

        <a href="{{ route('mesas') }}" class="nav-link">
    <i class="fa-solid fa-chair"></i>
    Mesas y zonas
</a>

        <a href="{{ route('sedes.index') }}" class="nav-link">
            <i class="fa-solid fa-location-dot"></i>
            Sedes
        </a>

        <p class="menu-label">Gestión</p>

        <a href="#" class="nav-link">
            <i class="fa-solid fa-boxes-stacked"></i>
            Inventario
        </a>

        <a href="#" class="nav-link">
            <i class="fa-solid fa-chart-column"></i>
            Reportes
        </a>

        <a href="#" class="nav-link">
            <i class="fa-solid fa-gear"></i>
            Configuración
        </a>

        <div class="sidebar-bottom">
            <div class="help-card">
                <i class="fa-solid fa-circle-question"></i>
                <strong>Centro de ayuda</strong>
                <p>Consulta las opciones disponibles del sistema de administración.</p>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link logout-button">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Cerrar sesión
                </button>
            </form>
        </div>

    </aside>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="main">

        <header class="topbar">

            <div class="page-title">
                <h1>Panel principal</h1>
                <p>Inicio / Dashboard</p>
            </div>

            <div class="topbar-right">

                <a href="#" class="notification" aria-label="Notificaciones">
                    <i class="fa-regular fa-bell"></i>
                    <span class="notification-dot"></span>
                </a>

                <div class="user">
                    <div class="avatar">AD</div>

                    <div class="user-info">
                        <strong>{{ auth()->user()->name }}</strong>
                        <span>{{ auth()->user()->email }}</span>
                    </div>

                    <i class="fa-solid fa-chevron-down"
                       style="font-size: 10px; color: #64748b;"></i>
                </div>

            </div>
        </header>

        <section class="content">

            <!-- BIENVENIDA -->
            <div class="welcome">

                <div class="welcome-text">
                    <h2>¡Bienvenido al sistema!</h2>

                    <p>
                        Administra las operaciones de tu restaurante desde un solo lugar.
                        Consulta los pedidos, organiza las reservaciones y revisa
                        la información general de tu negocio.
                    </p>

                    <a href="#" class="welcome-button">
                        <i class="fa-solid fa-plus"></i>
                        Registrar nuevo pedido
                    </a>
                </div>

                <i class="fa-solid fa-utensils welcome-icon"></i>

            </div>

            <!-- ESTADÍSTICAS -->
            <div class="section-heading">
                <div>
                    <h3>Resumen general</h3>
                    <p>Indicadores de ejemplo del restaurante</p>
                </div>

                <span>
                    <i class="fa-regular fa-calendar"></i>
                    Octubre 2026
                </span>
            </div>

            <div class="stats">

                <article class="stat-card">
                    <div class="stat-top">
                        <div class="stat-icon">
                            <i class="fa-solid fa-receipt"></i>
                        </div>
                    </div>

                    <h4>128</h4>
                    <p>Pedidos registrados</p>
                    <div class="stat-change">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        Total de ejemplo
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-top">
                        <div class="stat-icon">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                    </div>

                    <h4>12</h4>
                    <p>Pedidos pendientes</p>
                    <div class="stat-change" style="color: #d97706;">
                        <i class="fa-regular fa-hourglass-half"></i>
                        Por atender
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-top">
                        <div class="stat-icon">
                            <i class="fa-solid fa-users"></i>
                        </div>
                    </div>

                    <h4>86</h4>
                    <p>Clientes registrados</p>
                    <div class="stat-change">
                        <i class="fa-solid fa-user-check"></i>
                        Registro de ejemplo
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-top">
                        <div class="stat-icon">
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>
                    </div>

                    <h4>9</h4>
                    <p>Reservaciones del día</p>
                    <div class="stat-change">
                        <i class="fa-solid fa-calendar"></i>
                        Agenda de ejemplo
                    </div>
                </article>

            </div>

            <!-- ACCESOS RÁPIDOS -->
            <div class="section-heading">
                <div>
                    <h3>Accesos rápidos</h3>
                    <p>Accede a las principales funciones</p>
                </div>
            </div>

            <div class="quick-actions">

                <a href="#" class="action-card">
                    <div class="action-icon">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <strong>Nuevo pedido</strong>
                    <span>Registrar una orden</span>
                </a>

                <a href="#" class="action-card">
                    <div class="action-icon">
                        <i class="fa-solid fa-book-open"></i>
                    </div>
                    <strong>Menú de alimentos</strong>
                    <span>Consultar los platillos</span>
                </a>

                <a href="#" class="action-card">
                    <div class="action-icon">
                        <i class="fa-solid fa-calendar-plus"></i>
                    </div>
                    <strong>Reservaciones</strong>
                    <span>Gestionar reservaciones</span>
                </a>

                <a href="#" class="action-card">
                    <div class="action-icon">
                        <i class="fa-solid fa-chart-pie"></i>
                    </div>
                    <strong>Reportes</strong>
                    <span>Consultar información</span>
                </a>

            </div>

            <!-- TABLA -->
            <div class="table-container">

                <div class="table-header">
                    <div>
                        <h3>Pedidos recientes</h3>
                    </div>

                    <a href="#" class="view-all">
                        Ver todos
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                <div class="table-scroll">
                    <table>
                        <thead>
                            <tr>
                                <th>N.º de pedido</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Estado</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="order-id">#PED-001</td>
                                <td>Juan Pérez</td>
                                <td>09/10/2026</td>
                                <td>$350.00</td>
                                <td>
                                    <span class="status completed">
                                        Entregado
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td class="order-id">#PED-002</td>
                                <td>María López</td>
                                <td>09/10/2026</td>
                                <td>$180.00</td>
                                <td>
                                    <span class="status preparing">
                                        En preparación
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td class="order-id">#PED-003</td>
                                <td>Carlos Sánchez</td>
                                <td>09/10/2026</td>
                                <td>$420.00</td>
                                <td>
                                    <span class="status pending">
                                        Pendiente
                                    </span>
                                </td>
                            </tr>

                            <tr>
                                <td class="order-id">#PED-004</td>
                                <td>Ana Martínez</td>
                                <td>09/10/2026</td>
                                <td>$260.00</td>
                                <td>
                                    <span class="status completed">
                                        Entregado
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </section>

        <footer class="footer">
            Sistema de gestión de restaurantes © 2026
        </footer>

    </main>

</div>
</body>
</html>
