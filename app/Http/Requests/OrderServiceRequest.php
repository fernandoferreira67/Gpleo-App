<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrderServiceRequest extends FormRequest
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
        //dd(request()->all());
        return [
            'customer_id' => 'required|not_in:0',
            'description' => 'required|min:10' 
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
            'not_in'   => 'Seleção Invalida'
        ];
      

    }

    
}
