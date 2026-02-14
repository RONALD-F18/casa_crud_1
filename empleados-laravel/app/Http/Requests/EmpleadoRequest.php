<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
{
    
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
        $isUpdate = $this->isMethod('put') || $this->isMethod('patch');

        return [
            'nombre' => $isUpdate ? 'sometimes|string|max:255' : 'required|string|max:255',
            'apellido' => $isUpdate ? 'sometimes|string|max:255' : 'required|string|max:255',
            'email' => $isUpdate ? 'sometimes|email|unique:empleados,email,' . $this->route('empleado')->id : 'required|email|unique:empleados',
            'telefono' => $isUpdate ? 'sometimes|string|max:20' : 'nullable|string|max:20'
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido.required' => 'El apellido es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'telefono.string' => 'El teléfono debe ser una cadena de texto.',
            'telefono.max' => 'El teléfono no puede tener más de 20 caracteres.'
        ];
    }
}
