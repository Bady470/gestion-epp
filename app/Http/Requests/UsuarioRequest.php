<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsuarioRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        $usuarioId = $this->route('usuario') ?? $this->route('id') ?? null;

        $passwordRule = $this->isMethod('post') ? 'required|string|min:6|confirmed' : 'sometimes|nullable|string|min:6|confirmed';

        return [
            'nombre_completo' => $this->isMethod('post') ? 'required|string|max:255' : 'sometimes|required|string|max:255',
            'email' => [
                $this->isMethod('post') ? 'required' : 'sometimes',
                'email',
                Rule::unique('usuarios','email')->ignore($usuarioId),
            ],
            'password' => $passwordRule,
            'roles_id' => 'sometimes|nullable|exists:roles,id',
            'programas_id' => 'sometimes|nullable|exists:programas,id',
            'categorias_id' => 'sometimes|nullable|exists:areas,id',
        ];
    }
}
