<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRegisterRequest extends FormRequest
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
            'email' => 'required|unique:clients|email|max:200',
            'password' => 'required|max:255',
            'fantasy_name' => 'required|max:255',
            'neighborhood' => 'required|max:150',
            'street' => 'required|max:150',
            'number' => 'required',
            'address_extra' => 'max:150',
            'phone_1' => 'required|max:50',
            'phone_2' => 'max:50',
            'state' => 'required',
            'city' => 'required',
            'categories_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Informe o seu email',
            'email.unique' => 'Email Já cadastrado',
            'email.email' => 'Informe um email válido',
            'email.max' => 'Limite de caracteres excedido',
            'password.required'  => 'Informe a sua senha',
            'password.max'  => 'Limite de caracteres excedido',
            'fantasy_name.required'  => 'Informe o seu nome fantasia',
            'fantasy_name.max'  => 'Limite de caracteres excedido',
            'neighborhood.required'  => 'Informe o seu bairro',
            'neighborhood.max'  => 'Limite de caracteres excedido',
            'street.required'  => 'Informe a sua rua',
            'street.max'  => 'Limite de caracteres excedido',
            'number.required'  => 'Informe o seu número',
            'adress_extra.max'  => 'Limite de caracteres excedido',
            'phone_1.required'  => 'Informe o seu telefone principal',
            'phone_1.max'  => 'Limite de caracteres excedido',
            'phone_2.max'  => 'Limite de caracteres excedido',
            'state.required'  => 'Informe o seu estado',
            'city.required'  => 'Informe a sua cidade',
            'categories_id.required' => 'Informe a categoria do seu estabelecimento'
        ];
    }

}
