<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        if (!app()->environment('local')) {
            throw new \RuntimeException(
                'Seeder exclusivo para desarrollo local.'
            );
        }

        $usuarios = [
            ['Administrador', 'admin', 'administrador'],
            ['Secretaría', 'secretaria', 'secretaria'],
            ['Cajero Escolar', 'cajero', 'cajero'],
            ['Maestro', 'maestro', 'docente'],
            ['Padre de Familia', 'padre', 'tutor'],
            ['Alumno', 'alumno', 'alumno'],
            ['Director', 'director', 'direccion'],
            ['Recursos Humanos', 'rh', 'rh'],
        ];

        foreach ($usuarios as [$nombre, $correo, $rol]) {

            $user = User::firstOrNew([
                'email' => $correo . '@escuela.test',
            ]);

            if (!$user->exists) {
                $user->forceFill([
                    'name' => $nombre,
                    'password' => Hash::make('Prueba2026*'),
                    'rol' => $rol,
                    'activo' => true,
                    'email_verified_at' => now(),
                ])->save();

                $this->command->info(
                    'Usuario creado: ' . $user->email
                );
            } else {
                $this->command->warn(
                    'Usuario existente: ' . $user->email
                );
            }
        }

        $this->command->info(
            'Total de usuarios: ' . User::count()
        );
    }
}
