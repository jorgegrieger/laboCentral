<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnalistaRequest extends FormRequest
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
            'nome' => 'required',
            'st' => 'required',
        ];
    }

    public function messages()
    {
        return [
            
            'nome.required' => 'O campo NOME é de preenchimento obrigatório!', 
            'st.required' => 'O campo Status é de preenchimento obrigatório!'

        ];
    }
}
