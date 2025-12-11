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
        Schema::create('eventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index('eventos_user_id_foreign');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->dateTime('fecha');
            $table->string('ubicacion')->nullable();
            $table->string('categoria')->nullable();
            $table->enum('estado', ['abierto', 'cerrado', 'cancelado'])->default('abierto');
            $table->integer('capacidad')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
