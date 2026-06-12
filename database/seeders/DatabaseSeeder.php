<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Administrador', 'email' => 'admin@example.com', 'role' => 'admin'],
            ['name' => 'Usuario Carga', 'email' => 'carga@example.com', 'role' => 'carga'],
            ['name' => 'Usuario Consulta', 'email' => 'consulta@example.com', 'role' => 'consulta'],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(['email' => $user['email']], [
                'name' => $user['name'],
                'password' => Hash::make('password'),
                'role' => $user['role'],
            ]);
        }
    }
}
