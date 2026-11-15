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
        Schema::table('users', function (Blueprint $table) {
            // Agregamos las dos columnas después de 'password'
            $table->string('rol', 30)->default('Administrador')->after('password');
            $table->boolean('activo')->default(true)->after('rol');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Si algún día deshaces esta migración, borra estas dos columnas
            $table->dropColumn(['rol', 'activo']);
        });
    }
};
