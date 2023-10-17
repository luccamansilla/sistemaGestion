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
        Schema::create('historial_dominios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dominio_id');
            $table->string('campo');
            $table->string('valorAnterior');
            $table->string('nuevoValor');
            $table->string('usuario');
            $table->foreign('dominio_id')->references('id')->on('dominios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_dominios');
    }
};
