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
        Schema::create('pagos_empleados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained()->onDelete('cascade');
            $table->decimal('monto_pagado', 10, 2);
            $table->decimal('extra', 10, 2);

            $table->date('fecha_pago');
            $table->enum('tipo_pago', ['semanal', 'mensual']);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos_empleados');
    }
};
