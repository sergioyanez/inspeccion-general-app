<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContribuyenteRequest extends FormRequest
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
            'cuit'=>'required|string|max:11',
            'ingresos_brutos'=>'required|string|max:11',
            'nombre'=>'required|string|max:20',
            'apellido'=>'required|string|max:20',
            'dni'=>'required|string|max:8',
            'fecha_nacimiento'=>'required|date',
            // 'telefono'=>'string|max:20', No va  porque sino lo toma como required aunque no se lo ponga
            // 'nombre_conyuge'=>'string|max:20',
            // 'apellido_conyuge'=>'string|max:20',
            // 'dni_conyuge'=>'string|max:8',
        ];
    }
}
