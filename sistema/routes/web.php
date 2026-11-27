<?php

use App\Http\Controllers\DashboardController;
use App\Http\Middleware\EnsureActiveUser;
use App\Http\Middleware\EnsureTwoFactorEnabled;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

// Configuración inicial del 2FA
Route::middleware([
    'auth',
    EnsureActiveUser::class,
    'password.confirm',
])->group(function () {

    Route::get('/configurar-2fa', function () {
        return view('auth.two-factor-setup');
    })->name('two-factor.setup');

});

// Rutas protegidas
Route::middleware([
    'auth',
    EnsureActiveUser::class,
    EnsureTwoFactorEnabled::class,
])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
        ->name('home');

    Route::view('/alumnos', 'alumnos')
        ->middleware(RoleMiddleware::class.':administrador,secretaria')
        ->name('alumnos');

    Route::view('/docentes', 'docentes')
        ->middleware(RoleMiddleware::class.':administrador')
        ->name('docentes');

    Route::view('/grupos', 'grupos')
        ->middleware(RoleMiddleware::class.':administrador,secretaria')
        ->name('grupos');

    Route::view('/materias', 'materias')
        ->middleware(RoleMiddleware::class.':administrador')
        ->name('materias');

    Route::view('/pagos', 'pagos')
        ->middleware(RoleMiddleware::class.':administrador,cajero')
        ->name('pagos');

    Route::view('/pagos/ficha', 'ficha')
        ->middleware(RoleMiddleware::class.':administrador,cajero')
        ->name('ficha');

});
