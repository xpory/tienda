<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidosProveedor extends Model
{
    use HasFactory;

    protected $table = "pedidos_proveedor";

    protected $fillable = [
        'id_proveedor',
        'id_detalle_pedido_proveedor',
        'fecha_solicitud',
        'id_estado_pedido',
        'total'
    ];
}
