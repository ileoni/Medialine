<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreAndUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'image' => 'mimes:png,jpeg',
            'price' => 'required|regex:/^[\d]{1,6}[.][\d]{2}$/i',
            'amount' => 'required|numeric',
        ];
    } 

    public function messages()
    {
        return [
            'required' => 'O campo :Attribute é obrigatório.',
            'numeric' => 'A :Attribute deve ser um número.',
            'price.regex' => 'A :Attribute inválido, :attribute deve ter somente numeros',
            'image.mimes' => 'A :Attribute deve ser do tipo: :values',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'description' => 'descrição',
            'price' => 'preço',
            'amount' => 'quantidade',
        ];
    }
}