<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'fecha' => 'sometimes|nullable|date',
            'usuarios_id' => $this->isMethod('post') ? 'required|exists:usuarios,id' : 'sometimes|exists:usuarios,id',
            'fichas_id' => 'sometimes|nullable|exists:fichas,id',
            'status' => 'sometimes|nullable|string|max:100',
            'comentario' => 'sometimes|nullable|string',
            'items' => 'sometimes|array',
            'items.*.elementos_pp_id' => 'required_with:items|exists:elementos_pp,id',
            'items.*.cantidad' => 'required_with:items|integer|min:1',
            'items.*.precio_unitario' => 'sometimes|nullable|numeric',
        ];
    }
}
