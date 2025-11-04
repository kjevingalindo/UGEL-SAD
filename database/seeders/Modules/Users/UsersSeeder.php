<?php

namespace Database\Seeders\Modules\Users;

use Illuminate\Database\Seeder;
use App\Modules\Auth\User;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
    public function run()
    {
        // Crear usuarios con sus roles asignados

        // 1. Administrador UGEL
        $admin = User::firstOrCreate(
            ['email' => 'admin@ugel.com'],
            [
                'name' => 'Administrador UGEL',
                'password' => bcrypt('password123'),  // Cambia la contraseña por defecto
            ]
        );
        $adminRole = Role::where('name', 'admin')->first();
        if ($adminRole && !$admin->hasRole('admin')) {
            $admin->assignRole($adminRole);
        }

        // 2. Docente de ejemplo
        $docente = User::firstOrCreate(
            ['email' => 'docente@ugel.com'],
            [
                'name' => 'Docente de ejemplo',
                'password' => bcrypt('password123'),
            ]
        );
        $docenteRole = Role::where('name', 'docente')->first();
        if ($docenteRole && !$docente->hasRole('docente')) {
            $docente->assignRole($docenteRole);
        }

        // 3. Director Institución
        $director = User::firstOrCreate(
            ['email' => 'director@ugel.com'],
            [
                'name' => 'Director Institución',
                'password' => bcrypt('password123'),
            ]
        );
        $directorRole = Role::where('name', 'director')->first();
        if ($directorRole && !$director->hasRole('director')) {
            $director->assignRole($directorRole);
        }
    }
}
