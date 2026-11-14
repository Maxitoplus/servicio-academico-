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
        Schema::create('grupos', function (Blueprint $table) {
    $table->id();
    $table->foreignId('ciclo_escolar_id')->constrained('ciclos_escolares');
    $table->unsignedTinyInteger('grado');
    $table->string('nombre_grupo', 10); // Ej. A/B
    $table->unsignedSmallInteger('capacidad')->nullable();
    $table->unique(['ciclo_escolar_id', 'grado', 'nombre_grupo']); // Regla de unicidad del DER
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
