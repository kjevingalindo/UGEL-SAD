<?php

namespace Database\Seeders\Modules\Roles\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['nombre' => 'Administrador', 'descripcion' => 'Acceso total al sistema'],
            ['nombre' => 'Director', 'descripcion' => 'Gestión de su institución y docentes'],
            ['nombre' => 'Docente', 'descripcion' => 'Acceso a su perfil y reportes personales'],
        ]);
    }
}
