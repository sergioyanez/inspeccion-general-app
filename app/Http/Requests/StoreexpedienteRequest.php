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
            // 'nro_expediente1' => 'required|unique:expedientes',
            // 'nro_comercio1' => 'required',
            // 'nro_comercio2' => 'required',
            'actividad_ppal' => 'required|alpha',
            //'anexo' => 'numeric|nullable',
            'calle' => 'required|string',
            'numero' => 'numeric|nullable',
            'tipo_inmueble_id' => 'required',
            'pdf_solicitud' => 'required', 
        ];
    }

    public function messages() {
        return [
            'nro_expediente1.required' => 'el campo nùmero de expediente no puede estar vacio',
            'nro_expediente1.unique' => 'no se permiten nùmeros de expedientes repetidos',
            'nro_comercio1.required' => 'el campo nùmero de comercio no puede estar vacio',
            'nro_comercio2.required' => 'el campo nùmero de comercio no puede estar vacio',
            'actividad_ppal.required' => 'El campo actividad principal es obligatorio',
            'actividad_ppal.alpha' => 'El campo actividad principal solo acepta letras',
            //'anexo.numeric' => 'El campo anexo no acepta letras',
            'calle.required' => 'El campo calle es obligatorio',
            'numero.numeric' => 'El campo nùmero no acepta letras',
            'tipo_inmueble_id.required' => 'debe seleccionar un tipo de inmueble',
            'pdf_solicitud.required' => 'debe cargar una solicitud'
            
        ];
    }
}
