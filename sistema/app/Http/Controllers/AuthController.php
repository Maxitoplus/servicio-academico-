<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function mostrarLogin()
    {
        return view('login');
    }

    public function autenticar(Request $request)
    {
        // 1. Validación estricta de entrada (FrontEnd + BackEnd)
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        // 2. Consulta real a la tabla 'users' en MySQL mediante Eloquent
        $usuario = User::where('email', $request->email)->first();

        // 3. Verificamos existencia, estado activo y contraseña encriptada (Hash::check)
        if ($usuario && $usuario->activo && Hash::check($request->password, $usuario->password)) {
            
            // Guardamos la sesión oficial desde la base de datos
            session([
                'user_id' => $usuario->id,
                'usuario' => $usuario->name,
                'rol' => $usuario->rol
            ]);

            // Redirección dinámica según el rol registrado en MySQL
            if ($usuario->rol === 'Cajero Escolar') {
                return redirect()->route('pagos');
            }

            return redirect()->route('home');
        }

        // 4. Manejo seguro de errores (No revela si falló el correo o la clave)
        return back()->withErrors([
            'error_login' => 'Las credenciales no coinciden o la cuenta está inactiva.',
        ])->withInput();
    }

    public function logout()
    {
        session()->forget(['user_id', 'usuario', 'rol']);
        return redirect()->route('login');
    }
}
