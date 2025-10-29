<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llamamos al seeder de roles
        $this->call(\Database\Seeders\Modules\Roles\Seeders\RolesSeeder::class);

        // Creamos un usuario administrador
        User::create([
            'name' => 'Administrador UGEL',
            'email' => 'admin@ugel.com',
            'password' => Hash::make('admin123'),
            'role_id' => 1, // Rol Administrador
        ]);
    }
}
