<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE VIEW `vista_permisos_extra` AS select `u`.`id_usuario` AS `id_usuario`,`u`.`nombre` AS `usuario`,`p`.`nombre` AS `permiso` from ((`nexus`.`usuario_permisos_extra` `upe` join `nexus`.`usuarios` `u` on(`u`.`id_usuario` = `upe`.`id_usuario`)) join `nexus`.`permisos` `p` on(`p`.`id_permiso` = `upe`.`id_permiso`))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vista_permisos_extra`");
    }
};
