<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(\Database\Seeders\Modules\Roles\RolesSeeder::class);
        $this->call(\Database\Seeders\Modules\Users\UsersSeeder::class);
        $this->call(\Database\Seeders\Modules\Instituciones\InstitucionesSeeder::class);
        $this->call(\Database\Seeders\Modules\Categorias\CategoriasSeeder::class);
        $this->call(\Database\Seeders\Modules\Docentes\DocentesSeeder::class);
        $this->call(\Database\Seeders\Modules\Docentes\DocenteEstadosSeeder::class);
    }
}
