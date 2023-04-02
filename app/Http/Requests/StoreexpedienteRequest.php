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
            // |unique:expedientes no lo puedo hacer andar
            'nro_expediente1' => 'required|numeric',
            //'nro_expediente . nro_expediente1 . nro_expediente2' => 'unique:expedientes',
            'nro_comercio1' => 'required|numeric',
            'nro_comercio2' => 'required|numeric',
            'actividad_ppal' => 'required|alpha',
            'calle' => 'required|string',
            'numero' => 'numeric|nullable',
            'tipo_inmueble_id' => 'required',
            'pdf_solicitud' => 'required', 
        ];
    }

    public function messages() {
        return [
            'nro_expediente1.required' => 'El campo número de expediente no puede estar vacio.',
            //'nro_expediente1.unique' => 'no se permiten nùmeros de expedientes repetidos',
            'nro_expediente1.numeric' => 'El campo numero de expediente no acepta letras.',
            'nro_comercio1.required' => 'El campo número de comercio no puede estar vacio.',
            'nro_comercio1.numeric' => 'El campo número de comercio no acepta letras.',
            'nro_comercio2.required' => 'El campo número de comercio no puede estar vacio.',
            'nro_comercio2.numeric' => 'El campo número de comercio no acepta letras.',
            'actividad_ppal.required' => 'El campo actividad principal es obligatorio.',
            'actividad_ppal.alpha' => 'El campo actividad principal solo acepta letras.',
            //'anexo.numeric' => 'El campo anexo no acepta letras',
            'calle.required' => 'El campo calle es obligatorio.',
            'numero.numeric' => 'El campo nùmero no acepta letras.',
            'tipo_inmueble_id.required' => 'Debe seleccionar un tipo de inmueble.',
            'pdf_solicitud.required' => 'Debe cargar una solicitud.'
            
        ];
    }
}
