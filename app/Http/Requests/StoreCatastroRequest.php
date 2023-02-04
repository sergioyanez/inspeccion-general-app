<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCatastroRequest extends FormRequest
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
            'circunscripcion'=>'required|string|max:10',
             'seccion'=>'required|string|max:10',
             'chacra'=>'required|string|max:10',
             'quinta'=>'required|string|max:10',
             'fraccion'=>'required|string|max:10',
             'manzana'=>'required|string|max:10',
             'parcela'=>'required|string|max:10',
             'sub_parcela'=>'required|string|max:10',
            //  'observacion'=>'required|string|max:10',
            //  'fecha_informe'=>'required',
            //  'pdf_informe'=>'required|string|max:255',
        ];
    }
}
