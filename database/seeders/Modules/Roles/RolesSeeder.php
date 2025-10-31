<?php

namespace Database\Seeders\Modules\Roles;

use Illuminate\Database\Seeder;
use App\Modules\Roles\Models\Role;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(['nombre' => 'admin']);
        Role::firstOrCreate(['nombre' => 'docente']);
        Role::firstOrCreate(['nombre' => 'director']);
    }
}


