<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creador_id')->constrained('users')->onDelete('cascade');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->dateTime('fecha');
            $table->string('ubicacion')->nullable();

            // OPCIONALES PERO  RECOMENDADOS
            $table->string('categoria')->nullable(); // Para filtros
            $table->enum('estado', ['abierto', 'cerrado', 'cancelado'])->default('abierto'); // Reportes
            $table->integer('capacidad')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('eventos');
    }
};
