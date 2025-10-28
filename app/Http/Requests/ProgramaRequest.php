<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgramaRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'nombre' => $this->isMethod('post') ? 'required|string|max:150' : 'sometimes|required|string|max:150',
            'categorias_id' => 'sometimes|nullable|exists:areas,id',
        ];
    }
}
