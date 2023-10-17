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
        Schema::create('dominios', function (Blueprint $table) {
            $table->id(); //primary key
            $table->unsignedBigInteger('titular_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('dueño_id');
            $table->string('nombre');
            $table->string('estado');
            $table->date('fechaAlta');
            $table->date('fechaRegistro');
            $table->date('fechaVencimiento');
            $table->timestamps(); //esto crea el created_at y updated_at
            $table->foreign('titular_id')->references('id')->on('clientes');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('dueño_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dominios');
    }
};
