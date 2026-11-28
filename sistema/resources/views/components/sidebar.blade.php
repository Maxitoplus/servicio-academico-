
<aside class="side">

    <div class="side-brand">
        <div class="brand-symbol">SA</div>

        <div class="brand-details">
            <strong>Servicio Académico</strong>
            <small>Gestión Escolar</small>
        </div>
    </div>

    <div class="side-menu">
        <p class="menu-heading">MENÚ PRINCIPAL</p>

        @if(session('rol') === 'Administrador')

            <a href="{{ route('home') }}"
               class="side-link {{ request()->routeIs('home') ? 'active' : '' }}"
               @if(request()->routeIs('home')) aria-current="page" @endif>
                <span class="side-icon">⌂</span>
                <span>Inicio</span>
            </a>

            <a href="{{ route('alumnos') }}"
               class="side-link {{ request()->routeIs('alumnos') ? 'active' : '' }}"
               @if(request()->routeIs('alumnos')) aria-current="page" @endif>
                <span class="side-icon">♙</span>
                <span>Alumnos</span>
            </a>

            <a href="{{ route('docentes') }}"
               class="side-link {{ request()->routeIs('docentes') ? 'active' : '' }}"
               @if(request()->routeIs('docentes')) aria-current="page" @endif>
                <span class="side-icon">♧</span>
                <span>Docentes</span>
            </a>

            <a href="{{ route('grupos') }}"
               class="side-link {{ request()->routeIs('grupos') ? 'active' : '' }}"
               @if(request()->routeIs('grupos')) aria-current="page" @endif>
                <span class="side-icon">▦</span>
                <span>Grupos</span>
            </a>

            <a href="{{ route('materias') }}"
               class="side-link {{ request()->routeIs('materias') ? 'active' : '' }}"
               @if(request()->routeIs('materias')) aria-current="page" @endif>
                <span class="side-icon">▤</span>
                <span>Materias</span>
            </a>

        @endif

        <p class="menu-heading menu-heading-space">
            ADMINISTRACIÓN
        </p>

        <a href="{{ route('pagos') }}"
           class="side-link {{ request()->routeIs('pagos', 'ficha') ? 'active' : '' }}"
           @if(request()->routeIs('pagos', 'ficha')) aria-current="page" @endif>
            <span class="side-icon">$</span>
            <span>Pagos</span>
        </a>

    </div>

    <div class="side-footer">
        <div class="user-avatar">
            {{ mb_strtoupper(mb_substr(session('usuario', 'U'), 0, 1)) }}
        </div>

        <div class="side-user">
            <strong>{{ session('usuario', 'Usuario') }}</strong>
            <small>{{ session('rol', 'Sin rol') }}</small>
        </div>
    </div>

</aside>
