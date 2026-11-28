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
       Schema::create('calificaciones', function (Blueprint $table) {
    $table->id();
    $table->foreignId('inscripcion_id')->constrained('inscripciones')->onDelete('cascade');
    $table->foreignId('grupo_materia_id')->constrained('grupo_materias')->onDelete('cascade');
    $table->string('periodo', 30); // Bimestre/trimestre/periodo
    $table->decimal('calificacion', 4, 2); // Escala definida (ej. 0.00 a 10.00)
    $table->string('observaciones', 500)->nullable();
    $table->unique(['inscripcion_id', 'grupo_materia_id', 'periodo'], 'calif_inscripcion_materia_periodo_unique');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificaciones');
    }
};
