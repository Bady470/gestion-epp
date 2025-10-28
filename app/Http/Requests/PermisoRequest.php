<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PermisoRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        $id = $this->route('permiso') ?? null;
        return [
            'nombre' => [
                $this->isMethod('post') ? 'required' : 'sometimes|required',
                'string','max:45',
                Rule::unique('permisos','nombre')->ignore($id),
            ],
            'descripcion' => 'sometimes|nullable|string',
        ];
    }
}
