<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// 1. Flujo de Autenticación Seguro
Route::get('/login', [AuthController::class, 'mostrarLogin'])->name('login');
Route::post('/login', [AuthController::class, 'autenticar'])->name('login.autenticar');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// 2. Panel Principal (Con redirección automática si entra el cajero)
Route::get('/', function () { 
    if (!session()->has('usuario')) return redirect()->route('login');
    if (session('rol') === 'Cajero Escolar') return redirect()->route('pagos');
    return view('home'); 
})->name('home');

// 3. Vistas Protegidas (Solo el Administrador puede entrar, el cajero es rebotado a pagos)
Route::get('/alumnos', function () { 
    if (!session()->has('usuario')) return redirect()->route('login');
    if (session('rol') !== 'Administrador') return redirect()->route('pagos');
    return view('alumnos'); 
})->name('alumnos');

Route::get('/docentes', function () { 
    if (!session()->has('usuario')) return redirect()->route('login');
    if (session('rol') !== 'Administrador') return redirect()->route('pagos');
    return view('docentes'); 
})->name('docentes');

Route::get('/grupos', function () { 
    if (!session()->has('usuario')) return redirect()->route('login');
    if (session('rol') !== 'Administrador') return redirect()->route('pagos');
    return view('grupos'); 
})->name('grupos');

Route::get('/materias', function () { 
    if (!session()->has('usuario')) return redirect()->route('login');
    if (session('rol') !== 'Administrador') return redirect()->route('pagos');
    return view('materias'); 
})->name('materias');

// 4. Módulo Financiero (Bautizado correctamente para evitar errores)
Route::get('/pagos', function () { 
    if (!session()->has('usuario')) return redirect()->route('login');
    return view('pagos'); 
})->name('pagos');

Route::get('/pagos/ficha', function () { 
    if (!session()->has('usuario')) return redirect()->route('login');
    return view('ficha'); 
})->name('ficha');



