<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function mostrarLogin()
    {
        return view('login');
    }

    public function autenticar(Request $request)
    {
        // 1. Validación de campos (FrontEnd + BackEnd como pide la rúbrica)
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        // 2. Simulación de cuentas basadas en los roles del reporte de la UTT
        if ($request->email === 'admin@utt.edu.mx' && $request->password === '1234') {
            session(['usuario' => 'Josué López', 'rol' => 'Administrador']);
            return redirect()->route('home');
        } 
        
        if ($request->email === 'cajero@utt.edu.mx' && $request->password === '1234') {
            session(['usuario' => 'Ángel Ibáñez', 'rol' => 'Cajero Escolar']);
            return redirect()->route('pagos');
        }

        // 3. Manejo seguro de errores (No revela detalles internos)
        return back()->withErrors([
            'error_login' => 'Las credenciales introducidas no coinciden con nuestros registros.',
        ])->withInput();
    }

    public function logout()
    {
        session()->forget(['usuario', 'rol']);
        return redirect()->route('login');
    }
}
