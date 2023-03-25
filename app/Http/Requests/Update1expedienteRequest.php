<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Update1expedienteRequest extends FormRequest
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
            'circunscripcion'=>'required|string|max:10',
            'seccion'=>'required|string|max:10',
            // 'chacra'=>'nullable|string|max:10',
            // 'quinta'=>'nullable|string|max:10',
            // 'fraccion'=>'nullable|string|max:10',
            // 'manzana'=>'nullable|string|max:10',
            // 'parcela'=>'nullable|string|max:10',
            // 'sub_parcela'=>'nullable|string|max:10',
            // 'observacion'=>'nullable|string|max:10',
            // 'fecha_informe'=>'nullable',
            // 'pdf_informe'=>'nullable|string|max:255',
        ];
    }

    public function messages() {
        return [
            'circunscripcion.required' => 'el campo circunscripciòn no puede estar vacio',
            //'nro_expediente.unique' => 'no se permiten nùmeros de expedientes repetidos',
            'seccion.required' => 'el campo seccion no puede estar vacio',
        ];
    }
}