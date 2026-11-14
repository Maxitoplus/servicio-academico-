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
        Schema::create('pagos', function (Blueprint $table) {
    $table->id();
    $table->foreignId('inscripcion_id')->constrained('inscripciones');
    $table->string('folio', 30)->unique();
    $table->string('concepto', 50);
    $table->string('periodo', 20)->nullable();
    $table->decimal('importe', 10, 2);
    $table->dateTime('fecha_pago');
    $table->string('metodo_pago', 30);
    $table->string('estatus', 20); // Pagado/cancelado/etc.
    $table->foreignId('registrado_por')->constrained('users');
    $table->string('motivo_cancelacion', 255)->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
