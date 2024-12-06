<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('mesas', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 50)->unique(); // Número o identificador de la mesa
            $table->integer('capacidad');          // Cantidad de personas que caben
            $table->enum('estado', ['Disponible', 'Ocupada'])->default('Disponible'); // Estado de la mesa
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesas');
    }
};
