<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PedidosProveedor extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_proveedor' => $this->id_proveedor,
            'id_detalle_pedido_proveedor' => $this->id_detalle_pedido_proveedor,
            'fecha_solicitud' => $this->fecha_solicitud->format('d/m/Y'),
            'id_estado_pedido' => $this->id_estado_pedido,
            'total' => $this->total,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y')
        ];
    }
}
