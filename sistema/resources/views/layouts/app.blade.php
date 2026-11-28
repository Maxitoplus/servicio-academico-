
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <meta name="theme-color" content="#123b50">

    <title>@yield('title', 'Sistema de Gestión Escolar')</title>

    {{-- Estilos y JavaScript administrados por Vite --}}
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body>

    {{-- Accesibilidad --}}
    <a class="skip" href="#contenido">
        Saltar al contenido
    </a>

    <div class="shell">

        {{-- Menú lateral --}}
        <x-sidebar />

        <div class="main">

            {{-- Barra superior --}}
            <header class="top">

                <div class="top-heading">
                    <strong>Servicio Académico</strong>
                    <small>Sistema de Gestión Escolar</small>
                </div>

                <div class="top-actions">

                    <span class="top-username">
                        {{ session('usuario', 'Invitado') }}
                    </span>

                    <span class="role-badge">
                        {{ session('rol', 'Sin rol') }}
                    </span>

                    <a href="{{ route('logout') }}"
                       class="logout-link">
                        Salir
                    </a>

                </div>

            </header>

            {{-- Contenido de cada vista --}}
            <main id="contenido">

                @yield('content')

            </main>

        </div>

    </div>

    {{-- Scripts adicionales de cada vista --}}
    @stack('scripts')

</body>
</html>
