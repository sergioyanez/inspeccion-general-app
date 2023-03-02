<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
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
            'usuario' => 'required|unique:users,usuario',
            'tipo_permiso_id' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'repetirPassword' => 'required|same:password',
        ];
    }
}
