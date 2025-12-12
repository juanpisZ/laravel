<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permiso;
use Illuminate\Support\Facades\DB;

class RolePermisoSeeder extends Seeder
{
    public function run()
    {
        DB::transaction(function () {
            // Roles
            $admin = Role::firstOrCreate(['nombre' => 'admin'], ['descripcion' => 'Administrador con todos los permisos']);
            $usuario = Role::firstOrCreate(['nombre' => 'usuario'], ['descripcion' => 'Usuario normal']);

            // Permisos básicos 
            $permisos = [
                ['nombre' => 'eventos.create', 'descripcion' => 'Crear eventos'],
                ['nombre' => 'eventos.edit',   'descripcion' => 'Editar eventos'],
                ['nombre' => 'eventos.delete', 'descripcion' => 'Eliminar eventos'],
                ['nombre' => 'eventos.view',   'descripcion' => 'Ver eventos'],
                ['nombre' => 'usuarios.manage','descripcion' => 'Gestionar usuarios'],
            ];

            foreach ($permisos as $p) {
                Permiso::firstOrCreate(['nombre' => $p['nombre']], ['descripcion' => $p['descripcion']]);
            }

            // Asignar todos los permisos al admin
            $todos = Permiso::all();
            $admin->permisos()->sync($todos->pluck('id')->toArray());

            // Asignar permisos limitados al usuario
            $usuarioPermisos = Permiso::whereIn('nombre', ['eventos.view', 'eventos.create'])->pluck('id')->toArray();
            $usuario->permisos()->sync($usuarioPermisos);
        });
    }
}
