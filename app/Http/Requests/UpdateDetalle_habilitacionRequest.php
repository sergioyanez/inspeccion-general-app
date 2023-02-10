<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDetalle_habilitacionRequest extends FormRequest
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
            'tipo_habilitacion_id'=>'required',
            'tipo_estado_id'=>'required',
            'fecha_vencimiento'=>'required',
            'fecha_primer_habilitacion'=>'required',
            'pdf_certificado_habilitacion'=>'required',
        ];
    }
}