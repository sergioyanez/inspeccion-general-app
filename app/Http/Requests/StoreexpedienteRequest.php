<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreexpedienteRequest extends FormRequest
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
            'nro_expediente' => 'required|unique:expedientes',
            'nro_comercio' => 'required|unique:expedientes',
            'actividad_ppal' => 'required|alpha',
            'anexo' => 'numeric',

            'numero' => 'numeric',

            // 'cuit'=>'required|string|max:11',
            // 'ingresos_brutos'=>'required|string|max:11',
            // 'nombre'=>'required|string|max:20',
            // 'apellido'=>'required|string|max:20',
            // 'dni'=>'required|string|max:8',
            // 'fecha_nacimiento'=>'required|date',
        ];
    }

    public function messages() {
        return [
            'numero.numeric' => 'El campo nùmero no acepta letras',
            'nro_expediente.required' => 'el campo nùmero de expediente no puede estar vacio',
            'nro_expediente.unique' => 'no se permiten nùmeros de expedientes repetidos',
            'nro_comercio.required' => 'el campo nùmero de comercio no puede estar vacio',
            'nro_comercio.unique' => 'no se permiten nùmeros de comercio repetidos',
            'anexo.numeric' => 'El campo anexo no acepta letras',
            'actividad_ppal.required' => 'El campo actividad principal es obligatorio',
            'actividad_ppal.alpha' => 'El campo actividad principal solo acepta letras',
        ];
    }
}
