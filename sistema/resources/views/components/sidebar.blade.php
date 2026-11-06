{{-- resources/views/components/sidebar.blade.php --}}
<aside class="side">
    <h2>Gestión Escolar</h2>
    <ul>
        <li><a href="/" {{ request()->is('/') ? 'aria-current=page' : '' }}>Inicio</a></li>
        <li><a href="/alumnos" {{ request()->is('alumnos*') ? 'aria-current=page' : '' }}>Alumnos</a></li>
        <li><a href="/docentes" {{ request()->is('docentes*') ? 'aria-current=page' : '' }}>Docentes</a></li>
        <li><a href="/grupos" {{ request()->is('grupos*') ? 'aria-current=page' : '' }}>Grupos</a></li>
        <li><a href="/materias" {{ request()->is('materias*') ? 'aria-current=page' : '' }}>Materias</a></li>
        <li><a href="/pagos" {{ request()->is('pagos*') ? 'aria-current=page' : '' }}>Pagos</a></li>
    </ul>
</aside>
