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
        Schema::create('alumnos', function (Blueprint $table) {
    $table->id();
    $table->string('matricula', 20)->unique();
    $table->string('nombres', 100);
    $table->string('apellido_paterno', 60);
    $table->string('apellido_materno', 60)->nullable();
    $table->date('fecha_nacimiento')->nullable();
    $table->string('estatus', 20)->default('Activo'); // Activo/baja/egresado
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
