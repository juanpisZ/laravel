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
        Schema::table('moderadores', function (Blueprint $table) {
            $table->foreign(['evento_id'])->references(['id'])->on('eventos')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['foro_id'])->references(['id'])->on('foros')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('moderadores', function (Blueprint $table) {
            $table->dropForeign('moderadores_evento_id_foreign');
            $table->dropForeign('moderadores_foro_id_foreign');
            $table->dropForeign('moderadores_user_id_foreign');
        });
    }
};
