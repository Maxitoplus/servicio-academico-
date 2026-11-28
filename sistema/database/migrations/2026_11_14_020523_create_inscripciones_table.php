<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inscripciones', function (Blueprint $table) {
    $table->id();
    $table->foreignId('alumno_id')->constrained('alumnos');
    $table->foreignId('grupo_id')->constrained('grupos');
    $table->date('fecha_inscripcion');
    $table->string('estatus', 20)->default('Activa'); // Activa/baja/finalizada
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
