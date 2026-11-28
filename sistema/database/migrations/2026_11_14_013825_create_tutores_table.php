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
        Schema::create('tutores', function (Blueprint $table) {
    $table->id();
    $table->string('nombres', 100);
    $table->string('apellido_paterno', 60);
    $table->string('apellido_materno', 60)->nullable();
    $table->string('telefono', 20)->nullable();
    $table->string('email', 150)->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutores');
    }
};
