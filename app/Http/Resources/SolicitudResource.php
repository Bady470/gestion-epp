<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SolicitudResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'descripcion'=>$this->descripcion,
        ];
    }
}
