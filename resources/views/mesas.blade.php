
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mesas y zonas | Restaurante</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --primary-light: #eff6ff;
            --sidebar: #142b4a;
            --background: #f3f7fc;
            --white: #ffffff;
            --text: #1e293b;
            --muted: #64748b;
            --border: #e2e8f0;
            --green: #16a34a;
            --orange: #d97706;
            --red: #dc2626;
            --purple: #7c3aed;
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
            color: inherit;
        }

        button, input, select {
            font: inherit;
        }

        button {
            cursor: pointer;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */

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
        }

        .brand span {
            display: block;
            color: #a9c4e5;
            font-size: 10px;
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
        }

        .nav-link:hover,
        .nav-link.active {
            background: var(--primary);
            color: white;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 25px;
        }

        /* CONTENIDO */

        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            min-height: 82px;
            padding: 18px 32px;
            background: white;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .page-title h1 {
            font-size: 21px;
        }

        .page-title p {
            font-size: 11px;
            color: var(--muted);
            margin-top: 5px;
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

        /* ENCABEZADO */

        .heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 24px;
        }

        .heading h2 {
            font-size: 20px;
            margin-bottom: 6px;
        }

        .heading p {
            color: var(--muted);
            font-size: 12px;
        }

        .btn {
            border: none;
            border-radius: 8px;
            padding: 11px 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            font-size: 11px;
            font-weight: 600;
            transition: .2s;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-hover);
        }

        .btn-outline {
            background: white;
            color: #475569;
            border: 1px solid var(--border);
        }

        .btn-outline:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        /* INDICADORES */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 17px;
            margin-bottom: 27px;
        }

        .stat-card {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 13px;
        }

        .stat-icon {
            width: 46px;
            height: 46px;
            flex-shrink: 0;
            display: grid;
            place-items: center;
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 12px;
            font-size: 19px;
        }

        .stat-card:nth-child(2) .stat-icon {
            background: #dcfce7;
            color: var(--green);
        }

        .stat-card:nth-child(3) .stat-icon {
            background: #fee2e2;
            color: var(--red);
        }

        .stat-card:nth-child(4) .stat-icon {
            background: #fef3c7;
            color: var(--orange);
        }

        .stat-card h3 {
            font-size: 25px;
            margin-bottom: 3px;
        }

        .stat-card p {
            color: var(--muted);
            font-size: 10px;
        }

        /* ZONAS */

        .zones-section {
            margin-bottom: 27px;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 16px;
        }

        .section-header h3 {
            font-size: 16px;
        }

        .section-header p {
            color: var(--muted);
            font-size: 11px;
            margin-top: 4px;
        }

        .zones {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 15px;
        }

        .zone-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 13px;
            padding: 19px;
            text-align: left;
            transition: .2s;
            color: var(--text);
        }

        .zone-card:hover,
        .zone-card.selected {
            border-color: var(--primary);
            box-shadow: 0 5px 18px rgba(37, 99, 235, .08);
        }

        .zone-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .zone-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 11px;
            font-size: 18px;
        }

        .zone-card h4 {
            font-size: 13px;
            margin-bottom: 5px;
        }

        .zone-card p {
            font-size: 10px;
            color: var(--muted);
        }

        .zone-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            border-top: 1px solid #edf2f7;
            padding-top: 13px;
            margin-top: 14px;
        }

        .zone-bottom span {
            font-size: 10px;
            color: var(--muted);
        }

        .zone-bottom strong {
            color: var(--primary);
            font-size: 11px;
        }

        /* FILTROS Y MESAS */

        .tables-panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
        }

        .panel-header {
            padding: 22px;
            border-bottom: 1px solid var(--border);
        }

        .panel-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .panel-title h3 {
            font-size: 16px;
        }

        .panel-title p {
            font-size: 11px;
            color: var(--muted);
            margin-top: 5px;
        }

        .filters {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .search {
            flex: 1;
            min-width: 180px;
            position: relative;
        }

        .search i {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 12px;
        }

        .search input,
        .filters select {
            width: 100%;
            height: 42px;
            border: 1px solid var(--border);
            background: #fff;
            border-radius: 8px;
            color: var(--text);
            font-size: 11px;
            outline: none;
        }

        .search input {
            padding: 0 12px 0 36px;
        }

        .filters select {
            width: auto;
            min-width: 155px;
            padding: 0 12px;
        }

        .search input:focus,
        .filters select:focus {
            border-color: var(--primary);
        }

        .legend {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            padding: 18px 22px 0;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 7px;
            color: var(--muted);
            font-size: 10px;
        }

        .dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
        }

        .dot.available { background: var(--green); }
        .dot.occupied { background: var(--red); }
        .dot.reserved { background: var(--orange); }
        .dot.cleaning { background: var(--purple); }

        .tables-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            padding: 22px;
        }

        .table-card {
            position: relative;
            min-width: 0;
            background: white;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 18px 14px;
            text-align: center;
            transition: .2s;
        }

        .table-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(15, 23, 42, .06);
        }

        .table-number {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .table-zone {
            color: var(--muted);
            font-size: 10px;
            margin-bottom: 15px;
        }

        .table-graphic {
            width: 70px;
            height: 58px;
            margin: 0 auto 16px;
            display: grid;
            place-items: center;
            position: relative;
        }

        .table-shape {
            width: 48px;
            height: 39px;
            border: 3px solid currentColor;
            border-radius: 10px;
            display: grid;
            place-items: center;
            font-size: 15px;
            position: relative;
            z-index: 1;
            background: white;
        }

        .chair {
            width: 13px;
            height: 13px;
            border: 2px solid currentColor;
            border-radius: 4px;
            position: absolute;
        }

        .chair.top { top: 0; left: 28px; }
        .chair.bottom { bottom: 0; left: 28px; }
        .chair.left { left: 0; top: 22px; }
        .chair.right { right: 0; top: 22px; }

        .table-card.available {
            color: var(--green);
            border-top: 3px solid var(--green);
        }

        .table-card.occupied {
            color: var(--red);
            border-top: 3px solid var(--red);
        }

        .table-card.reserved {
            color: var(--orange);
            border-top: 3px solid var(--orange);
        }

        .table-card.cleaning {
            color: var(--purple);
            border-top: 3px solid var(--purple);
        }

        .table-status {
            display: inline-block;
            border-radius: 20px;
            padding: 6px 10px;
            font-size: 9px;
            font-weight: 600;
        }

        .available .table-status {
            background: #dcfce7;
            color: #15803d;
        }

        .occupied .table-status {
            background: #fee2e2;
            color: #b91c1c;
        }

        .reserved .table-status {
            background: #fef3c7;
            color: #a16207;
        }

        .cleaning .table-status {
            background: #ede9fe;
            color: #6d28d9;
        }

        .table-info {
            margin-top: 12px;
            font-size: 10px;
            color: var(--muted);
        }

        .table-action {
            width: 100%;
            border: 1px solid var(--border);
            background: white;
            color: var(--primary);
            border-radius: 7px;
            padding: 8px;
            margin-top: 13px;
            font-size: 10px;
            font-weight: 600;
        }

        .table-action:hover {
            background: var(--primary-light);
        }

        .empty-state {
            display: none;
            text-align: center;
            padding: 45px 20px;
            color: var(--muted);
            font-size: 12px;
        }

        .empty-state i {
            display: block;
            font-size: 28px;
            margin-bottom: 12px;
            color: #94a3b8;
        }

        .footer {
            padding: 24px;
            text-align: center;
            color: #94a3b8;
            font-size: 10px;
        }

        /* MODAL */

        .modal {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, .55);
            z-index: 100;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal.open {
            display: flex;
        }

        .modal-content {
            background: white;
            width: 100%;
            max-width: 430px;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 20px 60px rgba(15, 23, 42, .2);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-header h3 {
            font-size: 17px;
        }

        .close-modal {
            border: none;
            background: #f1f5f9;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            color: #475569;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid var(--border);
            background: white;
            border-radius: 8px;
            font-size: 12px;
            color: var(--text);
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 23px;
        }

        /* RESPONSIVE */

        @media (max-width: 1200px) {
            .stats,
            .zones {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .tables-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
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

            .user-info {
                display: none;
            }

            .content {
                padding: 20px 14px;
            }

            .stats {
                gap: 10px;
            }

            .stat-card {
                padding: 14px;
                gap: 10px;
            }

            .stat-icon {
                width: 37px;
                height: 37px;
                font-size: 15px;
            }

            .stat-card h3 {
                font-size: 22px;
            }

            .tables-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                padding: 15px;
                gap: 11px;
            }

            .panel-header {
                padding: 16px;
            }

            .filters select {
                flex: 1;
                min-width: 0;
            }
        }

        @media (max-width: 390px) {
            .stats,
            .zones {
                grid-template-columns: 1fr;
            }

            .heading .btn {
                width: 100%;
            }

            .tables-grid {
                grid-template-columns: 1fr;
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

        <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="fa-solid fa-house"></i>
            Panel principal
        </a>

        <a href="#" class="nav-link">
            <i class="fa-solid fa-clipboard-list"></i>
            Pedidos
        </a>

        <a href="#" class="nav-link">
            <i class="fa-solid fa-bowl-food"></i>
            Menú de alimentos
        </a>

        <a href="#" class="nav-link active">
            <i class="fa-solid fa-chair"></i>
            Mesas y zonas
        </a>

        <a href="#" class="nav-link">
            <i class="fa-solid fa-calendar-days"></i>
            Reservaciones
        </a>

        <a href="#" class="nav-link">
            <i class="fa-solid fa-users"></i>
            Clientes
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
            <a href="{{ route('login') }}" class="nav-link">
                <i class="fa-solid fa-right-from-bracket"></i>
                Cerrar sesión
            </a>
        </div>

    </aside>

    <!-- ÁREA PRINCIPAL -->
    <main class="main">

        <header class="topbar">

            <div class="page-title">
                <h1>Mesas y zonas</h1>
                <p>Inicio / Gestión / Mesas y zonas</p>
            </div>

            <div class="user">
                <div class="avatar">AD</div>

                <div class="user-info">
                    <strong>Administrador</strong>
                    <span>Administrador del sistema</span>
                </div>
            </div>

        </header>

        <section class="content">

            <!-- ENCABEZADO -->
            <div class="heading">
                <div>
                    <h2>Distribución del restaurante</h2>
                    <p>Consulta la disponibilidad y administra las mesas por zona.</p>
                </div>

                <button class="btn btn-primary" id="openAddTable">
                    <i class="fa-solid fa-plus"></i>
                    Agregar mesa
                </button>
            </div>

            <!-- INDICADORES -->
            <div class="stats">

                <article class="stat-card">
                    <div class="stat-icon">
                        <i class="fa-solid fa-chair"></i>
                    </div>
                    <div>
                        <h3 id="totalTables">12</h3>
                        <p>Total de mesas</p>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <div>
                        <h3 id="availableCount">5</h3>
                        <p>Mesas disponibles</p>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div>
                        <h3 id="occupiedCount">4</h3>
                        <p>Mesas ocupadas</p>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                    <div>
                        <h3 id="reservedCount">2</h3>
                        <p>Mesas reservadas</p>
                    </div>
                </article>

            </div>

            <!-- ZONAS -->
            <section class="zones-section">

                <div class="section-header">
                    <div>
                        <h3>Zonas del restaurante</h3>
                        <p>Selecciona una zona para filtrar sus mesas.</p>
                    </div>

                    <button class="btn btn-outline" id="showAllZones">
                        <i class="fa-solid fa-border-all"></i>
                        Todas las zonas
                    </button>
                </div>

                <div class="zones">

                    <button class="zone-card selected" data-zone="Todas">
                        <div class="zone-top">
                            <div class="zone-icon">
                                <i class="fa-solid fa-border-all"></i>
                            </div>
                            <i class="fa-solid fa-arrow-right"
                               style="color:#94a3b8;font-size:12px;"></i>
                        </div>

                        <h4>Todas las zonas</h4>
                        <p>Vista general del restaurante</p>

                        <div class="zone-bottom">
                            <span>Mesas registradas</span>
                            <strong>12 mesas</strong>
                        </div>
                    </button>

                    <button class="zone-card" data-zone="Interior">
                        <div class="zone-top">
                            <div class="zone-icon">
                                <i class="fa-solid fa-house"></i>
                            </div>
                            <i class="fa-solid fa-arrow-right"
                               style="color:#94a3b8;font-size:12px;"></i>
                        </div>

                        <h4>Salón interior</h4>
                        <p>Área principal del restaurante</p>

                        <div class="zone-bottom">
                            <span>Capacidad</span>
                            <strong>24 personas</strong>
                        </div>
                    </button>

                    <button class="zone-card" data-zone="Terraza">
                        <div class="zone-top">
                            <div class="zone-icon">
                                <i class="fa-solid fa-umbrella-beach"></i>
                            </div>
                            <i class="fa-solid fa-arrow-right"
                               style="color:#94a3b8;font-size:12px;"></i>
                        </div>

                        <h4>Terraza</h4>
                        <p>Área al aire libre</p>

                        <div class="zone-bottom">
                            <span>Capacidad</span>
                            <strong>16 personas</strong>
                        </div>
                    </button>

                    <button class="zone-card" data-zone="Privado">
                        <div class="zone-top">
                            <div class="zone-icon">
                                <i class="fa-solid fa-door-closed"></i>
                            </div>
                            <i class="fa-solid fa-arrow-right"
                               style="color:#94a3b8;font-size:12px;"></i>
                        </div>

                        <h4>Salón privado</h4>
                        <p>Espacio para grupos</p>

                        <div class="zone-bottom">
                            <span>Capacidad</span>
                            <strong>12 personas</strong>
                        </div>
                    </button>

                </div>
            </section>

            <!-- MESAS -->
            <section class="tables-panel">

                <div class="panel-header">

                    <div class="panel-title">
                        <div>
                            <h3>Estado de las mesas</h3>
                            <p id="resultsText">Mostrando las 12 mesas registradas</p>
                        </div>
                    </div>

                    <div class="filters">

                        <div class="search">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input
                                type="search"
                                id="searchTable"
                                placeholder="Buscar mesa por número..."
                            >
                        </div>

                        <select id="filterZone" aria-label="Filtrar por zona">
                            <option value="Todas">Todas las zonas</option>
                            <option value="Interior">Salón interior</option>
                            <option value="Terraza">Terraza</option>
                            <option value="Privado">Salón privado</option>
                        </select>

                        <select id="filterStatus" aria-label="Filtrar por estado">
                            <option value="Todos">Todos los estados</option>
                            <option value="available">Disponible</option>
                            <option value="occupied">Ocupada</option>
                            <option value="reserved">Reservada</option>
                            <option value="cleaning">En limpieza</option>
                        </select>

                    </div>

                </div>

                <div class="legend">
                    <div class="legend-item">
                        <span class="dot available"></span>
                        Disponible
                    </div>

                    <div class="legend-item">
                        <span class="dot occupied"></span>
                        Ocupada
                    </div>

                    <div class="legend-item">
                        <span class="dot reserved"></span>
                        Reservada
                    </div>

                    <div class="legend-item">
                        <span class="dot cleaning"></span>
                        En limpieza
                    </div>
                </div>

                <div class="tables-grid" id="tablesGrid">

                    <!-- Las tarjetas de las mesas se generan con JavaScript -->

                </div>

                <div class="empty-state" id="emptyState">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    No se encontraron mesas con esos filtros.
                </div>

            </section>

        </section>

        <footer class="footer">
            Sistema de gestión de restaurantes © 2026
        </footer>

    </main>

</div>

<!-- MODAL PARA AGREGAR MESA -->
<div class="modal" id="tableModal">

    <div class="modal-content">

        <div class="modal-header">
            <h3>Agregar nueva mesa</h3>

            <button class="close-modal" id="closeModal" aria-label="Cerrar">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>

        <form id="tableForm">

            <div class="form-group">
                <label for="tableName">Número o nombre de la mesa</label>
                <input
                    type="text"
                    id="tableName"
                    placeholder="Ej. Mesa 13"
                    required
                >
            </div>

            <div class="form-group">
                <label for="tableZone">Zona</label>
                <select id="tableZone" required>
                    <option value="Interior">Salón interior</option>
                    <option value="Terraza">Terraza</option>
                    <option value="Privado">Salón privado</option>
                </select>
            </div>

            <div class="form-group">
                <label for="tableCapacity">Capacidad de personas</label>
                <input
                    type="number"
                    id="tableCapacity"
                    min="1"
                    max="30"
                    value="4"
                    required
                >
            </div>

            <div class="form-group">
                <label for="tableInitialStatus">Estado inicial</label>
                <select id="tableInitialStatus" required>
                    <option value="available">Disponible</option>
                    <option value="occupied">Ocupada</option>
                    <option value="reserved">Reservada</option>
                    <option value="cleaning">En limpieza</option>
                </select>
            </div>

            <div class="modal-actions">
                <button type="button" class="btn btn-outline" id="cancelModal">
                    Cancelar
                </button>

                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i>
                    Agregar mesa
                </button>
            </div>

        </form>
    </div>

</div>

<script>
    // Datos demostrativos. No se guardan en una base de datos.
    let tables = [
        { name: 'Mesa 01', zone: 'Interior', capacity: 4, status: 'available' },
        { name: 'Mesa 02', zone: 'Interior', capacity: 4, status: 'occupied' },
        { name: 'Mesa 03', zone: 'Interior', capacity: 2, status: 'available' },
        { name: 'Mesa 04', zone: 'Interior', capacity: 6, status: 'reserved' },

        { name: 'Mesa 05', zone: 'Interior', capacity: 4, status: 'occupied' },
        { name: 'Mesa 06', zone: 'Interior', capacity: 2, status: 'available' },
        { name: 'Mesa 07', zone: 'Terraza', capacity: 4, status: 'available' },
        { name: 'Mesa 08', zone: 'Terraza', capacity: 4, status: 'occupied' },

        { name: 'Mesa 09', zone: 'Terraza', capacity: 6, status: 'reserved' },
        { name: 'Mesa 10', zone: 'Terraza', capacity: 2, status: 'available' },
        { name: 'Mesa 11', zone: 'Privado', capacity: 6, status: 'cleaning' },
        { name: 'Mesa 12', zone: 'Privado', capacity: 6, status: 'occupied' }
    ];

    const statusLabels = {
        available: 'Disponible',
        occupied: 'Ocupada',
        reserved: 'Reservada',
        cleaning: 'En limpieza'
    };

    const statusIcons = {
        available: 'fa-circle-check',
        occupied: 'fa-users',
        reserved: 'fa-calendar-check',
        cleaning: 'fa-broom'
    };

    const tablesGrid = document.getElementById('tablesGrid');
    const emptyState = document.getElementById('emptyState');
    const searchInput = document.getElementById('searchTable');
    const filterZone = document.getElementById('filterZone');
    const filterStatus = document.getElementById('filterStatus');
    const resultsText = document.getElementById('resultsText');

    let selectedZone = 'Todas';

    function renderTables() {
        const search = searchInput.value.trim().toLowerCase();
        const zone = filterZone.value;
        const status = filterStatus.value;

        const filtered = tables.filter(table => {
            const matchesName = table.name.toLowerCase().includes(search);
            const matchesZone = zone === 'Todas' || table.zone === zone;
            const matchesStatus = status === 'Todos' || table.status === status;

            return matchesName && matchesZone && matchesStatus;
        });

        tablesGrid.innerHTML = '';

        filtered.forEach(table => {
            const card = document.createElement('article');
            card.className = `table-card ${table.status}`;

            const graphic = document.createElement('div');
            graphic.className = 'table-graphic';

            graphic.innerHTML = `
                <span class="chair top"></span>
                <span class="chair bottom"></span>
                <span class="chair left"></span>
                <span class="chair right"></span>
                <div class="table-shape">
                    <i class="fa-solid ${statusIcons[table.status]}"></i>
                </div>
            `;

            const number = document.createElement('div');
            number.className = 'table-number';
            number.textContent = table.name;

            const zoneLabel = document.createElement('div');
            zoneLabel.className = 'table-zone';
            zoneLabel.textContent = table.zone === 'Interior'
                ? 'Salón interior'
                : table.zone === 'Privado'
                    ? 'Salón privado'
                    : 'Terraza';

            const statusLabel = document.createElement('span');
            statusLabel.className = 'table-status';
            statusLabel.textContent = statusLabels[table.status];

            const info = document.createElement('div');
            info.className = 'table-info';
            info.textContent = `${table.capacity} personas`;

            const action = document.createElement('button');
            action.className = 'table-action';
            action.type = 'button';
            action.textContent = 'Cambiar estado';

            action.addEventListener('click', () => {
                changeTableStatus(table);
            });

            card.append(number, zoneLabel, graphic, statusLabel, info, action);
            tablesGrid.appendChild(card);
        });

        emptyState.style.display = filtered.length ? 'none' : 'block';

        resultsText.textContent = `Mostrando ${filtered.length} de ${tables.length} mesas`;

        updateStats();
        updateZoneCounts();
    }

    function updateStats() {
        document.getElementById('totalTables').textContent = tables.length;

        document.getElementById('availableCount').textContent =
            tables.filter(table => table.status === 'available').length;

        document.getElementById('occupiedCount').textContent =
            tables.filter(table => table.status === 'occupied').length;

        document.getElementById('reservedCount').textContent =
            tables.filter(table => table.status === 'reserved').length;
    }

    function updateZoneCounts() {
        document.querySelectorAll('.zone-card').forEach(card => {
            const zone = card.dataset.zone;

            const count = zone === 'Todas'
                ? tables.length
                : tables.filter(table => table.zone === zone).length;

            const strong = card.querySelector('.zone-bottom strong');

            if (strong) {
                strong.textContent = `${count} ${count === 1 ? 'mesa' : 'mesas'}`;
            }
        });
    }

    function changeTableStatus(table) {
        const nextStatus = {
            available: 'occupied',
            occupied: 'cleaning',
            cleaning: 'available',
            reserved: 'occupied'
        };

        const next = nextStatus[table.status];

        if (!confirm(`¿Cambiar el estado de ${table.name} a "${statusLabels[next]}"?`)) {
            return;
        }

        table.status = next;
        renderTables();
    }

    // Filtros
    searchInput.addEventListener('input', renderTables);
    filterZone.addEventListener('change', renderTables);
    filterStatus.addEventListener('change', renderTables);

    // Selección de zonas
    document.querySelectorAll('.zone-card').forEach(card => {
        card.addEventListener('click', () => {
            selectedZone = card.dataset.zone;
            filterZone.value = selectedZone;

            document.querySelectorAll('.zone-card').forEach(item => {
                item.classList.toggle('selected', item === card);
            });

            renderTables();
        });
    });

    document.getElementById('showAllZones').addEventListener('click', () => {
        selectedZone = 'Todas';
        filterZone.value = 'Todas';

        document.querySelectorAll('.zone-card').forEach(card => {
            card.classList.toggle('selected', card.dataset.zone === 'Todas');
        });

        renderTables();
    });

    // Modal
    const modal = document.getElementById('tableModal');
    const tableForm = document.getElementById('tableForm');

    function openModal() {
        modal.classList.add('open');
        document.getElementById('tableName').focus();
    }

    function closeModal() {
        modal.classList.remove('open');
        tableForm.reset();
    }

    document.getElementById('openAddTable').addEventListener('click', openModal);
    document.getElementById('closeModal').addEventListener('click', closeModal);
    document.getElementById('cancelModal').addEventListener('click', closeModal);

    modal.addEventListener('click', event => {
        if (event.target === modal) {
            closeModal();
        }
    });

    document.addEventListener('keydown', event => {
        if (event.key === 'Escape') {
            closeModal();
        }
    });

    tableForm.addEventListener('submit', event => {
        event.preventDefault();

        const name = document.getElementById('tableName').value.trim();
        const zone = document.getElementById('tableZone').value;
        const capacity = Number(document.getElementById('tableCapacity').value);
        const status = document.getElementById('tableInitialStatus').value;

        if (!name || !Number.isInteger(capacity) || capacity < 1) {
            alert('Ingresa un nombre y una capacidad válida.');
            return;
        }

        const duplicate = tables.some(
            table => table.name.toLowerCase() === name.toLowerCase()
        );

        if (duplicate) {
            alert('Ya existe una mesa con ese nombre.');
            return;
        }

        tables.push({ name, zone, capacity, status });

        closeModal();

        selectedZone = 'Todas';
        filterZone.value = 'Todas';
        filterStatus.value = 'Todos';
        searchInput.value = '';

        document.querySelectorAll('.zone-card').forEach(card => {
            card.classList.toggle('selected', card.dataset.zone === 'Todas');
        });

        renderTables();
    });

    // Primera carga
    renderTables();
</script>

</body>
</html>
