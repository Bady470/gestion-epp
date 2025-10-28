<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ElementoPPResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'nombre'=>$this->nombre,
            'descripcion'=>$this->descripcion,
            'icono'=>$this->icono,
            'cantidad'=>$this->cantidad,
            'categorias_id'=>$this->categorias_id,
            'filtros_id'=>$this->filtros_id,
        ];
    }
}
