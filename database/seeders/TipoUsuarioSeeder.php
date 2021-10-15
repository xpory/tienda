<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoUsuario;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoUsuario = TipoUsuario::create([
            'nombre' => 'Administrador',
            'descripcion' => 'usuario administrativo con acceso total al sistema',
        ]);
        $tipoUsuario->save();
        $tipoUsuario = TipoUsuario::create([
            'nombre' => 'Moderador',
            'descripcion' => 'Personal con acceso moderado al sistema',
        ]);
        $tipoUsuario->save();
        $tipoUsuario = TipoUsuario::create([
            'nombre' => 'Cliente',
            'descripcion' => 'Usuario de tipo cliente por default',
        ]);
        $tipoUsuario->save();

    }
}
