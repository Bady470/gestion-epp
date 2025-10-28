<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FichaRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'numero' => $this->isMethod('post') ? 'required|string|max:100' : 'sometimes|required|string|max:100',
            'programas_id' => 'sometimes|nullable|exists:programas,id',
        ];
    }
}
