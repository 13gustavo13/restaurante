<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de sedes | Restaurantes y Comedores</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        :root {
            --primary: #0878f9;
            --primary-dark: #0668d9;
            --navy: #052844;
            --navy-light: #0b3a5d;
            --text: #102046;
            --muted: #65738c;
            --border: #e3eaf3;
            --surface: #ffffff;
            --background: #f4f8fc;
        }

        * { box-sizing: border-box; }
        [hidden] { display: none !important; }

        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(145deg, #f8fbff 45%, #e8f4ff);
            color: var(--text);
            font-family: 'Inter', sans-serif;
        }

        button, input, select { font: inherit; }
        button, a { -webkit-tap-highlight-color: transparent; }
        a { color: inherit; text-decoration: none; }

        .app-shell {
            display: grid;
            grid-template-columns: 240px minmax(0, 1fr);
            width: min(1280px, calc(100% - 48px));
            min-height: calc(100vh - 48px);
            margin: 24px auto;
            overflow: hidden;
            border: 1px solid rgba(209, 222, 236, .9);
            border-radius: 18px;
            background: var(--surface);
            box-shadow: 0 24px 70px rgba(31, 75, 117, .13);
        }

        .sidebar {
            display: flex;
            flex-direction: column;
            padding: 25px 14px;
            color: #dbeafa;
            background: linear-gradient(180deg, var(--navy), #062e4d);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px 28px;
        }

        .brand-icon {
            display: grid;
            width: 42px;
            height: 42px;
            flex: 0 0 42px;
            place-items: center;
            border-radius: 50%;
            background: #0db4f2;
            color: #022945;
            font-size: 19px;
        }

        .brand strong { display: block; color: white; font-size: 14px; }
        .brand span { display: block; margin-top: 3px; font-size: 12px; }

        .nav { display: grid; gap: 6px; }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 13px;
            min-height: 46px;
            padding: 0 15px;
            border: 0;
            border-radius: 10px;
            background: transparent;
            color: #dbeafa;
            font-size: 13px;
            text-align: left;
            cursor: pointer;
            transition: background .2s, color .2s;
        }

        .nav-link i { width: 20px; text-align: center; }
        .nav-link:hover, .nav-link.active { background: var(--primary); color: white; }
        .nav-link.active { box-shadow: 0 8px 20px rgba(0, 99, 218, .35); }
        .logout-form { margin-top: auto; }
        .logout-form .nav-link { width: 100%; }

        .main { min-width: 0; background: var(--background); }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            min-height: 82px;
            padding: 16px 30px;
            gap: 18px;
            border-bottom: 1px solid var(--border);
            background: rgba(255, 255, 255, .94);
        }

        .location-select {
            position: relative;
            width: 220px;
        }

        .location-select i {
            position: absolute;
            top: 50%;
            left: 15px;
            color: #73839a;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .location-select select {
            width: 100%;
            height: 44px;
            padding: 0 38px;
            border: 1px solid var(--border);
            border-radius: 9px;
            outline: none;
            background: white;
            color: #40516c;
            font-size: 12px;
        }

        .icon-button, .more-button, .edit-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: white;
            color: #415574;
            cursor: pointer;
        }

        .icon-button { width: 44px; height: 44px; }

        .user-menu { display: flex; align-items: center; gap: 10px; }

        .avatar {
            display: grid;
            width: 42px;
            height: 42px;
            place-items: center;
            border-radius: 50%;
            background: #dcecff;
            color: var(--primary-dark);
            font-size: 13px;
            font-weight: 800;
        }

        .user-copy strong, .user-copy span { display: block; }
        .user-copy strong { font-size: 12px; }
        .user-copy span { margin-top: 4px; color: var(--muted); font-size: 10px; }

        .content { padding: 34px 30px 42px; }

        .page-heading h1 { margin: 0 0 7px; font-size: 29px; letter-spacing: -.8px; }
        .page-heading p { margin: 0; color: var(--muted); font-size: 14px; }

        .toolbar {
            display: grid;
            grid-template-columns: minmax(220px, 1fr) auto;
            gap: 18px;
            margin: 27px 0 16px;
        }

        .search-box { position: relative; }

        .search-box i {
            position: absolute;
            top: 50%;
            left: 16px;
            color: #6c7c94;
            transform: translateY(-50%);
        }

        .search-box input {
            width: 100%;
            height: 49px;
            padding: 0 18px 0 45px;
            border: 1px solid var(--border);
            border-radius: 9px;
            outline: none;
            color: var(--text);
            background: white;
            box-shadow: 0 4px 12px rgba(36, 71, 104, .03);
        }

        .search-box input:focus { border-color: var(--primary); box-shadow: 0 0 0 3px rgba(8, 120, 249, .1); }

        .primary-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 11px;
            min-width: 174px;
            height: 49px;
            padding: 0 20px;
            border: 0;
            border-radius: 9px;
            background: var(--primary);
            color: white;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 8px 18px rgba(8, 120, 249, .22);
        }

        .primary-button:hover { background: var(--primary-dark); }

        .view-switcher {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 17px;
        }

        .view-switcher div {
            display: flex;
            gap: 4px;
            padding: 4px;
            border: 1px solid var(--border);
            border-radius: 9px;
            background: white;
        }

        .view-button {
            display: flex;
            align-items: center;
            gap: 7px;
            height: 34px;
            padding: 0 13px;
            border: 0;
            border-radius: 6px;
            background: transparent;
            color: #65738c;
            font-size: 11px;
            cursor: pointer;
        }

        .view-button.active { background: #eaf4ff; color: var(--primary); font-weight: 700; }

        .locations { display: grid; gap: 17px; }

        .location-card {
            display: grid;
            grid-template-columns: 210px minmax(0, 1fr) auto;
            gap: 22px;
            padding: 14px;
            border: 1px solid #e7edf5;
            border-radius: 12px;
            background: white;
            box-shadow: 0 7px 20px rgba(43, 72, 104, .06);
        }

        .location-image {
            width: 100%;
            height: 145px;
            object-fit: cover;
            border-radius: 9px;
        }

        .location-info { min-width: 0; padding: 7px 0; }
        .location-info h2 { margin: 0 0 10px; font-size: 18px; }

        .badges { display: flex; flex-wrap: wrap; gap: 9px; margin-bottom: 13px; }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 7px 10px;
            border-radius: 7px;
            background: #e9f4ff;
            color: var(--primary-dark);
            font-size: 11px;
            font-weight: 600;
        }

        .badge.status { background: #e9fbf1; color: #16a05a; }
        .badge.status::before { content: ''; width: 8px; height: 8px; border-radius: 50%; background: #1fc86b; }

        .address { margin: 0 0 14px; color: #60708b; font-size: 12px; }
        .address i { margin-right: 7px; color: #54709b; }

        .details {
            display: flex;
            flex-wrap: wrap;
            gap: 22px;
            padding-top: 13px;
            border-top: 1px solid #edf1f6;
            color: #526682;
            font-size: 12px;
        }

        .details i { margin-right: 7px; color: #526b92; }

        .card-actions { display: flex; align-items: flex-start; gap: 8px; padding-top: 5px; }
        .edit-button { gap: 8px; height: 39px; padding: 0 15px; font-size: 12px; font-weight: 600; }
        .more-button { width: 39px; height: 39px; }

        .empty-state { display: none; padding: 45px; text-align: center; color: var(--muted); }

        @media (max-width: 900px) {
            .app-shell { grid-template-columns: 82px minmax(0, 1fr); width: calc(100% - 24px); margin: 12px auto; }
            .sidebar { padding-inline: 10px; }
            .brand { justify-content: center; padding-inline: 0; }
            .brand div:last-child, .nav-link span { display: none; }
            .nav-link { justify-content: center; padding: 0; }
            .location-card { grid-template-columns: 170px minmax(0, 1fr); }
            .card-actions { grid-column: 2; grid-row: 1; justify-self: end; }
            .location-info { padding-top: 50px; }
        }

        @media (max-width: 680px) {
            .app-shell { display: block; width: 100%; min-height: 100vh; margin: 0; border: 0; border-radius: 0; }
            .sidebar { display: block; padding: 12px; }
            .brand { justify-content: flex-start; padding: 0 4px 12px; }
            .brand div:last-child { display: block; }
            .nav { grid-template-columns: repeat(3, 1fr); }
            .nav-link { min-height: 42px; gap: 7px; padding: 0 8px; font-size: 11px; }
            .nav-link span { display: inline; }
            .nav-link:nth-child(n+7) { display: none; }
            .logout-form { display: none; }
            .topbar { min-height: 68px; padding: 12px 16px; }
            .location-select { width: 170px; margin-right: auto; }
            .user-copy, .user-menu > i { display: none; }
            .content { padding: 25px 16px 35px; }
            .toolbar { grid-template-columns: 1fr; gap: 11px; margin-top: 22px; }
            .primary-button { width: 100%; }
            .location-card { grid-template-columns: 1fr; gap: 12px; }
            .location-image { height: 190px; }
            .location-info { padding: 0; }
            .card-actions { grid-column: 1; grid-row: auto; justify-self: stretch; }
            .edit-button { flex: 1; }
        }
    </style>
</head>
<body>
<div class="app-shell">
    <aside class="sidebar">
        <a class="brand" href="{{ route('dashboard') }}">
            <span class="brand-icon"><i class="fa-solid fa-utensils"></i></span>
            <div><strong>Restaurantes</strong><span>Comedores</span></div>
        </a>

        <nav class="nav" aria-label="Navegación principal">
            <a class="nav-link" href="{{ route('dashboard') }}"><i class="fa-solid fa-house"></i><span>Inicio</span></a>
            <a class="nav-link" href="#"><i class="fa-regular fa-id-card"></i><span>Administración</span></a>
            <a class="nav-link" href="#"><i class="fa-solid fa-clipboard-check"></i><span>Recepción</span></a>
            <a class="nav-link" href="#"><i class="fa-solid fa-list-check"></i><span>Servicios</span></a>
            <a class="nav-link active" href="{{ route('sedes.index') }}" aria-current="page"><i class="fa-solid fa-location-dot"></i><span>Sedes</span></a>
            <a class="nav-link" href="#"><i class="fa-solid fa-utensils"></i><span>Menú</span></a>
            <a class="nav-link" href="#"><i class="fa-regular fa-clock"></i><span>Control</span></a>
            <a class="nav-link" href="#"><i class="fa-regular fa-file-lines"></i><span>Reportes</span></a>
        </nav>

        <form class="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="nav-link" type="submit"><i class="fa-solid fa-right-from-bracket"></i><span>Cerrar sesión</span></button>
        </form>
    </aside>

    <main class="main">
        <header class="topbar">
            <label class="location-select">
                <i class="fa-solid fa-magnifying-glass"></i>
                <select aria-label="Seleccionar sede">
                    <option>Sede Centro</option>
                    <option>Sede Planta Norte</option>
                </select>
            </label>
            <button class="icon-button" type="button" aria-label="Notificaciones"><i class="fa-regular fa-bell"></i></button>
            <div class="user-menu">
                <span class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</span>
                <div class="user-copy"><strong>{{ auth()->user()->name }}</strong><span>Administrador</span></div>
                <i class="fa-solid fa-chevron-down" aria-hidden="true"></i>
            </div>
        </header>

        <section class="content">
            <div class="page-heading">
                <h1>Sedes</h1>
                <p>Configura las sedes de tu operación.</p>
            </div>

            <div class="toolbar">
                <label class="search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input id="location-search" type="search" placeholder="Buscar sede..." aria-label="Buscar sede">
                </label>
                <button class="primary-button" type="button"><i class="fa-solid fa-plus"></i>Nueva sede</button>
            </div>

            <div class="view-switcher">
                <div role="group" aria-label="Tipo de vista">
                    <button class="view-button active" type="button"><i class="fa-solid fa-table-cells-large"></i>Tarjetas</button>
                    <button class="view-button" type="button"><i class="fa-solid fa-list"></i>Lista</button>
                </div>
            </div>

            <div class="locations" id="locations">
                <article class="location-card" data-name="sede centro restaurante avenida principal cdmx">
                    <img class="location-image" src="https://images.unsplash.com/photo-1515003197210-e0cd71810b5f?auto=format&fit=crop&w=700&q=80" alt="Interior de Sede Centro">
                    <div class="location-info">
                        <h2>Sede Centro</h2>
                        <div class="badges"><span class="badge">Restaurante</span><span class="badge status">Activa</span></div>
                        <p class="address"><i class="fa-solid fa-location-dot"></i>Av. Principal 123, CDMX</p>
                        <div class="details"><span><i class="fa-solid fa-utensils"></i>3 servicios diarios</span><span><i class="fa-regular fa-user"></i>Capacidad: 120</span></div>
                    </div>
                    <div class="card-actions"><button class="edit-button" type="button"><i class="fa-regular fa-pen-to-square"></i>Editar</button><button class="more-button" type="button" aria-label="Más opciones para Sede Centro"><i class="fa-solid fa-ellipsis"></i></button></div>
                </article>

                <article class="location-card" data-name="sede planta norte comedor industrial parque naucalpan">
                    <img class="location-image" src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=700&q=80" alt="Comedor de Sede Planta Norte">
                    <div class="location-info">
                        <h2>Sede Planta Norte</h2>
                        <div class="badges"><span class="badge">Comedor industrial</span><span class="badge status">Activa</span></div>
                        <p class="address"><i class="fa-solid fa-location-dot"></i>Parque Industrial 45, Naucalpan</p>
                        <div class="details"><span><i class="fa-solid fa-utensils"></i>4 servicios diarios</span><span><i class="fa-regular fa-user"></i>Capacidad: 288</span></div>
                    </div>
                    <div class="card-actions"><button class="edit-button" type="button"><i class="fa-regular fa-pen-to-square"></i>Editar</button><button class="more-button" type="button" aria-label="Más opciones para Sede Planta Norte"><i class="fa-solid fa-ellipsis"></i></button></div>
                </article>

                <p class="empty-state" id="empty-state">No se encontraron sedes con ese criterio.</p>
            </div>
        </section>
    </main>
</div>

<script>
    const searchInput = document.getElementById('location-search');
    const locationCards = [...document.querySelectorAll('.location-card')];
    const emptyState = document.getElementById('empty-state');

    searchInput.addEventListener('input', () => {
        const query = searchInput.value.trim().toLocaleLowerCase('es');
        let visibleCards = 0;

        locationCards.forEach((card) => {
            const isVisible = card.dataset.name.includes(query);
            card.hidden = !isVisible;
            visibleCards += Number(isVisible);
        });

        emptyState.style.display = visibleCards ? 'none' : 'block';
    });
</script>
</body>
</html>
