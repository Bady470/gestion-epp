<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ElementoPPRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'nombre' => $this->isMethod('post') ? 'required|string|max:150' : 'sometimes|required|string|max:150',
            'descripcion' => 'sometimes|nullable|string',
            'icono' => 'sometimes|nullable|string|max:100',
            'cantidad' => 'sometimes|nullable|integer',
            'categorias_id' => 'sometimes|nullable|exists:fichas,id',
            'filtros_id' => 'sometimes|nullable|exists:filtros,id',
        ];
    }
}
