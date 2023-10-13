<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;

class DefaultUserSeeder extends Seeder
{
    public function run()
    {
        Usuario::create([
            'nombre' => 'Jorge Gomez',
            'username' => 'jgomez',
            'correo' => 'jorgegomez@gmail.com',
            'password' => bcrypt('1234'), // Hashea la contraseña
            'tipo_usuario_id' => 1, // ID del tipo de usuario por defecto
        ]);
    }
}