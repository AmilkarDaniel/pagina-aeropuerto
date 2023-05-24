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
        Schema::create('noticias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->longText('detalle');
            $table->integer('prioridad');
            $table->date('vigenciaI');
            $table->date('vigenciaF');
            $table->integer('user_id');
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
        Schema::dropIfExists('noticias');
    }
};
