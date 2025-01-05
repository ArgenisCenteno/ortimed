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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion');
            $table->string('cedula');
            $table->string('cargo');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->decimal('salario', 10, 2);
            $table->enum('tipo_pago', ['semanal', 'mensual']);
            $table->enum('estado', ['activo', 'inactivo']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
