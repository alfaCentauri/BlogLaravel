<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * Clase CategoriesRequest permite definir las reglas de validación de los campos del formulario crear categoria y
 * personalizar los mensajes de error.
 *
 * @author Ingeniero en Computación Ricardo Presilla <ricardopresilla@gmail.com>
 *
 * @version 1.0.
 */
class CategoriesRequest extends FormRequest
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
        ];
    }
}
