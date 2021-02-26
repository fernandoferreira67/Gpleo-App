<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
        //dd(request()->get('cpf'));
        
        return [
            'fullname' => 'required',
            'rg' => 'required',
            'cpf'      => [
                'required',
                Rule::unique('customers')->ignore(request()->get('id'))

            ],
            'address' => 'required',
            'district' => 'required',
            'cep' => 'required',
            'city' => 'required',
            'description' => 'max:255' 
        ];
    }

    public function messages()
    {
        /**
         * :validação => Return Numero Validação
         * :attribute => Return Nome do Campo
         */
        return [
            'required' => 'Campo requerido',
            'min'      => 'Campo deve ter no mínimo :min caracteres',
            'unique'   => 'Já existe este :attribute',
            'max'      => 'Campo máximo de :max caracteres' 
        ];

    }
}
