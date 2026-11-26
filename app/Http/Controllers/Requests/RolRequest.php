<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestRol extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH');
        $roleId = $this->route('Rol') ?? $this->route('id');

        return [
            'nombre' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:100',
                Rule::unique('roles', 'nombre')->ignore($roleId, 'id')
            ],
            'description' => [
                'nullable',
                'string',
                'max:200'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede exceder los 100 caracteres.',
            'nombre.unique' => 'Este nombre de rol ya esta registrado.',

            'description.string' => 'La description debe ser texto.',
            'description.max' => 'La description no puede exceder los 200 caracteres.'
        ];
    }
}
