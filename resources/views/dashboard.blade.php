<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel principal | Restaurantes y Comedores</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        :root {
            --primary: #0878f9;
            --primary-dark: #0668d9;
            --navy: #072b4a;
            --navy-light: #0a385d;
            --background: #f4f8fc;
            --surface: #fff;
            --text: #102046;
            --muted: #71819a;
            --border: #e3eaf3;
            --success: #16a765;
            --danger: #f04455;
            --cyan: #13b9d3;
        }

        * { box-sizing: border-box; }
        body { margin: 0; min-width: 320px; color: var(--text); background: linear-gradient(145deg, #f8fbff 40%, #eaf4ff); font-family: 'Inter', sans-serif; }
        button, select { font: inherit; }
        button, a { -webkit-tap-highlight-color: transparent; }
        a { color: inherit; text-decoration: none; }
        [hidden] { display: none !important; }

        .app-shell { display: grid; grid-template-columns: 214px minmax(0, 1fr); width: min(1420px, calc(100% - 40px)); min-height: calc(100vh - 40px); margin: 20px auto; overflow: hidden; border: 1px solid rgba(210, 224, 238, .9); border-radius: 20px; background: var(--surface); box-shadow: 0 24px 70px rgba(31, 75, 117, .14); }
        .sidebar { display: flex; flex-direction: column; padding: 24px 14px 18px; color: #dceafb; background: linear-gradient(180deg, #052844, var(--navy)); }
        .brand { display: flex; align-items: center; gap: 11px; padding: 0 8px 27px; }
        .brand-icon { display: grid; width: 39px; height: 39px; flex: 0 0 39px; place-items: center; border-radius: 12px; color: #5de2ff; background: rgba(22, 177, 232, .13); font-size: 20px; }
        .brand strong, .brand span { display: block; }
        .brand strong { color: white; font-size: 13px; line-height: 1.25; }
        .brand span { margin-top: 3px; color: #9fb9d1; font-size: 8px; letter-spacing: 1.25px; }
        .nav { display: grid; gap: 5px; }
        .nav-link { display: flex; align-items: center; gap: 12px; min-height: 43px; padding: 0 13px; border: 0; border-radius: 8px; color: #d7e5f2; background: transparent; font-size: 11px; cursor: pointer; transition: .2s ease; }
        .nav-link i { width: 18px; color: #a9bdd0; text-align: center; font-size: 13px; }
        .nav-link:hover, .nav-link.active { color: white; background: var(--primary); transform: translateX(2px); }
        .nav-link:hover i, .nav-link.active i { color: white; }
        .logout-form { margin-top: auto; padding-top: 22px; }
        .logout-form .nav-link { width: 100%; }

        .main { min-width: 0; background: var(--background); }
        .topbar { position: relative; z-index: 5; display: flex; align-items: center; min-height: 75px; padding: 14px 24px; gap: 13px; border-bottom: 1px solid var(--border); background: rgba(255,255,255,.96); }
        .branch-select { position: relative; width: 220px; margin-right: auto; }
        .branch-select i { position: absolute; top: 50%; left: 13px; color: var(--primary); transform: translateY(-50%); pointer-events: none; }
        .branch-select select { width: 100%; height: 42px; padding: 0 37px; border: 1px solid var(--border); border-radius: 8px; outline: none; color: #314563; background: white; font-size: 11px; cursor: pointer; }
        .icon-button { position: relative; display: grid; width: 41px; height: 41px; place-items: center; border: 1px solid var(--border); border-radius: 9px; color: #526680; background: white; cursor: pointer; }
        .notification-dot { position: absolute; top: 7px; right: 8px; width: 7px; height: 7px; border: 2px solid white; border-radius: 50%; background: var(--danger); }
        .user-menu { position: relative; display: flex; align-items: center; gap: 9px; padding-left: 3px; cursor: pointer; }
        .avatar { display: grid; width: 40px; height: 40px; place-items: center; overflow: hidden; border-radius: 50%; color: white; background: linear-gradient(145deg, #ffb178, #dc6b59); font-size: 11px; font-weight: 800; }
        .user-copy strong, .user-copy span { display: block; }
        .user-copy strong { font-size: 11px; }
        .user-copy span { margin-top: 3px; color: var(--muted); font-size: 9px; }
        .chevron { color: #8290a4; font-size: 10px; }
        .popover { position: absolute; top: calc(100% + 12px); right: 0; width: 245px; padding: 8px; border: 1px solid var(--border); border-radius: 12px; background: white; box-shadow: 0 18px 45px rgba(31, 60, 91, .17); }
        .popover p { margin: 0; padding: 10px; color: var(--muted); font-size: 11px; line-height: 1.5; }
        .popover a, .popover button { display: flex; width: 100%; align-items: center; gap: 10px; padding: 10px; border: 0; border-radius: 8px; color: #40536f; background: transparent; font-size: 11px; cursor: pointer; }
        .popover a:hover, .popover button:hover { background: #eef6ff; color: var(--primary); }

        .content { padding: 27px 23px 35px; }
        .welcome { display: flex; align-items: center; justify-content: space-between; gap: 20px; margin-bottom: 20px; }
        .welcome h1 { margin: 0 0 6px; font-size: 24px; letter-spacing: -.65px; }
        .welcome p { margin: 0; color: var(--muted); font-size: 11px; }
        .date { display: flex; align-items: center; gap: 8px; color: #637590; font-size: 10px; }
        .date i { color: var(--primary); }

        .stats { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 12px; margin-bottom: 14px; }
        .stat-card { min-width: 0; padding: 15px 14px; border: 1px solid var(--border); border-radius: 10px; background: white; box-shadow: 0 5px 16px rgba(36, 71, 104, .045); }
        .stat-heading { display: flex; align-items: center; gap: 9px; color: #334967; font-size: 10px; font-weight: 600; }
        .stat-icon { display: grid; width: 29px; height: 29px; flex: 0 0 29px; place-items: center; border-radius: 7px; color: var(--primary); background: #eaf4ff; font-size: 13px; }
        .stat-card:nth-child(2) .stat-icon { color: #2587d7; }
        .stat-card:nth-child(3) .stat-icon { color: #0aa0c2; }
        .stat-card:nth-child(4) .stat-icon { color: var(--danger); background: #fff0f2; }
        .stat-value { margin: 12px 0 6px; font-size: 22px; font-weight: 800; line-height: 1; }
        .stat-note { color: #7b8aa0; font-size: 9px; }
        .stat-note strong { margin-right: 4px; color: var(--primary); }
        .stat-note .positive { color: var(--success); }
        .stat-note .danger { color: var(--danger); }

        .dashboard-grid { display: grid; grid-template-columns: 1.15fr .85fr; gap: 13px; }
        .panel { min-width: 0; padding: 15px; border: 1px solid var(--border); border-radius: 10px; background: white; box-shadow: 0 5px 16px rgba(36, 71, 104, .04); }
        .panel-header { display: flex; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 13px; }
        .panel-title { margin: 0; font-size: 12px; font-weight: 700; }
        .panel-link { border: 0; color: var(--primary); background: transparent; font-size: 9px; cursor: pointer; }
        .panel-select { height: 29px; padding: 0 9px; border: 1px solid var(--border); border-radius: 6px; color: #536781; background: white; font-size: 9px; }

        .activity-list { display: grid; gap: 8px; }
        .activity { display: grid; grid-template-columns: 30px 38px minmax(0,1fr) auto; align-items: center; gap: 8px; font-size: 9px; }
        .activity-icon { display: grid; width: 27px; height: 27px; place-items: center; border-radius: 7px; color: var(--primary); background: #eaf4ff; }
        .activity:nth-child(3) .activity-icon { color: var(--danger); background: #fff0f2; }
        .activity:nth-child(4) .activity-icon { color: var(--success); background: #eafaf2; }
        .activity-time { color: #708199; }
        .activity-name { overflow: hidden; color: #3d516e; text-overflow: ellipsis; white-space: nowrap; }
        .tag { padding: 5px 7px; border-radius: 6px; color: var(--primary); background: #eaf4ff; font-size: 8px; }
        .tag.red { color: var(--danger); background: #fff0f2; }
        .tag.green { color: var(--success); background: #eafaf2; }

        .occupancy { display: grid; grid-template-columns: 126px minmax(0,1fr); align-items: center; gap: 13px; min-height: 137px; }
        .donut { position: relative; width: 112px; aspect-ratio: 1; margin: auto; border-radius: 50%; background: conic-gradient(var(--primary) 0 59%, var(--cyan) 59% 85%, #d9e6f2 85% 100%); }
        .donut::after { content: ''; position: absolute; inset: 19px; border-radius: 50%; background: white; }
        .donut strong { position: absolute; z-index: 1; inset: 0; display: grid; place-items: center; font-size: 18px; }
        .legend { display: grid; gap: 12px; color: #536781; font-size: 9px; }
        .legend div { display: grid; grid-template-columns: 9px 1fr; gap: 8px; align-items: start; }
        .legend i { width: 8px; height: 8px; margin-top: 2px; border-radius: 50%; background: var(--primary); }
        .legend div:nth-child(2) i { background: var(--cyan); }
        .legend div:nth-child(3) i { background: #c4d7e9; }
        .legend strong, .legend span { display: block; }
        .legend span { margin-top: 2px; color: #7e8da2; }

        .services { display: grid; gap: 8px; }
        .service { display: grid; grid-template-columns: 22px 62px minmax(110px,1fr) 47px 68px; align-items: center; gap: 7px; color: #526681; font-size: 8px; }
        .service > i { color: var(--primary); text-align: center; }
        .service strong { color: #334966; font-size: 9px; }
        .progress { height: 6px; overflow: hidden; border-radius: 99px; background: #edf2f7; }
        .progress span { display: block; height: 100%; border-radius: inherit; background: var(--primary); }
        .service-state { padding: 5px; border-radius: 6px; color: var(--primary); background: #eaf4ff; text-align: center; }
        .service-state.scheduled { color: #65768e; background: #edf2f7; }

        .chart { display: flex; height: 140px; padding: 7px 4px 17px 27px; align-items: end; gap: clamp(5px, 1.4vw, 13px); border-left: 1px solid #dfe8f1; border-bottom: 1px solid #dfe8f1; background: repeating-linear-gradient(to top, transparent 0 28px, #edf2f7 29px); }
        .bar { position: relative; width: 11px; max-width: 8%; height: var(--height); border-radius: 3px 3px 0 0; background: linear-gradient(#2d96f0, #68b8fa); transition: height .35s ease; }
        .bar:nth-child(4), .bar:nth-child(5) { background: linear-gradient(#0878f9, #0878f9); }
        .bar span { position: absolute; top: calc(100% + 7px); left: 50%; color: #75869d; font-size: 7px; transform: translateX(-50%); }

        .toast { position: fixed; right: 24px; bottom: 24px; z-index: 20; display: flex; align-items: center; gap: 11px; max-width: 340px; padding: 14px 17px; border-radius: 10px; color: white; background: #123552; box-shadow: 0 16px 36px rgba(11, 42, 68, .25); font-size: 11px; }

        @media (max-width: 980px) {
            .app-shell { grid-template-columns: 78px minmax(0,1fr); width: calc(100% - 24px); margin: 12px auto; }
            .sidebar { padding-inline: 10px; }
            .brand { justify-content: center; padding-inline: 0; }
            .brand div:last-child, .nav-link span { display: none; }
            .nav-link { justify-content: center; padding: 0; }
            .stats { grid-template-columns: repeat(2, 1fr); }
            .dashboard-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 680px) {
            .app-shell { display: block; width: 100%; min-height: 100vh; margin: 0; border: 0; border-radius: 0; }
            .sidebar { display: block; padding: 12px; }
            .brand { justify-content: flex-start; padding: 0 5px 12px; }
            .brand div:last-child { display: block; }
            .nav { grid-template-columns: repeat(3, 1fr); }
            .nav-link { justify-content: center; gap: 7px; min-height: 41px; padding: 0 6px; font-size: 10px; }
            .nav-link span { display: inline; }
            .nav-link:nth-child(n+7), .logout-form { display: none; }
            .topbar { min-height: 66px; padding: 11px 14px; }
            .branch-select { width: min(190px, 55vw); }
            .user-copy, .user-menu > .chevron { display: none; }
            .content { padding: 23px 14px 35px; }
            .welcome { align-items: flex-start; }
            .date { display: none; }
            .stats { gap: 9px; }
            .stat-card { padding: 13px 12px; }
            .stat-value { font-size: 20px; }
            .occupancy { grid-template-columns: 120px 1fr; }
            .service { grid-template-columns: 20px 58px 1fr auto; }
            .service .progress { display: none; }
        }
        @media (max-width: 430px) {
            .nav-link span { display: none; }
            .stats { grid-template-columns: 1fr; }
            .activity { grid-template-columns: 27px 34px minmax(0,1fr); }
            .activity .tag { display: none; }
            .occupancy { grid-template-columns: 1fr; }
            .legend { grid-template-columns: repeat(3, 1fr); }
            .legend div { grid-template-columns: 8px 1fr; }
        }
    </style>
</head>
<body>
<div class="app-shell">
    <aside class="sidebar">
        <a class="brand" href="{{ route('dashboard') }}">
            <span class="brand-icon"><i class="fa-solid fa-kitchen-set"></i></span>
            <div><strong>Restaurantes<br>Comedores</strong><span>SISTEMA DE GESTIÓN</span></div>
        </a>
        <nav class="nav" aria-label="Navegación principal">
            <a class="nav-link active" href="{{ route('dashboard') }}" aria-current="page"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
            <a class="nav-link" href="#"><i class="fa-solid fa-building-shield"></i><span>Administración</span></a>
            <a class="nav-link" href="#"><i class="fa-solid fa-inbox"></i><span>Recepción</span></a>
            <a class="nav-link" href="#services"><i class="fa-solid fa-clipboard-check"></i><span>Servicios</span></a>
            <a class="nav-link" href="#"><i class="fa-solid fa-utensils"></i><span>Menú</span></a>
            <a class="nav-link" href="#"><i class="fa-solid fa-boxes-stacked"></i><span>Inventario</span></a>
            <a class="nav-link" href="{{ route('sedes.index') }}"><i class="fa-solid fa-house-chimney"></i><span>Sedes</span></a>
            <a class="nav-link" href="#"><i class="fa-solid fa-user-group"></i><span>Usuarios</span></a>
            <a class="nav-link" href="#"><i class="fa-solid fa-file-lines"></i><span>Reportes</span></a>
        </nav>
        <form class="logout-form" action="{{ route('logout') }}" method="POST">@csrf<button class="nav-link" type="submit"><i class="fa-solid fa-right-from-bracket"></i><span>Cerrar sesión</span></button></form>
    </aside>

    <main class="main">
        <header class="topbar">
            <label class="branch-select"><i class="fa-regular fa-building"></i><select id="branch" aria-label="Seleccionar sede"><option value="Centro">Sede Centro</option><option value="Planta Norte">Sede Planta Norte</option></select></label>
            <button class="icon-button" id="notification-button" type="button" aria-label="Abrir notificaciones" aria-expanded="false"><i class="fa-regular fa-bell"></i><span class="notification-dot"></span></button>
            <div class="user-menu" id="user-menu" role="button" tabindex="0" aria-expanded="false">
                <span class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</span>
                <div class="user-copy"><strong>{{ auth()->user()->name }}</strong><span>Administrador</span></div><i class="fa-solid fa-chevron-down chevron"></i>
                <div class="popover" id="user-popover" hidden><p>{{ auth()->user()->email }}</p><a href="{{ route('sedes.index') }}"><i class="fa-solid fa-location-dot"></i>Administrar sedes</a><form action="{{ route('logout') }}" method="POST">@csrf<button type="submit"><i class="fa-solid fa-right-from-bracket"></i>Cerrar sesión</button></form></div>
            </div>
            <div class="popover" id="notification-popover" hidden style="right:24px;top:67px"><p><strong>Todo está bajo control.</strong><br>No tienes notificaciones nuevas.</p></div>
        </header>

        <section class="content">
            <div class="welcome"><div><h1>Buen día, {{ explode(' ', auth()->user()->name)[0] }}</h1><p>Aquí tienes un resumen de la operación de la sede <span id="branch-name">Centro</span>.</p></div><div class="date"><span>{{ now()->locale('es')->translatedFormat('l, d \\d\\e F \\d\\e Y') }}</span><i class="fa-regular fa-calendar"></i></div></div>

            <section class="stats" aria-label="Indicadores del día">
                <article class="stat-card"><div class="stat-heading"><span class="stat-icon"><i class="fa-solid fa-utensils"></i></span>Servicios de hoy</div><div class="stat-value">3</div><div class="stat-note"><strong>2 en curso</strong></div></article>
                <article class="stat-card"><div class="stat-heading"><span class="stat-icon"><i class="fa-solid fa-user-group"></i></span>Comensales</div><div class="stat-value">245</div><div class="stat-note"><strong class="positive">↑ +6%</strong> vs. ayer</div></article>
                <article class="stat-card"><div class="stat-heading"><span class="stat-icon"><i class="fa-solid fa-bell-concierge"></i></span>Platos servidos</div><div class="stat-value">192</div><div class="stat-note"><strong class="positive">↑ +12%</strong> vs. ayer</div></article>
                <article class="stat-card"><div class="stat-heading"><span class="stat-icon"><i class="fa-solid fa-triangle-exclamation"></i></span>Incidencias</div><div class="stat-value" style="color:var(--danger)">2</div><div class="stat-note"><strong class="danger">1 pendiente</strong></div></article>
            </section>

            <div class="dashboard-grid">
                <section class="panel"><div class="panel-header"><h2 class="panel-title">Actividad reciente</h2><button class="panel-link js-toast" type="button">Ver todas</button></div><div class="activity-list">
                    <div class="activity"><span class="activity-icon"><i class="fa-solid fa-bell-concierge"></i></span><span class="activity-time">10:24</span><span class="activity-name">Lote de pollo recibido y validado</span><span class="tag">Recepción</span></div>
                    <div class="activity"><span class="activity-icon"><i class="fa-solid fa-utensils"></i></span><span class="activity-time">09:15</span><span class="activity-name">Menú de comida publicado</span><span class="tag">Menú</span></div>
                    <div class="activity"><span class="activity-icon"><i class="fa-solid fa-triangle-exclamation"></i></span><span class="activity-time">08:50</span><span class="activity-name">Incidencia registrada: equipo de frío</span><span class="tag red">Control</span></div>
                    <div class="activity"><span class="activity-icon"><i class="fa-solid fa-user"></i></span><span class="activity-time">08:20</span><span class="activity-name">Servicio de comida iniciado</span><span class="tag green">Servicios</span></div>
                </div></section>

                <section class="panel"><div class="panel-header"><h2 class="panel-title">Ocupación de hoy</h2><select class="panel-select" aria-label="Comedor"><option>Comedor principal</option><option>Terraza</option></select></div><div class="occupancy"><div class="donut"><strong>85%</strong></div><div class="legend"><div><i></i><p><strong>Ocupación actual</strong><span>102 comensales</span></p></div><div><i></i><p><strong>Capacidad disponible</strong><span>18 lugares</span></p></div><div><i></i><p><strong>Capacidad total</strong><span>120 lugares</span></p></div></div></div></section>

                <section class="panel" id="services"><div class="panel-header"><h2 class="panel-title">Estado de servicios</h2><button class="panel-link js-toast" type="button">Ver todos</button></div><div class="services">
                    <div class="service"><i class="fa-solid fa-mug-hot"></i><strong>Desayuno</strong><span>07:00 - 10:00</span><div class="progress"><span style="width:82%"></span></div><span class="service-state">En curso</span></div>
                    <div class="service"><i class="fa-solid fa-clipboard"></i><strong>Comida</strong><span>12:00 - 15:00</span><div class="progress"><span style="width:0"></span></div><span class="service-state scheduled">Programado</span></div>
                    <div class="service"><i class="fa-solid fa-shield-halved"></i><strong>Cena</strong><span>18:00 - 21:00</span><div class="progress"><span style="width:0"></span></div><span class="service-state scheduled">Programado</span></div>
                </div></section>

                <section class="panel"><div class="panel-header"><h2 class="panel-title">Comensales por hora</h2><select class="panel-select" id="chart-range" aria-label="Periodo de la gráfica"><option value="today">Hoy</option><option value="yesterday">Ayer</option></select></div><div class="chart" id="chart"><div class="bar" style="--height:20%"><span>7:00</span></div><div class="bar" style="--height:38%"><span>9:00</span></div><div class="bar" style="--height:48%"><span>11:00</span></div><div class="bar" style="--height:78%"><span>13:00</span></div><div class="bar" style="--height:92%"><span>15:00</span></div><div class="bar" style="--height:41%"><span>17:00</span></div><div class="bar" style="--height:51%"><span>19:00</span></div><div class="bar" style="--height:26%"><span>21:00</span></div></div></section>
            </div>
        </section>
    </main>
</div>

<div class="toast" id="toast" hidden><i class="fa-solid fa-circle-check"></i><span id="toast-message"></span></div>
<script>
    const branch = document.getElementById('branch');
    const branchName = document.getElementById('branch-name');
    const notificationButton = document.getElementById('notification-button');
    const notificationPopover = document.getElementById('notification-popover');
    const userMenu = document.getElementById('user-menu');
    const userPopover = document.getElementById('user-popover');
    const toast = document.getElementById('toast');
    const toastMessage = document.getElementById('toast-message');
    let toastTimer;

    function togglePopover(element, trigger) {
        const willOpen = element.hidden;
        notificationPopover.hidden = true;
        userPopover.hidden = true;
        notificationButton.setAttribute('aria-expanded', 'false');
        userMenu.setAttribute('aria-expanded', 'false');
        element.hidden = !willOpen;
        trigger.setAttribute('aria-expanded', String(willOpen));
    }

    function showToast(message) {
        clearTimeout(toastTimer);
        toastMessage.textContent = message;
        toast.hidden = false;
        toastTimer = setTimeout(() => toast.hidden = true, 2600);
    }

    branch.addEventListener('change', () => { branchName.textContent = branch.value; showToast(`Sede ${branch.value} seleccionada`); });
    notificationButton.addEventListener('click', (event) => { event.stopPropagation(); togglePopover(notificationPopover, notificationButton); });
    userMenu.addEventListener('click', (event) => { if (!event.target.closest('a, button')) { event.stopPropagation(); togglePopover(userPopover, userMenu); } });
    userMenu.addEventListener('keydown', (event) => { if (event.key === 'Enter' || event.key === ' ') { event.preventDefault(); togglePopover(userPopover, userMenu); } });
    document.addEventListener('click', () => { notificationPopover.hidden = true; userPopover.hidden = true; notificationButton.setAttribute('aria-expanded', 'false'); userMenu.setAttribute('aria-expanded', 'false'); });
    document.querySelectorAll('.js-toast').forEach(button => button.addEventListener('click', () => showToast('Módulo listo para conectar con datos reales.')));
    document.getElementById('chart-range').addEventListener('change', (event) => {
        const values = event.target.value === 'today' ? [20,38,48,78,92,41,51,26] : [15,31,43,65,76,50,39,20];
        document.querySelectorAll('.bar').forEach((bar, index) => bar.style.setProperty('--height', `${values[index]}%`));
    });
</script>
</body>
</html>
