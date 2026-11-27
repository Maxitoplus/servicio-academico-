<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Vistas de autenticación
        Fortify::loginView(function () {
            return view('login');
        });

        Fortify::twoFactorChallengeView(function () {
            return view('auth.two-factor-challenge');
        });

        Fortify::confirmPasswordView(function () {
            return view('auth.confirm-password');
        });

        // Autenticación contra la base de datos
        Fortify::authenticateUsing(function (Request $request) {

            $user = User::where(
                'email',
                $request->email
            )->first();

            if (
                $user &&
                Hash::check($request->password, $user->password) &&
                $user->tieneRol(
                    'administrador',
                    'secretaria',
                    'cajero',
                    'docente',
                    'tutor',
                    'alumno',
                    'direccion',
                    'rh'
                )
            ) {
                return $user;
            }

            return null;
        });

        Fortify::redirectUserForTwoFactorAuthenticationUsing(
            RedirectIfTwoFactorAuthenticatable::class
        );

        // Limitar intentos de inicio de sesión
        RateLimiter::for('login', function (Request $request) {

            $throttleKey = Str::transliterate(
                Str::lower(
                    (string) $request->input(Fortify::username())
                ).'|'.$request->ip()
            );

            return Limit::perMinute(5)->by($throttleKey);
        });

        // Limitar intentos de verificación 2FA
        RateLimiter::for('two-factor', function (Request $request) {

            return Limit::perMinute(5)->by(
                $request->session()->get('login.id')
                ?? $request->ip()
            );
        });
    }
}
