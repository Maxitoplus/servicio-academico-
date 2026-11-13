{{-- resources/views/login.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Iniciar Sesión - Sistema de Gestión Escolar</title>
    <style>
        /* variables del equipo */
        :root { --bg:#f4f6f8; --surface:#fff; --text:#1b2733; --line:#d5dce3; --brand:#1f5f8b; --brand-ink:#fff; }
        @media (prefers-color-scheme:dark){ :root { --bg:#10161c; --surface:#18222b; --text:#e6edf3; --line:#2c3a47; --brand:#5aa9dc; --brand-ink:#08141d; } }
        body { margin:0; background:var(--bg); color:var(--text); font:16px/1.5 "Segoe UI", system-ui, sans-serif; }
        .login { min-height:100vh; display:grid; place-items:center; padding:16px; }
        .card { background:var(--surface); border:1px solid var(--line); border-radius:12px; padding:24px; width:min(420px,100%); display:grid; gap:16px; }
        label { display:grid; gap:4px; font-size:.85rem; font-weight:600; }
        input { min-height:44px; padding:0 10px; border:1px solid var(--line); border-radius:8px; background:var(--bg); color:var(--text); font:inherit; }
        .btn { min-height:44px; padding:0 18px; border-radius:8px; border:2px solid var(--brand); background:var(--brand); color:var(--brand-ink); font:inherit; font-weight:700; cursor:pointer; }
        h1 { margin:0; font-size:1.5rem; text-align:center; }
        .sub { color:var(--brand); text-decoration:none; text-align:center; font-size:.85rem; }
    </style>
</head>
<body>
    <div class="login">
        <article class="card">
            <h1>Sistema Escolar V.1</h1>
            <p style="text-align:center; margin:0; color:gray; font-size:.9rem;">Ingresa tus credenciales de acceso</p>

           {{-- En tu resources/views/login.blade.php --}}
<form action="{{ route('login.autenticar') }}" method="POST" style="display:grid; gap:16px;">
    @csrf {{-- Protección obligatoria contra ataques CSRF --}}
    
    @if ($errors->has('error_login'))
        <div style="color: var(--bad); background: rgba(179,38,30,0.1); padding: 10px; border-radius: 8px; font-size: 0.85rem; text-align: center; font-weight: 600;">
            {{ $errors->first('error_login') }}
        </div>
    @endif

    <label>Usuario o Correo Electrónico
        <input type="email" name="email" placeholder="ejemplo@escuela.com" value="{{ old('email') }}" required>
    </label>
    <label>Contraseña
        <input type="password" name="password" placeholder="••••••••" required>
    </label>
    <button type="submit" class="btn">Iniciar Sesión</button>
</form>



            <a href="#" class="sub">¿Olvidaste tu contraseña?</a>
        </article>
    </div>
</body>
</html>
