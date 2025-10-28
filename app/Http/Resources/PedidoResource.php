<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PedidoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'fecha'=>$this->fecha,
            'usuarios_id'=>$this->usuarios_id,
            'fichas_id'=>$this->fichas_id,
            'status'=>$this->status,
            'comentario'=>$this->comentario,
            'elementos' => ElementoXPedidoResource::collection($this->whenLoaded('elementos')),
            'created_at' => $this->created_at?->toDateTimeString(),
        ];
    }
}
