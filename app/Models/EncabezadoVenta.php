<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncabezadoVenta extends Model
{
    use HasFactory;

    protected $table = "encabezado_venta";

    protected $fillable = [
        'id_empleado',
        'id_usuario',
        'numero_caja',
        'deposito',
        'devolucion',
        'total',
        'descuento',
        'es_enlinea',
        'id_estado_venta'
    ];
}
