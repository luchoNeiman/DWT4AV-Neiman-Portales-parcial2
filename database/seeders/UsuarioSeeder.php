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
                'nombre' => 'Admin Umami',
                'email' => 'admin@umami.com',
                'password' => Hash::make('12345678'), // Contraseña hasheada
                'rol' => 'admin', // Rol de admin
                'ubicacion' => 'Sede Central',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Usuario Cliente de prueba
            [
                'nombre' => 'Luciano Neiman',
                'email' => 'luciano.neiman@davinci.edu.ar',
                'password' => Hash::make('12345678'), // Contraseña hasheada
                'rol' => 'usuario', // Rol de usuario
                'ubicacion' => 'Angel Gallardo 97, CABA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
