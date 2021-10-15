<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Proveedor extends JsonResource
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
            'codigo' => $this->codigo,
            'nombre' => $this->nombre,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'correo' => $this->correo,
            'estado' => $this->estado,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y')
        ];
    }
}
