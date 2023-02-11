<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Storeinforme_dependenciasRequest extends FormRequest
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
            'tipo_dependencia_id'=>'required',
            'pdf_informe'=>'required|string|max:255',
            'fecha_informe'=>'required',
            'observaciones'=>'required|string|max:255',
        ];
    }
}