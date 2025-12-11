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
        DB::statement("CREATE VIEW `vista_permisos_por_usuario` AS select `u`.`id_usuario` AS `id_usuario`,`u`.`nombre` AS `usuario`,`r`.`nombre` AS `rol`,`p`.`nombre` AS `permiso` from ((((`nexus`.`usuarios` `u` join `nexus`.`usuario_roles` `ur` on(`ur`.`id_usuario` = `u`.`id_usuario`)) join `nexus`.`roles` `r` on(`r`.`id_rol` = `ur`.`id_rol`)) join `nexus`.`roles_permisos` `rp` on(`rp`.`id_rol` = `r`.`id_rol`)) join `nexus`.`permisos` `p` on(`p`.`id_permiso` = `rp`.`id_permiso`))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vista_permisos_por_usuario`");
    }
};
