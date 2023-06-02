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
        Schema::create('informacion_aeropuertos', function (Blueprint $table) {
            $table->id();
            $table->integer('aeropuerto_id');
            $table->longText('wifi')->nullable();
            $table->longText('peaje_auto')->nullable();
            $table->longText('peaje_motocicleta')->nullable();
            $table->longText('tarifa_parqueo')->nullable();
            $table->longText('articulos_prohibidos')->nullable();
            $table->longText('ap_armas')->nullable();
            $table->longText('ap_objetos_punzantes')->nullable();
            $table->longText('ap_art_contundentes')->nullable();
            $table->longText('ap_sust_quimicas')->nullable();
            $table->longText('ap_mat_peligroso')->nullable();
            $table->longText('ap_sust_explosivas')->nullable();
            $table->integer('ca_idUsuario');
            $table->string('ca_tipo');
            $table->boolean('ca_estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacion_aeropuertos');
    }
};
