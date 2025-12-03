<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisoSeeder extends Seeder {
    public function run(): void {
        $permisos = [
            ['nombre' => 'eliminar_mensajes'],
            ['nombre' => 'bloquear_usuarios'],
            ['nombre' => 'editar_mensajes'],
            ['nombre' => 'crear_eventos'],
            ['nombre' => 'crear_foros'],
        ];

        DB::table('permisos')->insert($permisos);
    }
}
