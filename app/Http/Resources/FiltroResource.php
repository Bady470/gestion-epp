<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FiltroResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'parte_del_cuerpo'=>$this->parte_del_cuerpo,
            'meta'=>$this->meta ? json_decode($this->meta, true) : null,
        ];
    }
}
