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
        Schema::create('servicios_aeropuertos', function (Blueprint $table) {
            $table->id();
            $table->integer('aeropuerto_id');
            $table->string('nombre');
            $table->longText('imagen')->nullable();
            $table->longText('descripcion')->nullable();
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
        Schema::dropIfExists('servicios_aeropuertos');
    }
};
