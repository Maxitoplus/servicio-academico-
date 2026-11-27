@extends('auth.layout')

@section('title', 'Verificación en dos pasos')

@section('content')

    <h1>Verificación en dos pasos</h1>

    <p>
        Ingresa el código de seis dígitos generado
        por Google Authenticator.
    </p>

    <form method="POST"
          action="{{ url('/two-factor-challenge') }}">

        @csrf

        <label>
            Código de autenticación

            <input
                type="text"
                name="code"
                inputmode="numeric"
                autocomplete="one-time-code"
                pattern="[0-9]{6}"
                maxlength="6"
                placeholder="000000"
                required
                autofocus
            >
        </label>

        <button type="submit" class="btn">
            Verificar código
        </button>

    </form>

    <hr>

    <details>

        <summary>Utilizar código de recuperación</summary>

        <form method="POST"
              action="{{ url('/two-factor-challenge') }}"
              style="margin-top:16px;">

            @csrf

            <label>
                Código de recuperación

                <input
                    type="text"
                    name="recovery_code"
                    autocomplete="off"
                    required
                >
            </label>

            <button type="submit" class="btn">
                Verificar recuperación
            </button>

        </form>

    </details>

    <a href="{{ route('login') }}" class="btn secondary">
        Volver al login
    </a>

@endsection
