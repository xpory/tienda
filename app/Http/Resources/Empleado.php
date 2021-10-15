<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Empleado extends JsonResource
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
            'id_usuario' => $this->id_usuario,
            'sueldo' => $this->sueldo,
            'precio_hora_nocturna' => $this->precio_hora_nocturna,
            'precio_hora_extra' => $this->precio_hora_extra,
            'isss' => $this->isss,
            'afp_confia' => $this->afp_confia,
            'afp_crecer' => $this->afp_crecer,
            'renta' => $this->renta,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y')
        ];
    }
}
