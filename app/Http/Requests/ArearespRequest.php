<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArearespRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'nome' => 'required',
        ];
    }

    public function messages()
    {
        return [
            
            'nome.required' => 'O campo NOME é de preenchimento obrigatório!', 

        ];
    }
}
