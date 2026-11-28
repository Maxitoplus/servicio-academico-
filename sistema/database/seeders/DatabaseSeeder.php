<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\CicloEscolar;
use App\Models\Grupo;
use App\Models\Alumno;
use App\Models\Tutor;
use App\Models\Inscripcion;
use App\Models\Pago;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear Usuarios Reales del Sistema con Contraseña Hasheada (Seguridad MVP)
        $admin = User::create([
            'name' => 'Josué López Álvarez',
            'email' => 'admin@utt.edu.mx',
            'password' => Hash::make('1234'),
            'rol' => 'Administrador',
            'activo' => true,
        ]);

        $cajero = User::create([
            'name' => 'Ángel Roberto Ibáñez',
            'email' => 'cajero@utt.edu.mx',
            'password' => Hash::make('1234'),
            'rol' => 'Cajero Escolar',
            'activo' => true,
        ]);

        // 2. Crear Ciclo Escolar Activo
        $ciclo = CicloEscolar::create([
            'nombre' => '2026-2027',
            'fecha_inicio' => '2026-08-24',
            'fecha_fin' => '2027-07-09',
            'activo' => true,
        ]);

        // 3. Crear Grupo
        $grupo = Grupo::create([
            'ciclo_escolar_id' => $ciclo->id,
            'grado' => 3,
            'nombre_grupo' => 'A',
            'capacidad' => 30,
        ]);

        // 4. Crear Alumno y Tutor Ficticios
        $alumno = Alumno::create([
            'matricula' => 'ALU-2026-001',
            'nombres' => 'Ana Sofía',
            'apellido_paterno' => 'Torres',
            'apellido_materno' => 'Méndez',
            'fecha_nacimiento' => '2015-05-14',
            'estatus' => 'Activo',
        ]);

        $tutor = Tutor::create([
            'nombres' => 'Carlos Alberto',
            'apellido_paterno' => 'Torres',
            'apellido_materno' => 'Ruiz',
            'telefono' => '8711234567',
            'email' => 'carlos.torres@ejemplo.com',
        ]);

        // Vincular Alumno con Tutor en tabla pivote
        $alumno->tutores()->attach($tutor->id, ['parentesco' => 'Padre', 'es_principal' => true]);

        // 5. Inscribir al Alumno en el Grupo
        $inscripcion = Inscripcion::create([
            'alumno_id' => $alumno->id,
            'grupo_id' => $grupo->id,
            'fecha_inscripcion' => '2026-08-20',
            'estatus' => 'Activa',
        ]);

        // 6. Registrar un Pago de Prueba
        Pago::create([
            'inscripcion_id' => $inscripcion->id,
            'folio' => 'FOL-2026-0001',
            'concepto' => 'Inscripción Anual',
            'periodo' => '2026-2027',
            'importe' => 2500.00,
            'fecha_pago' => now(),
            'metodo_pago' => 'Transferencia',
            'estatus' => 'Pagado',
            'registrado_por' => $cajero->id,
        ]);
    }
}
