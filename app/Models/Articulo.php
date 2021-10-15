<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = "articulo";

    protected $fillable = [
        'id_categoria',
        'codigo',
        'nombre',
        'id_proveedor',
        'precio_venta',
        'stock',
        'descripcion',
        'imagen',
        'estado'
    ];
}
