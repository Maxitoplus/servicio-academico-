@extends('auth.layout')

@section('title', 'Configurar autenticación 2FA')

@section('content')

    <h1>Autenticación en dos pasos</h1>

    <p>
        Bienvenido, <strong>{{ auth()->user()->name }}</strong>.
    </p>

    <p>
        Rol: {{ auth()->user()->nombre_rol }}
    </p>

    @if (!auth()->user()->two_factor_secret)

        <p>
            Para ingresar al sistema escolar necesitas
            configurar Google Authenticator.
        </p>

        <form method="POST"
              action="{{ url('/user/two-factor-authentication') }}">

            @csrf

            <button type="submit" class="btn">
                Activar autenticación 2FA
            </button>

        </form>

    @elseif (!auth()->user()->two_factor_confirmed_at)

        <p>
            Abre Google Authenticator en tu teléfono
            y escanea el siguiente código QR.
        </p>

        <div class="qr">
            {!! auth()->user()->twoFactorQrCodeSvg() !!}
        </div>

        <form method="POST"
              action="{{ url('/user/confirmed-two-factor-authentication') }}">

            @csrf

            <label>
                Código de seis dígitos

                <input
                    type="text"
                    name="code"
                    inputmode="numeric"
                    autocomplete="one-time-code"
                    pattern="[0-9]{6}"
                    maxlength="6"
                    placeholder="000000"
                    required
                >
            </label>

            <button type="submit" class="btn">
                Confirmar autenticación
            </button>

        </form>

    @else

        <h2>Autenticación activada</h2>

        <p>
            Guarda estos códigos de recuperación en un
            lugar seguro. Podrás utilizarlos si pierdes
            el acceso a Google Authenticator.
        </p>

        <div class="codes">
            @foreach (auth()->user()->recoveryCodes() as $code)
                <div>{{ $code }}</div>
            @endforeach
        </div>

        <a href="{{ route('home') }}" class="btn">
            Entrar al sistema
        </a>

    @endif

    <form method="POST" action="{{ route('logout') }}">

        @csrf

        <button type="submit" class="btn secondary">
            Cerrar sesión
        </button>

    </form>

@endsection
