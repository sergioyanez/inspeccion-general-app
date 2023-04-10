<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateexpedienteRequest extends FormRequest
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
            //'nro_expediente1' => 'required',
            //'nro_comercio1' => 'required',
            'actividad_ppal' => 'required|string',
            //'anexo' => 'numeric|nullable',
            'calle' => 'required|string',
            'numero' => 'numeric|nullable',
            'tipo_inmueble_id' => 'required',
            'cargo' => 'required',
            //'cargo1' => 'required',
            
        ];
    }

    public function messages() {
        return [
            'nro_expediente1.required' => 'el campo número de expediente no puede estar vacío',
            //'nro_expediente.unique' => 'no se permiten nùmeros de expedientes repetidos',
            'nro_comercio1.required' => 'el campo número de comercio no puede estar vacío',
            //'nro_comercio.unique' => 'no se permiten nùmeros de comercio repetidos',
            'actividad_ppal.required' => 'El campo actividad principal es obligatorio',
            'actividad_ppal.alpha' => 'El campo actividad principal solo acepta letras',
            //'anexo.numeric' => 'El campo anexo no acepta letras',
            'calle.required' => 'El campo calle es obligatorio',
            'numero.numeric' => 'El campo nùmero no acepta letras',
            'tipo_inmueble_id.required' => 'debe seleccionar un tipo de inmueble',
            'cargo.required' => 'debe cargar un contribuyente o persona jurìdica',
            //'cargo1.required' => 'debe cargar una persona jurìdica',
            //'cargoContribuyente.required' => 'ya cargo ese contribuyente'
        ];
    }
}
