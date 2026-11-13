{{-- resources/views/components/sidebar.blade.php --}}
<aside class="side">
    <h2>Gestión Escolar</h2>

    {{-- Si el usuario es Administrador, ve todo el árbol de navegación --}}
    @if(session('rol') === 'Administrador')
        <a href="/" {{ request()->is('/') ? 'aria-current=page' : '' }}>Inicio</a>
        <a href="/alumnos" {{ request()->is('alumnos*') ? 'aria-current=page' : '' }}>Alumnos</a>
        <a href="/docentes" {{ request()->is('docentes*') ? 'aria-current=page' : '' }}>Docentes</a>
        <a href="/grupos" {{ request()->is('grupos*') ? 'aria-current=page' : '' }}>Grupos</a>
        <a href="/materias" {{ request()->is('materias*') ? 'aria-current=page' : '' }}>Materias</a>
    @endif

    {{-- Ambos roles (Administrador y Cajero) tienen acceso al núcleo financiero --}}
    <a href="/pagos" {{ request()->is('pagos*') ? 'aria-current=page' : '' }}>Pagos</a>
</aside>

