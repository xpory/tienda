<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Articulo extends JsonResource
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
            'id_categoria' => $this->id_categoria,
            'codigo' => $this->codigo,
            'nombre' => $this->nombre,
            'id_proveedor' => $this->id_proveedor,
            'precio_venta' => $this->precio_venta,
            'stock' => $this->stock,
            'descripcion' => $this->descripcion,
            'imagen' => $this->imagen,
            'estado' => $this->estado,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y')
        ];
    }
}
