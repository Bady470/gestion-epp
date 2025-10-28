<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        $id = $this->route('role') ?? null;
        return [
            'nombre' => [
                $this->isMethod('post') ? 'required' : 'sometimes|required',
                'string','max:45',
                Rule::unique('roles','nombre')->ignore($id),
            ],
        ];
    }
}
