@extends('auth.layout')

@section('title', 'Panel principal')

@section('content')

    <h1>Panel de {{ $user->nombre_rol }}</h1>

    <p>
        Bienvenido, <strong>{{ $user->name }}</strong>.
    </p>

    <div>
        <strong>ID del usuario:</strong>
        {{ $user->id }}
    </div>

    <div>
        <strong>Correo:</strong>
        {{ $user->email }}
    </div>

    <div>
        <strong>Rol:</strong>
        {{ $user->nombre_rol }}
    </div>

    <div>
        <strong>Identificador del rol:</strong>
        {{ $user->rol }}
    </div>

    <div>
        <strong>Estado:</strong>
        {{ $user->activo ? 'Activo' : 'Inactivo' }}
    </div>

    <div>
        <strong>Autenticación 2FA:</strong>
        {{ $user->two_factor_confirmed_at
            ? 'Activada'
            : 'Pendiente' }}
    </div>

    @switch($user->rol)

        @case('secretaria')
            <h2>Control escolar</h2>
            <a href="{{ route('alumnos') }}" class="btn">
                Gestionar alumnos
            </a>

            <a href="{{ route('grupos') }}" class="btn">
                Gestionar grupos
            </a>
            @break

        @case('docente')
            <h2>Panel docente</h2>
            <p>Próximamente: grupos, materias y calificaciones.</p>
            @break

        @case('tutor')
            <h2>Panel de padres de familia</h2>
            <p>Próximamente: hijos, pagos y calificaciones.</p>
            @break

        @case('alumno')
            <h2>Panel estudiantil</h2>
            <p>Próximamente: materias y calificaciones.</p>
            @break

        @case('direccion')
            <h2>Panel de dirección</h2>
            <p>Próximamente: informes académicos y financieros.</p>
            @break

        @case('rh')
            <h2>Recursos Humanos</h2>
            <p>Próximamente: administración del personal.</p>
            @break

    @endswitch

    <form method="POST" action="{{ route('logout') }}">

        @csrf

        <button type="submit" class="btn">
            Cerrar sesión
        </button>

    </form>

@endsection
