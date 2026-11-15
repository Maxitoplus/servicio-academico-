<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';
    protected $fillable = [
        'inscripcion_id', 'folio', 'concepto', 'periodo', 
        'importe', 'fecha_pago', 'metodo_pago', 'estatus', 
        'registrado_por', 'motivo_cancelacion'
    ];

    public function inscripcion() { return $this->belongsTo(Inscripcion::class, 'inscripcion_id'); }
    public function cajero() { return $this->belongsTo(User::class, 'registrado_por'); }
}
