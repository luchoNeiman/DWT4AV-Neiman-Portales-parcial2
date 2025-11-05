<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            // Usuario Administrador
            [
                'name' => 'Admin Umami',
                'email' => 'admin@umami.com',
                'password' => Hash::make('123456'), // Contraseña hasheada
                'rol' => 'admin', // Rol de admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Usuario Cliente de prueba
            [
                'name' => 'Luciano Neiman',
                'email' => 'luciano.neiman@davinci.edu.ar',
                'password' => Hash::make('123456'), // Contraseña hasheada
                'rol' => 'usuario', // Rol de usuario
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
