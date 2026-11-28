<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        return match ($user->rol) {

            'administrador' => view('home', [
                'user' => $user,
            ]),

            'cajero' => redirect()->route('pagos'),

            'secretaria',
            'docente',
            'tutor',
            'alumno',
            'direccion',
            'rh' => view('dashboard.index', [
                'user' => $user,
            ]),

            default => abort(403, 'Rol no autorizado.'),
        };
    }
}
