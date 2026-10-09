```html
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos | Restaurante</title>

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
            --white: #fff;
            --text: #1e293b;
            --muted: #64748b;
            --border: #e2e8f0;
            --success: #15803d;
            --warning: #a16207;
            --danger: #b91c1c;
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

        a { text-decoration: none; }

        button, input, select {
            font-family: inherit;
        }

        button { cursor: pointer; }

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

        .brand h2 { font-size: 19px; }

        .brand span {
            display: block;
            font-size: 10px;
            color: #a9c4e5;
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

        .page-title h1 { font-size: 21px; }

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

        .page-banner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 25px 28px;
            margin-bottom: 25px;
            color: white;
            border-radius: 15px;
            background: linear-gradient(115deg, #1d4ed8, #3b82f6);
        }

        .page-banner h2 {
            font-size: 22px;
            margin-bottom: 7px;
        }

        .page-banner p {
            color: #e0edff;
            font-size: 12px;
            line-height: 1.7;
        }

        .banner-icon {
            font-size: 55px;
            opacity: .8;
            margin-right: 15px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            border: none;
            border-radius: 8px;
            padding: 11px 16px;
            font-size: 11px;
            font-weight: 600;
            transition: .2s;
        }

        .btn-primary {
            color: white;
            background: var(--primary);
        }

        .btn-primary:hover { background: var(--primary-hover); }

        .btn-white {
            color: var(--primary);
            background: white;
            margin-top: 15px;
        }

        .btn-white:hover { background: #eff6ff; }

        .btn-light {
            background: #f1f5f9;
            color: #475569;
        }

        /* ESTADÍSTICAS */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 17px;
            margin-bottom: 28px;
        }

        .stat-card {
            padding: 20px;
            background: white;
            border: 1px solid var(--border);
            border-radius: 13px;
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 11px;
            color: var(--primary);
            background: var(--primary-light);
            font-size: 18px;
        }

        .stat-card:nth-child(2) .stat-icon {
            color: #a16207;
            background: #fef3c7;
        }

        .stat-card:nth-child(3) .stat-icon {
            color: #1d4ed8;
            background: #dbeafe;
        }

        .stat-card:nth-child(4) .stat-icon {
            color: #15803d;
            background: #dcfce7;
        }

        .stat-card h3 {
            font-size: 27px;
            margin-bottom: 4px;
        }

        .stat-card p {
            color: var(--muted);
            font-size: 11px;
        }

        /* FILTROS Y TABLA */

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 17px;
        }

        .section-heading h3 { font-size: 16px; }

        .section-heading p {
            font-size: 11px;
            color: var(--muted);
            margin-top: 4px;
        }

        .table-container {
            background: white;
            border: 1px solid var(--border);
            border-radius: 13px;
            overflow: hidden;
        }

        .filters {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 18px 20px;
            border-bottom: 1px solid var(--border);
            flex-wrap: wrap;
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 200px;
        }

        .search-box i {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 13px;
        }

        .search-box input {
            width: 100%;
            padding: 11px 12px 11px 37px;
            border: 1px solid var(--border);
            border-radius: 8px;
            outline: none;
            font-size: 11px;
        }

        .filters select {
            min-width: 155px;
            padding: 11px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: white;
            color: #475569;
            font-size: 11px;
            outline: none;
        }

        input:focus, select:focus {
            border-color: #93c5fd;
            box-shadow: 0 0 0 3px #eff6ff;
        }

        .table-scroll { overflow-x: auto; }

        table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px 18px;
            text-align: left;
            border-bottom: 1px solid #edf2f7;
            font-size: 11px;
        }

        th {
            color: var(--muted);
            background: #f8fafc;
            font-weight: 500;
        }

        td { color: #475569; }

        tbody tr:hover { background: #f8fbff; }

        tbody tr:last-child td { border-bottom: none; }

        .order-id {
            color: var(--primary);
            font-weight: 600;
        }

        .customer {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .customer-avatar {
            width: 32px;
            height: 32px;
            display: grid;
            place-items: center;
            border-radius: 50%;
            background: #dbeafe;
            color: #1d4ed8;
            font-weight: 600;
            font-size: 10px;
        }

        .customer-name {
            color: var(--text);
            font-weight: 500;
        }

        .customer small {
            display: block;
            color: var(--muted);
            font-size: 9px;
            margin-top: 3px;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        .status-pendiente {
            background: #fef3c7;
            color: #a16207;
        }

        .status-preparacion {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .status-entregado {
            background: #dcfce7;
            color: #15803d;
        }

        .status-cancelado {
            background: #fee2e2;
            color: #b91c1c;
        }

        .actions {
            display: flex;
            gap: 7px;
        }

        .icon-btn {
            width: 31px;
            height: 31px;
            display: grid;
            place-items: center;
            border: 1px solid var(--border);
            border-radius: 7px;
            background: white;
            color: #64748b;
        }

        .icon-btn:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        .empty-row {
            text-align: center;
            padding: 35px;
            color: var(--muted);
        }

        .table-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 17px 20px;
            border-top: 1px solid var(--border);
            color: var(--muted);
            font-size: 10px;
        }

        .footer {
            padding: 24px;
            text-align: center;
            color: #94a3b8;
            font-size: 10px;
        }

        /* MODAL */

        .modal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 100;
            background: rgba(15, 23, 42, .55);
            padding: 20px;
            align-items: center;
            justify-content: center;
        }

        .modal.show { display: flex; }

        .modal-content {
            width: 100%;
            max-width: 500px;
            max-height: 90vh;
            overflow-y: auto;
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 20px 50px rgba(0,0,0,.15);
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .modal-header h3 { font-size: 18px; }

        .close-modal {
            border: none;
            background: transparent;
            color: #64748b;
            font-size: 21px;
        }

        .form-group { margin-bottom: 16px; }

        .form-group label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            margin-bottom: 7px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 11px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 12px;
            background: white;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 13px;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 22px;
        }

        /* RESPONSIVO */

        @media (max-width: 1200px) {
            .stats { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .content { padding: 25px 22px; }
        }

        @media (max-width: 760px) {
            .layout { flex-direction: column; }

            .sidebar {
                width: 100%;
                min-width: 0;
                padding: 17px;
            }

            .brand { padding-bottom: 15px; }
            .menu-label { margin-top: 12px; }
            .sidebar-bottom { display: none; }

            .topbar { padding: 17px; }
            .user-info { display: none; }
            .content { padding: 20px 14px; }

            .page-banner { padding: 22px; }
            .page-banner h2 { font-size: 19px; }
            .banner-icon { font-size: 38px; margin: 0; }

            .filters { padding: 14px; }
            .search-box { flex-basis: 100%; }
            .filters select { flex: 1; min-width: 120px; }

            .section-heading { align-items: flex-start; }
        }

        @media (max-width: 420px) {
            .stats { grid-template-columns: 1fr; }
            .banner-icon { display: none; }
            .page-title h1 { font-size: 17px; }
            .form-row { grid-template-columns: 1fr; }
            .table-footer { align-items: flex-start; flex-direction: column; }
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
            <i class="fa-solid fa-house"></i> Panel principal
        </a>

        <a href="{{ route('pedidos') }}" class="nav-link active">
            <i class="fa-solid fa-clipboard-list"></i> Pedidos
        </a>

        <a href="#" class="nav-link">
            <i class="fa-solid fa-bowl-food"></i> Menú de alimentos
        </a>

        <a href="#" class="nav-link">
            <i class="fa-solid fa-calendar-days"></i> Reservaciones
        </a>

        <a href="#" class="nav-link">
            <i class="fa-solid fa-users"></i> Clientes
        </a>

        <a href="{{ route('mesas') }}" class="nav-link">
            <i class="fa-solid fa-chair"></i> Mesas y zonas
        </a>

        <p class="menu-label">Gestión</p>

        <a href="#" class="nav-link">
            <i class="fa-solid fa-boxes-stacked"></i> Inventario
        </a>

        <a href="#" class="nav-link">
            <i class="fa-solid fa-chart-column"></i> Reportes
        </a>

        <a href="#" class="nav-link">
            <i class="fa-solid fa-gear"></i> Configuración
        </a>

        <div class="sidebar-bottom">
            <a href="{{ route('login') }}" class="nav-link">
                <i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión
            </a>
        </div>
    </aside>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="main">

        <header class="topbar">
            <div class="page-title">
                <h1>Gestión de pedidos</h1>
                <p>Inicio / Pedidos</p>
            </div>

            <div class="user">
                <div class="avatar">AD</div>
                <div class="user-info">
                    <strong>Administrador</strong>
                    <span>Administrador del sistema</span>
                </div>
                <i class="fa-solid fa-chevron-down"
                   style="font-size:10px;color:#64748b"></i>
            </div>
        </header>

        <section class="content">

            <!-- PRESENTACIÓN -->
            <div class="page-banner">
                <div>
                    <h2>Control de pedidos</h2>
                    <p>Consulta las órdenes del restaurante, revisa sus detalles y actualiza su estado.</p>
                    <button class="btn btn-white" onclick="openModal()">
                        <i class="fa-solid fa-plus"></i> Registrar pedido
                    </button>
                </div>
                <i class="fa-solid fa-receipt banner-icon"></i>
            </div>

            <!-- INDICADORES -->
            <div class="section-heading">
                <div>
                    <h3>Resumen de pedidos</h3>
                    <p>Indicadores de los pedidos de ejemplo</p>
                </div>
            </div>

            <div class="stats">
                <article class="stat-card">
                    <div class="stat-top">
                        <div class="stat-icon"><i class="fa-solid fa-receipt"></i></div>
                    </div>
                    <h3 id="totalOrders">5</h3>
                    <p>Total de pedidos</p>
                </article>

                <article class="stat-card">
                    <div class="stat-top">
                        <div class="stat-icon"><i class="fa-solid fa-clock"></i></div>
                    </div>
                    <h3 id="pendingOrders">2</h3>
                    <p>Pendientes</p>
                </article>

                <article class="stat-card">
                    <div class="stat-top">
                        <div class="stat-icon"><i class="fa-solid fa-fire-burner"></i></div>
                    </div>
                    <h3 id="preparingOrders">1</h3>
                    <p>En preparación</p>
                </article>

                <article class="stat-card">
                    <div class="stat-top">
                        <div class="stat-icon"><i class="fa-solid fa-circle-check"></i></div>
                    </div>
                    <h3 id="completedOrders">2</h3>
                    <p>Entregados</p>
                </article>
            </div>

            <!-- LISTADO -->
            <div class="section-heading">
                <div>
                    <h3>Listado de pedidos</h3>
                    <p>Busca órdenes por número, cliente o platillo</p>
                </div>
            </div>

            <div class="table-container">
                <div class="filters">
                    <div class="search-box">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="search" id="searchInput"
                               placeholder="Buscar pedido, cliente o platillo...">
                    </div>

                    <select id="statusFilter" aria-label="Filtrar por estado">
                        <option value="">Todos los estados</option>
                        <option value="Pendiente">Pendiente</option>
                        <option value="En preparación">En preparación</option>
                        <option value="Entregado">Entregado</option>
                        <option value="Cancelado">Cancelado</option>
                    </select>

                    <button class="btn btn-light" onclick="resetFilters()">
                        <i class="fa-solid fa-rotate-left"></i> Limpiar
                    </button>
                </div>

                <div class="table-scroll">
                    <table>
                        <thead>
                            <tr>
                                <th>N.º de pedido</th>
                                <th>Cliente</th>
                                <th>Platillo principal</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="ordersTable">
                            <tr data-status="Entregado">
                                <td class="order-id">#PED-001</td>
                                <td>
                                    <div class="customer">
                                        <div class="customer-avatar">JP</div>
                                        <div><span class="customer-name">Juan Pérez</span><small>Mesa 01</small></div>
                                    </div>
                                </td>
                                <td>Hamburguesa clásica</td>
                                <td>09/10/2026</td>
                                <td>$350.00</td>
                                <td><span class="status status-entregado">Entregado</span></td>
                                <td>
                                    <div class="actions">
                                        <button class="icon-btn" title="Ver detalles" onclick="viewOrder(this)"><i class="fa-regular fa-eye"></i></button>
                                        <button class="icon-btn" title="Cambiar estado" onclick="changeStatus(this)"><i class="fa-solid fa-pen"></i></button>
                                    </div>
                                </td>
                            </tr>

                            <tr data-status="En preparación">
                                <td class="order-id">#PED-002</td>
                                <td>
                                    <div class="customer">
                                        <div class="customer-avatar">ML</div>
                                        <div><span class="customer-name">María López</span><small>Mesa 04</small></div>
                                    </div>
                                </td>
                                <td>Pizza de pepperoni</td>
                                <td>09/10/2026</td>
                                <td>$180.00</td>
                                <td><span class="status status-preparacion">En preparación</span></td>
                                <td>
                                    <div class="actions">
                                        <button class="icon-btn" title="Ver detalles" onclick="viewOrder(this)"><i class="fa-regular fa-eye"></i></button>
                                        <button class="icon-btn" title="Cambiar estado" onclick="changeStatus(this)"><i class="fa-solid fa-pen"></i></button>
                                    </div>
                                </td>
                            </tr>

                            <tr data-status="Pendiente">
                                <td class="order-id">#PED-003</td>
                                <td>
                                    <div class="customer">
                                        <div class="customer-avatar">CS</div>
                                        <div><span class="customer-name">Carlos Sánchez</span><small>Para llevar</small></div>
                                    </div>
                                </td>
                                <td>Enchiladas verdes</td>
                                <td>09/10/2026</td>
                                <td>$420.00</td>
                                <td><span class="status status-pendiente">Pendiente</span></td>
                                <td>
                                    <div class="actions">
                                        <button class="icon-btn" title="Ver detalles" onclick="viewOrder(this)"><i class="fa-regular fa-eye"></i></button>
                                        <button class="icon-btn" title="Cambiar estado" onclick="changeStatus(this)"><i class="fa-solid fa-pen"></i></button>
                                    </div>
                                </td>
                            </tr>

                            <tr data-status="Entregado">
                                <td class="order-id">#PED-004</td>
                                <td>
                                    <div class="customer">
                                        <div class="customer-avatar">AM</div>
                                        <div><span class="customer-name">Ana Martínez</span><small>Mesa 02</small></div>
                                    </div>
                                </td>
                                <td>Ensalada César</td>
                                <td>09/10/2026</td>
                                <td>$260.00</td>
                                <td><span class="status status-entregado">Entregado</span></td>
                                <td>
                                    <div class="actions">
                                        <button class="icon-btn" title="Ver detalles" onclick="viewOrder(this)"><i class="fa-regular fa-eye"></i></button>
                                        <button class="icon-btn" title="Cambiar estado" onclick="changeStatus(this)"><i class="fa-solid fa-pen"></i></button>
                                    </div>
                                </td>
                            </tr>

                            <tr data-status="Pendiente">
                                <td class="order-id">#PED-005</td>
                                <td>
                                    <div class="customer">
                                        <div class="customer-avatar">LR</div>
                                        <div><span class="customer-name">Luis Ramírez</span><small>Mesa 05</small></div>
                                    </div>
                                </td>
                                <td>Tacos al pastor</td>
                                <td>09/10/2026</td>
                                <td>$150.00</td>
                                <td><span class="status status-pendiente">Pendiente</span></td>
                                <td>
                                    <div class="actions">
                                        <button class="icon-btn" title="Ver detalles" onclick="viewOrder(this)"><i class="fa-regular fa-eye"></i></button>
                                        <button class="icon-btn" title="Cambiar estado" onclick="changeStatus(this)"><i class="fa-solid fa-pen"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-footer">
                    <span id="resultsCount">Mostrando 5 pedidos</span>
                    <span>Datos de demostración</span>
                </div>
            </div>
        </section>

        <footer class="footer">
            Sistema de gestión de restaurantes © 2026
        </footer>
    </main>
</div>

<!-- MODAL PARA REGISTRAR PEDIDO -->
<div class="modal" id="orderModal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Registrar pedido</h3>
            <button class="close-modal" onclick="closeModal()" aria-label="Cerrar">&times;</button>
        </div>

        <form id="orderForm">
            <div class="form-group">
                <label for="customerInput">Nombre del cliente</label>
                <input type="text" id="customerInput" required placeholder="Nombre completo">
            </div>

            <div class="form-group">
                <label for="dishInput">Platillo principal</label>
                <input type="text" id="dishInput" required placeholder="Nombre del platillo">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="totalInput">Total ($)</label>
                    <input type="number" id="totalInput" min="1" step="0.01" required placeholder="0.00">
                </div>

                <div class="form-group">
                    <label for="tableInput">Mesa / tipo</label>
                    <select id="tableInput">
                        <option>Mesa 01</option>
                        <option>Mesa 02</option>
                        <option>Mesa 03</option>
                        <option>Mesa 04</option>
                        <option>Mesa 05</option>
                        <option>Para llevar</option>
                        <option>Entrega a domicilio</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="newStatus">Estado inicial</label>
                <select id="newStatus">
                    <option>Pendiente</option>
                    <option>En preparación</option>
                    <option>Entregado</option>
                    <option>Cancelado</option>
                </select>
            </div>

            <div class="modal-actions">
                <button type="button" class="btn btn-light" onclick="closeModal()">Cancelar</button>
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-check"></i> Guardar pedido
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const tableBody = document.getElementById('ordersTable');
    const searchInput = document.getElementById('searchInput');
    const statusFilter = document.getElementById('statusFilter');

    function statusClass(status) {
        const classes = {
            'Pendiente': 'status-pendiente',
            'En preparación': 'status-preparacion',
            'Entregado': 'status-entregado',
            'Cancelado': 'status-cancelado'
        };
        return classes[status] || 'status-pendiente';
    }

    function initials(name) {
        return name.trim().split(/\s+/).slice(0, 2)
            .map(part => part.charAt(0).toUpperCase()).join('');
    }

    function filterOrders() {
        const query = searchInput.value.toLowerCase().trim();
        const selectedStatus = statusFilter.value;
        let visible = 0;

        [...tableBody.querySelectorAll('tr[data-status]')].forEach(row => {
            const matchesText = row.innerText.toLowerCase().includes(query);
            const matchesStatus = !selectedStatus || row.dataset.status === selectedStatus;
            const show = matchesText && matchesStatus;

            row.style.display = show ? '' : 'none';
            if (show) visible++;
        });

        document.getElementById('resultsCount').textContent =
            `Mostrando ${visible} ${visible === 1 ? 'pedido' : 'pedidos'}`;
    }

    function updateStats() {
        const rows = [...tableBody.querySelectorAll('tr[data-status]')];

        document.getElementById('totalOrders').textContent = rows.length;
        document.getElementById('pendingOrders').textContent =
            rows.filter(row => row.dataset.status === 'Pendiente').length;
        document.getElementById('preparingOrders').textContent =
            rows.filter(row => row.dataset.status === 'En preparación').length;
        document.getElementById('completedOrders').textContent =
            rows.filter(row => row.dataset.status === 'Entregado').length;
    }

    function resetFilters() {
        searchInput.value = '';
        statusFilter.value = '';
        filterOrders();
    }

    function openModal() {
        document.getElementById('orderModal').classList.add('show');
    }

    function closeModal() {
        document.getElementById('orderModal').classList.remove('show');
    }

    function changeStatus(button) {
        const row = button.closest('tr');
        const currentStatus = row.dataset.status;

        const options = ['Pendiente', 'En preparación', 'Entregado', 'Cancelado'];
        const message = 'Estado actual: ' + currentStatus +
            '\nEscribe el nuevo estado:\n' + options.join('\n');

        const newStatus = prompt(message, currentStatus);

        if (newStatus === null) return;

        const normalized = options.find(
            option => option.toLowerCase() === newStatus.trim().toLowerCase()
        );

        if (!normalized) {
            alert('Estado no válido. Utiliza uno de los estados indicados.');
            return;
        }

        row.dataset.status = normalized;
        const badge = row.querySelector('.status');
        badge.className = 'status ' + statusClass(normalized);
        badge.textContent = normalized;

        updateStats();
        filterOrders();
    }

    function viewOrder(button) {
        const row = button.closest('tr');
        const cells = row.querySelectorAll('td');

        alert(
            'DETALLE DEL PEDIDO\n\n' +
            'Número: ' + cells[0].innerText + '\n' +
            'Cliente: ' + cells[1].innerText.replace(/\n/g, ' - ') + '\n' +
            'Platillo: ' + cells[2].innerText + '\n' +
            'Fecha: ' + cells[3].innerText + '\n' +
            'Total: ' + cells[4].innerText + '\n' +
            'Estado: ' + row.dataset.status
        );
    }

    document.getElementById('orderForm').addEventListener('submit', function(event) {
        event.preventDefault();

        const customer = document.getElementById('customerInput').value.trim();
        const dish = document.getElementById('dishInput').value.trim();
        const total = Number(document.getElementById('totalInput').value);
        const table = document.getElementById('tableInput').value;
        const status = document.getElementById('newStatus').value;

        if (!customer || !dish || !Number.isFinite(total) || total <= 0) {
            alert('Completa todos los campos con datos válidos.');
            return;
        }

        const nextNumber = Math.max(
            0,
            ...[...tableBody.querySelectorAll('.order-id')].map(cell => {
                const match = cell.textContent.match(/PED-(\d+)/);
                return match ? Number(match[1]) : 0;
            })
        ) + 1;

        const orderId = '#PED-' + String(nextNumber).padStart(3, '0');
        const row = document.createElement('tr');
        row.dataset.status = status;

        const values = [
            orderId,
            '',
            dish,
            new Date().toLocaleDateString('es-MX'),
            total.toLocaleString('es-MX', { style: 'currency', currency: 'MXN' }),
            '',
            ''
        ];

        const idCell = document.createElement('td');
        idCell.className = 'order-id';
        idCell.textContent = values[0];
        row.appendChild(idCell);

        const customerCell = document.createElement('td');
        const customerDiv = document.createElement('div');
        customerDiv.className = 'customer';

        const avatar = document.createElement('div');
        avatar.className = 'customer-avatar';
        avatar.textContent = initials(customer);

        const info = document.createElement('div');
        const customerName = document.createElement('span');
        customerName.className = 'customer-name';
        customerName.textContent = customer;

        const customerPlace = document.createElement('small');
        customerPlace.textContent = table;

        info.append(customerName, customerPlace);
        customerDiv.append(avatar, info);
        customerCell.appendChild(customerDiv);
        row.appendChild(customerCell);

        [dish, values[3], values[4]].forEach(value => {
            const cell = document.createElement('td');
            cell.textContent = value;
            row.appendChild(cell);
        });

        const statusCell = document.createElement('td');
        const badge = document.createElement('span');
        badge.className = 'status ' + statusClass(status);
        badge.textContent = status;
        statusCell.appendChild(badge);
        row.appendChild(statusCell);

        const actionsCell = document.createElement('td');
        const actions = document.createElement('div');
        actions.className = 'actions';

        const viewButton = document.createElement('button');
        viewButton.className = 'icon-btn';
        viewButton.title = 'Ver detalles';
        viewButton.innerHTML = '<i class="fa-regular fa-eye"></i>';
        viewButton.addEventListener('click', function() {
            viewOrder(this);
        });

        const editButton = document.createElement('button');
        editButton.className = 'icon-btn';
        editButton.title = 'Cambiar estado';
        editButton.innerHTML = '<i class="fa-solid fa-pen"></i>';
        editButton.addEventListener('click', function() {
            changeStatus(this);
        });

        actions.append(viewButton, editButton);
        actionsCell.appendChild(actions);
        row.appendChild(actionsCell);

        tableBody.prepend(row);

        this.reset();
        closeModal();
        updateStats();
        resetFilters();
    });

    searchInput.addEventListener('input', filterOrders);
    statusFilter.addEventListener('change', filterOrders);

    document.getElementById('orderModal').addEventListener('click', function(event) {
        if (event.target === this) closeModal();
    });

    updateStats();
    filterOrders();
</script>
</body>
</html>
```