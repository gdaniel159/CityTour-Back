<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoUsuario;

class TipoUsuarioSeeder extends Seeder
{
    public function run()
    {
        // Crea un tipo de usuario por defecto
        TipoUsuario::create([
            'nombre' => 'Administrador',
        ]);
    }
}
