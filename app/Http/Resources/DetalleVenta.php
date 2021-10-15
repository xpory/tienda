<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetalleVenta extends JsonResource
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
            'id_articulo' => $this->id_articulo,
            'cantidad' => $this->cantidad,
            'subtotal' => $this->subtotal,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y')
        ];
    }
}
