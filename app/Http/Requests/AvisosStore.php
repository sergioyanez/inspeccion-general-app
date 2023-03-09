<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvisosStore extends FormRequest
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
            'fecha_aviso' => 'required|date',
            'expediente_id' => 'required|exists:expedientes,id',
            'nro_expediente' => 'required',
            'tipo_comunicacion' => 'required|string',
            'detalle' => 'nullable|string',
            'pdf_file' => 'nullable',
        ];
    }
}
