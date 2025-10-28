<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ElementoXPedidoRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'pedidos_id' => $this->isMethod('post') ? 'required|exists:pedidos,id' : 'sometimes|exists:pedidos,id',
            'elementos_pp_id' => $this->isMethod('post') ? 'required|exists:elementos_pp,id' : 'sometimes|exists:elementos_pp,id',
            'cantidad' => 'sometimes|required|integer|min:1',
            'precio_unitario' => 'sometimes|nullable|numeric',
        ];
    }
}
