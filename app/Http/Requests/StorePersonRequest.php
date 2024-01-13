<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|unique:people',
            'province_id' => 'required|integer',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'firstname.required' => 'El nombre es requerido',
            'firstname.max' => 'No debe contener mas de 255 caracteres',
            'lastname.required' => 'El apellido es requerido',
            'lastname.max' => 'No debe contener mas de 255 caracteres',
            'email.required' => 'El correo es requerido',
            'email.unique' => 'El correo ya esta registrado en la base',
            'province_id.required' => 'La indentificación de la provincia es requerida',
            'province_id.integer' => 'El valor debe ser un número entero',
        ];
    }
}
