<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAdminStoreAndUpdateRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|min:8|regex:/^(?=.*\w)(?=.*\d)(?=.*[@._-])[\w\d@._-]*$/i',
            'type' => 'required|in:admin,user',
            'state' => 'required',
            'city' => 'required',
            'street' => 'required',
            'number' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'A :Attribute deve ter ao menos uma letra, numero ou simbolo - @._-',
            'email.unique' => 'O :Attribute já está em uso.',
            'required' => 'O :Attribute não foi preenchido.',
            'numeric' => 'O :Attribute deve ter apenas números.',
            'email' => 'O :Attribute deve ser um endereço válido.',
            'min' => 'A :Attribute deve ter pelo menos :min caracteres',
            'in' => 'O :Attribute selecionado é inválido.'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'password' => 'senha',
            'type' => 'tipo',
            'state' => 'estado',
            'city' => 'cidade',
            'street' => 'rua',
            'number' => 'numero',
        ];
    }
}
