<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuscarContribuyenteRequest extends FormRequest
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
       //    'buscarpor' => 'required|min:8|max:8',
            'buscarpor' => ['required','min:7','max:8']
        ];
    }

    public function messages() {
        return [
            'buscarpor.required' => 'este campo debe estar completo.',
            'buscarpor.min' => 'el campo número de documento debe tener 7 dígitos como minimo.',
            'buscarpor.max' => 'el campo número de documento debe tener 8 dígitos como máximo.'

        ];
    }
}
