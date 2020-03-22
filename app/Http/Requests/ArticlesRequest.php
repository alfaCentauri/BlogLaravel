<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * Clase ArticlesRequest permite definir las reglas de validación de los campos del formulario crear articulos y
 * personalizar los mensajes de error.
 *
 * @author Ingeniero en Computación Ricardo Presilla <ricardopresilla@gmail.com>
 *
 * @version 1.0.
 */
class ArticlesRequest extends FormRequest
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
            'title' => 'min:8|max:250|required|unique:articles',
            'category_id' => 'required',
            'texto' => 'min:50|required',
            'imagen' => 'image|required',
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
            'title.required' => 'El título es requerido',
            'title.min' => 'El mínimo para el título es de 8 caracteres.',
            'title.max' => 'El máximo para el título es de 250 caracteres.',
            'category_id.required' => 'La categoria es requerida',
            'texto.min' => 'El mínimo para el contenido es de 50 caracteres.',
            'texto.required' => 'El contenido es requerido',
            'imagen.image' => 'El archivo debe ser una imagen',
            'imagen.required' => 'El archivo de la imagen es requerida',
        ];
    }
}
