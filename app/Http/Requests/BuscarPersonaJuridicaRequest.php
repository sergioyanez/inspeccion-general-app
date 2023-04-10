<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuscarPersonaJuridicaRequest extends FormRequest
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
            'buscarpor1' => ['required','min:7','max:11'],
        ];
    }

    public function messages() {
        return [
            'buscarpor1.required' => 'Este campo debe estar completo',
            'buscarpor1.min' => 'El campo número de documento debe tener 8 dígitos',
            'buscarpor1.max' => 'El campo número de documento debe tener 11 dígitos',
        ];
    }
}
