<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';
    protected $fillable = ['matricula', 'nombres', 'apellido_paterno', 'apellido_materno', 'fecha_nacimiento', 'estatus'];

    // Un alumno tiene muchas inscripciones (historial por ciclo)
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'alumno_id');
    }

    // Relación N:M con tutores
    public function tutores()
    {
        return $this->belongsToMany(Tutor::class, 'alumno_tutor', 'alumno_id', 'tutor_id')
                    ->withPivot('parentesco', 'es_principal')
                    ->withTimestamps();
    }
}
