<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FichaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'numero'=>$this->numero,
            'programas_id'=>$this->programas_id,
        ];
    }
}
