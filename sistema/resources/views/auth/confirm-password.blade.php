
@extends('auth.layout')

@section('title', 'Confirmar contraseña')

@section('content')

    <h1>Confirmar contraseña</h1>

    <p>
        Por seguridad, confirma tu contraseña antes de
        configurar la autenticación en dos pasos.
    </p>

    <form method="POST"
          action="{{ url('/user/confirm-password') }}">

        @csrf

        <label>
            Contraseña actual

            <input
                type="password"
                name="password"
                autocomplete="current-password"
                required
                autofocus
            >
        </label>

        <button type="submit" class="btn">
            Confirmar contraseña
        </button>

    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button class="btn secondary" type="submit">
            Cerrar sesión
        </button>
    </form>

@endsection
