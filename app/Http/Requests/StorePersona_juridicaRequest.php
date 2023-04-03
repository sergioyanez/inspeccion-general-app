<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersona_juridicaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cuit'=>'required|string|unique:personas_juridicas',
            // 'nombre_representante'=>'string|max:50',
            // 'apellido_representante'=>'string|max:50',
            // 'dni_representante'=>'string|max:10|nullable',
            // 'telefono'=>'string',
        ];
    }

    public function messages() {
        return [
            'cuit.required' => 'El campo cuit no puede estar vacio.',
            //'cuit.numeric' => 'el campo cuit solo acepta nùmeros',
            'nombre_representante.required' => 'El campo nombre del representante no puede estar vacio.',
            'nombre_representante.max' => 'El campo nombre del representante acepta solo 50 caracteres.',
            'apellido_representante.required' => 'El campo apellido del representante no puede estar vacio.', 
            'apellido_representante.max' => 'El campo apellido del representante acepta solo 50 caracteres.',
            'dni_representante.max' => 'El campo dni del representante acepta solo 10 caracteres.',
            'telefono.required' => 'El campo telefono no puede estar vacio.',
            'cuit.unique' => 'La persona jurídica ya se encuentra cargada.',
            //'telefono.numeric' => 'el campo telefono solo acepta nùmeros',
        ];
    }
}