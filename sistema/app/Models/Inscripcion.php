<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';
    protected $fillable = ['alumno_id', 'grupo_id', 'fecha_inscripcion', 'estatus'];

    public function alumno() { return $this->belongsTo(Alumno::class, 'alumno_id'); }
    public function grupo() { return $this->belongsTo(Grupo::class, 'grupo_id'); }
    public function pagos() { return $this->hasMany(Pago::class, 'inscripcion_id'); }
}
