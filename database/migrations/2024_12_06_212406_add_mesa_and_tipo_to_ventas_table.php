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
        Schema::table('ventas', function (Blueprint $table) {
            $table->unsignedBigInteger('mesa_id')->nullable()->after('id'); // Campo para la mesa
            $table->enum('tipo_servicio', ['comer_aqui', 'delivery', 'para_llevar'])->nullable()->after('mesa_id'); // Campo para el tipo de servicio

            // Si deseas agregar una relación con la tabla mesas
            $table->foreign('mesa_id')->references('id')->on('mesas')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->dropForeign(['mesa_id']); // Eliminar la relación
            $table->dropColumn(['mesa_id', 'tipo_servicio']); // Eliminar los campos
        });
    }
};
