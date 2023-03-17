<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Update2expedienteRequest extends FormRequest
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
            //'certificado_nuevo' => 'required',
        ];
    }

    public function messages() {
        return [
            //'certificado_nuevo.required' => 'debe cargar un certificado',
        ];
    }
}