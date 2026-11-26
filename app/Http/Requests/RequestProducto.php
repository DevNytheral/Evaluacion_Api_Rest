<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RequestProducto extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'codigo' => [
                $isUpdate ? 'sometimes' : 'required',
                'string',
                'max:50',
             ],
             'estado'=> [
                $isUpdate ?  'sometimes' : 'required',
                'boolean',
                Rule::in('activo', 'inactivo'), 
                
             ],
             'descripcion' => [
               'nullable',
               'string',
               'min:10',
               
             ],
             'precio' => [
               $isUpdate ? 'sometimes' : 'required',
               'decimal',
               'min:100',
               
             ],
             'stock' => [
                $isUpdate ? 'sometimes' : 'required',
                'int',
                'default:0'
             ],
             'estado'=>[
               $isUpdate ? 'sometimes' : 'required',
               'boolean',
               'default:true',

             ]
            //
        ];
    }

    
    public function messages(): array
    {
        return [
            'codigo.required' => 'El codigo del producto es obligatorio.',
            'codigo.string' => 'El codigo del producto debe estar en formato valido.',
            'codigo.max' => 'El codigo del producto no puede tener mas de 50 caracteres.',
            'estado.required' => 'El estado del producto es obligatorio.',
            'estado.in' => 'El estado del producto debe ser activo o inactivo.',
            'descripcion.required' => 'El precio del producto es obligatorio.',
            'precio.decimal' => 'El precio debe ser un valor numérico en decimal.',
            'precio.min' => 'El precio no puede ser negativo.',
            'precio.required' => 'El precio es obligatorio.',
            'stock.required' => 'El stock del producto es obligatorio',
            'stock.int' => 'El stock del producto solo puede ser un numero',
            'stock.default' => 'El stock del producto solo tener tene el default en 0',
            'estado.required' => 'el estado del producto es obligatorio',
            'estado.boolean' => 'el estado del producto es obligatorio',
            'estado.default' => 'el estado por defecto del producto solo puede ser true'


        ];
}

}