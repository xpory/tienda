<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedidoProveedor extends Model
{
    use HasFactory;

    protected $table = "detalle_pedido_proveedor";

    protected $fillable = [
        'id_articulo',
        'precio_unitario',
        'cantidad',
        'subtotal'
    ];
}
