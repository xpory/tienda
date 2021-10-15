<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoPedido extends Model
{
    use HasFactory;

    protected $table = "estado_pedido";

    protected $fillable = [
        'nombre',
        'descripcion'
    ];

}
