<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::insert([
            [
                'nombre' => 'admin',
                'descripcion' => 'Administrador general',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'moderador',
                'descripcion' => 'Modera foros y eventos',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'usuario',
                'descripcion' => 'Usuario normal',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
