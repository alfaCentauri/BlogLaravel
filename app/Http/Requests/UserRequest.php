<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'min:4|max:120|required',
            'email' => 'min:4|max:255|required|unique:users',
            'password' => 'min:4|max:120|required',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El mínimo para el nombre es de 4 caracteres.',
            'name.max' => 'El máximo para el nombre es de 120 caracteres.',
            'email.required'  => 'El correo es requerido',
            'email.min' => 'El mínimo para el correo es de 4 caracteres.',
            'email.max' => 'El máximo para el correo es de 255 caracteres.',
            'password.required' => 'La clave es requerida',
            'password.min' => 'El mínimo para la clave es de 4 caracteres.',
            'password.max' => 'El máximo para la clave es de 120 caracteres.',
        ];
    }
}
