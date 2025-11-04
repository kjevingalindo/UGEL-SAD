<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Crear roles
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $director = Role::firstOrCreate(['name' => 'director', 'guard_name' => 'web']);
        $docente = Role::firstOrCreate(['name' => 'docente', 'guard_name' => 'web']);

        // Obtener permisos
        $verUsuarios = Permission::where('name', 'ver usuarios')->first();
        $crearUsuarios = Permission::where('name', 'crear usuarios')->first();
        $editarUsuarios = Permission::where('name', 'editar usuarios')->first();
        $eliminarUsuarios = Permission::where('name', 'eliminar usuarios')->first();

        $verDocentes = Permission::where('name', 'ver docentes')->first();
        $crearDocentes = Permission::where('name', 'crear docentes')->first();
        $editarDocentes = Permission::where('name', 'editar docentes')->first();
        $eliminarDocentes = Permission::where('name', 'eliminar docentes')->first();

        $verValidaciones = Permission::where('name', 'ver validaciones')->first();

        // Asignar permisos a roles
        $admin->syncPermissions([
            $verUsuarios, $crearUsuarios, $editarUsuarios, $eliminarUsuarios,
            $verDocentes, $crearDocentes, $editarDocentes, $eliminarDocentes,
            $verValidaciones
        ]);

        $director->syncPermissions([
            $verUsuarios, $editarUsuarios,
            $verDocentes, $editarDocentes,
            $verValidaciones
        ]);

        $docente->syncPermissions([
            $verDocentes
        ]);
    }
}
