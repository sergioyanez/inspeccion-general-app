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
            'cuit'=>'required|string',
            'nombre_representante'=>'required|string|max:50',
            'apellido_representante'=>'required|string|max:50',
            'dni_representante'=>'string|max:10|nullable',
            'telefono'=>'required|string',
        ];
    }

    public function messages() {
        return [
            'cuit.required' => 'el campo cuit no puede estar vacio',
            //'cuit.numeric' => 'el campo cuit solo acepta nùmeros',
            'nombre_representante.required' => 'el campo nombre del representante no puede estar vacio',
            'nombre_representante.max' => 'el campo nombre del representante acepta solo 50 caracteres',
            'apellido_representante.required' => 'el campo apellido del representante no puede estar vacio', 
            'apellido_representante.max' => 'el campo apellido del representante acepta solo 50 caracteres',
            'dni_representante.max' => 'el campo dni del representante acepta solo 10 caracteres',
            'telefono.required' => 'el campo telefono no puede estar vacio',
            //'telefono.numeric' => 'el campo telefono solo acepta nùmeros',
        ];
    }
}