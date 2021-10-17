<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = User::create([
            'nombre' => 'Administrador',
            'descripcion' => 'usuario administrativo con acceso total al sistema',
        ]);
    }
}
