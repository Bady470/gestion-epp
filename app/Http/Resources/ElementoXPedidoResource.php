<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ElementoXPedidoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'pedidos_id'=>$this->pedidos_id,
            'elementos_pp_id'=>$this->elementos_pp_id,
            'cantidad'=>$this->cantidad,
            'precio_unitario'=>$this->precio_unitario,
        ];
    }
}
