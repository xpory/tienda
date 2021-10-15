<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = "empleado";

    protected $fillable = [
        'id_usuario',
        'sueldo',
        'precio_hora_nocturna',
        'precio_hora_extra',
        'isss',
        'afp_confia',
        'afp_crecer',
        'renta',
    ];
}
