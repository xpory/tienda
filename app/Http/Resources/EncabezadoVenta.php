<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EncabezadoVenta extends JsonResource
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
            'id_empleado' => $this->id_empleado,
            'id_usuario' => $this->id_usuario,
            'numero_caja' => $this->numero_caja,
            'deposito' => $this->deposito,
            'devolucion' => $this->devolucion,
            'total' => $this->total,
            'descuento' => $this->descuento,
            'es_enlinea' => $this->es_enlinea,
            'id_estado_venta' => $this->id_estado_venta,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y')
        ];
    }
}
