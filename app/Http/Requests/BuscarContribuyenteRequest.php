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
            'buscarpor' => 'required|min:8|max:8',
           
        ];
    }

    public function messages() {
        return [
            'buscarpor.required' => 'tenda algo',
            'buscarpor.min' => 'el campo número de documento debe tener 8 dígitos',
            'buscarpor.max' => 'el campo número de documento debe tener 8 dígitos',
           
        ];
    }
}