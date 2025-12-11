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
        Schema::create('moderadores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index('moderadores_user_id_foreign');
            $table->unsignedBigInteger('foro_id')->nullable()->index('moderadores_foro_id_foreign');
            $table->unsignedBigInteger('evento_id')->nullable()->index('moderadores_evento_id_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moderadores');
    }
};
