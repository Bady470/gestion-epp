<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitudRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'descripcion' => $this->isMethod('post') ? 'required|string' : 'sometimes|required|string',
            // 'user_id' => 'sometimes|nullable|exists:usuarios,id' // agregar si aplica
        ];
    }
}
