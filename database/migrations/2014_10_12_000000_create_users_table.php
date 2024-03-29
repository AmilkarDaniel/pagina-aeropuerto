<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('cargo');
            $table->longText('foto')->nullable();
            $table->integer('rol_id');
            
            //relacion con area 1:N
            $table->integer('area_id');
            //$table->foreign('area_id')->references('id')->on('areas')->onDelete('set null');

            //campos de auditoria:
            $table->integer('ca_idUsuario');
            $table->string('ca_tipo');
            $table->boolean('ca_estado');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
