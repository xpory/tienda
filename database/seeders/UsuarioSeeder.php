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
            'nombre' => 'Jerry',
            'apellido' => 'Melgar',
            'direccion' => 'direccion administrativa',
            'telefono' => '7213-8322',
            'dui' => '1234567-8',
            'email' => 'jerry_melgar@hotmail.com',
            'password' => bcrypt('admin123456'),
            'imagen' => 'public/images/usuario.jpg',
            'id_tipo_usuario' => 1,
        ]);
        $usuario->save();
    }
}
