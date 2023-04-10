<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContribuyenteRequest extends FormRequest
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
            'cuit'=>'required|string|max:11',
            'ingresos_brutos'=>'required|string|max:11',
            'nombre'=>'required|string|max:20',
            'apellido'=>'required|string|max:20',
            'dni'=>'required|string|max:8',
            'fecha_nacimiento'=>'required|date',
            'telefono'=>'string|nullable|max:20', 
         //   'nombre_conyuge'=>'string|nullable|max:20',
          //  'apellido_conyuge'=>'string|nullable|max:20',
          //  'dni_conyuge'=>'string|nullable|max:8',
        ];
    }

    public function messages() {
        return [
            'cuit.required' => 'El campo cuit no puede estar vacio',
            'cuit.max' => 'El campo cuit tiene un maximo de 11 caracteres',
            'ingresos_brutos.required' => 'El campo ingresos brutos no puede estar vacio',
            'ingresos_brutos.max' => 'El campo ingresos brutos tiene un maximo de 11 caracteres',
            'nombre.required' => 'El campo nombre no puede estar vacio',
            'nombre.max' => 'El campo nombre tiene un maximo de 20 caracteres',
            'apellido.required' => 'El campo apellido no puede estar vacio',
            'apellido.max' => 'El campo apellido tiene un maximo de 20 caracteres',
            'dni.required' => 'El campo dni no puede estar vacio',
            'dni.max' => 'El campo cuit tiene un maximo de 8 caracteres',
            'fecha_nacimiento.required' => 'El campo fecha de nacimiento no puede estar vacio',
        ];
    }
}