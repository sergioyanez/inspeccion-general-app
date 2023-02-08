<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersona_juridicaRequest extends FormRequest
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
            'cuit'=>'required|integer',
            'nombre_representante'=>'required|string|max:50',
            'apellido_representante'=>'required|string|max:50',
            'dni_representante'=>'required|string|max:10',
            'telefono'=>'required|integer',
        ];
    }
}