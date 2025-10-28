<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FiltroRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'parte_del_cuerpo' => $this->isMethod('post') ? 'required|string|max:150' : 'sometimes|required|string|max:150',
            'meta' => 'sometimes|nullable|array',
        ];
    }
}
