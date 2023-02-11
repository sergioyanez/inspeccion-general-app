<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEstado_bajaRequest extends FormRequest
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
            'tipo_baja_id'=>'required',
            'deuda'=>'required',
            'fecha_baja'=>'required',
            'pdf_acta_solicitud_baja'=>'required|string|max:255',
            'pdf_informe_deuda'=>'required|string|max:255',
            'pdf_solicitud_baja'=>'required|string|max:255',
        ];
    }
}