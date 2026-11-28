<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureActiveUser
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        $rolesPermitidos = [
            'administrador',
            'secretaria',
            'cajero',
            'docente',
            'tutor',
            'alumno',
            'direccion',
            'rh',
        ];

        if (!$user) {
            return redirect()->route('login');
        }

        if (
            !$user->activo ||
            !in_array($user->rol, $rolesPermitidos, true)
        ) {
            Auth::guard('web')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->withErrors([
                'email' => 'Cuenta sin acceso autorizado.',
            ]);
        }

        return $next($request);
    }
}
