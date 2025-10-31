<?php

namespace Database\Seeders\Modules\Users;

use Illuminate\Database\Seeder;
use App\Modules\Auth\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Administrador UGEL', 'email' => 'admin@ugel.com', 'password' => Hash::make('admin123'), 'role_id' => 1],
            ['name' => 'Director', 'email' => 'director@example.com', 'password' => Hash::make('12345678'), 'role_id' => 2],
            ['name' => 'Docente', 'email' => 'docente@example.com', 'password' => Hash::make('12345678'), 'role_id' => 3],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(['email' => $user['email']], $user);
        }
    }
}
