<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder {
    public function run(): void {
        DB::table('roles')->insert([
            ['nombre' => 'admin', 'descripcion' => 'Administrador general'],
            ['nombre' => 'moderador', 'descripcion' => 'Modera foros y eventos'],
            ['nombre' => 'usuario', 'descripcion' => 'Usuario normal'],
        ]);
    }
}
