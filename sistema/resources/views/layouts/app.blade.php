{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'Sistema de Gestión Escolar')</title>
    <style>
        /* Pegamos los estilos exactos del prototipo */
        :root{box-sizing:border-box;padding-top:env(safe-area-inset-top,0px);padding-bottom:env(safe-area-inset-bottom,0px);color-scheme:light;
        --bg:#f4f6f8;--surface:#fff;--text:#1b2733;--muted:#5b6b7a;--line:#d5dce3;--brand:#1f5f8b;--brand-ink:#fff;--ok:#1d7a4d;--warn:#b26a00;--bad:#b3261e;--side:#16324a;--side-ink:#e8f0f6}
        @media (prefers-color-scheme:dark){:root:not([data-theme="light"]){color-scheme:dark;--bg:#10161c;--surface:#18222b;--text:#e6edf3;--muted:#98a8b6;--line:#2c3a47;--brand:#5aa9dc;--brand-ink:#08141d;--ok:#4cc38a;--warn:#e0a04a;--bad:#f2766e;--side:#0b1822;--side-ink:#dbe7f1}}
        :root[data-theme="dark"]{color-scheme:dark;--bg:#10161c;--surface:#18222b;--text:#e6edf3;--muted:#98a8b6;--line:#2c3a47;--brand:#5aa9dc;--brand-ink:#08141d;--ok:#4cc38a;--warn:#e0a04a;--bad:#f2766e;--side:#0b1822;--side-ink:#dbe7f1}
        html{scroll-padding-top:env(safe-area-inset-top,0px)}
        *,*::before,*::after{box-sizing:inherit}
        body{margin:0;background:var(--bg);color:var(--text);font:16px/1.5 "Segoe UI",system-ui,"Helvetica Neue",sans-serif}
        a{color:inherit}
        .skip{position:absolute;left:-999px}.skip:focus{left:8px;top:8px;background:var(--surface);padding:8px;z-index:9}
        :focus-visible{outline:3px solid var(--brand);outline-offset:2px}
        .shell{display:grid;grid-template-columns:230px 1fr;min-height:100vh}
        .main{display:flex;flex-direction:column;min-width:0}
        .top{display:flex;gap:12px;justify-content:flex-end;align-items:center;flex-wrap:wrap;padding:10px 24px;background:var(--surface);border-bottom:1px solid var(--line);font-size:.9rem}
        .badge{background:var(--bg);border:1px solid var(--line);border-radius:99px;padding:2px 10px;font-weight:700}
        .badge.ro{color:var(--warn)}
        main{padding:24px;max-width:1100px;width:100%}
        h1{margin:0 0 4px;font-size:1.6rem}.sub{color:var(--muted);margin:0 0 20px}
        .head{display:flex;justify-content:space-between;gap:12px;flex-wrap:wrap;align-items:flex-start}
        .card{background:var(--surface);border:1px solid var(--line);border-radius:12px;padding:16px;margin-bottom:16px}
        .kpis{display:grid;grid-template-columns:repeat(auto-fit,minmax(170px,1fr));gap:12px;margin-bottom:16px}
        .kpi b{display:block;font-size:1.9rem}.kpi span{color:var(--muted);font-size:.9rem}
        .btn{min-height:44px;padding:0 18px;border-radius:8px;border:2px solid var(--brand);background:var(--surface);color:var(--brand);font:inherit;font-weight:700;cursor:pointer}
        .btn.p{background:var(--brand);color:var(--brand-ink)}
        .btn.s{min-height:36px;padding:0 12px}
        .tw{overflow-x:auto}
        table{width:100%;border-collapse:collapse;font-size:.95rem}
        caption{text-align:left;font-weight:700;padding-bottom:8px}
        th,td{text-align:left;padding:10px;border-bottom:1px solid var(--line);white-space:nowrap}
        th{background:var(--bg);font-size:.85rem;color:var(--muted)}
        .st{font-weight:700}.st.Pagado,.st.Activo{color:var(--ok)}.st.Pendiente{color:var(--warn)}.st.Vencido{color:var(--bad)}
        form .g{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:12px}
        label{display:grid;gap:4px;font-size:.85rem;font-weight:600}
        input,select{min-height:44px;padding:0 10px;border:1px solid var(--line);border-radius:8px;background:var(--bg);color:var(--text);font:inherit}
        fieldset{border:1px solid var(--line);border-radius:10px;margin:0 0 14px}
        @media (max-width:760px){.shell{grid-template-columns:1fr}.side ul{display:flex;overflow-x:auto}.side a{white-space:nowrap}main{padding:16px}}
        @media print{.side,.top,.noprint{display:none}.shell{display:block}}
    </style>
</head>
<body>
    <a class="skip" href="#contenido">Saltar al contenido</a>

    <div class="shell">
        <!-- El componente del Menú Lateral de Laravel -->
        <x-sidebar />

        <div class="main">
            <!-- Barra superior simulada -->
            <header class="top">
                <span>Usuario: <strong>Jhonas</strong></span>
                <span class="badge">Administrador</span>
            </header>

            <!-- Aquí se inyectará el contenido dinámico de cada página -->
            <main id="contenido">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
