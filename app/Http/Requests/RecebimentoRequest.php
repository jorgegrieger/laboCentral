<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecebimentoRequest extends FormRequest
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
            'produto_id' =>'required',
             'nfe' => 'required',
             'fornecedor_id' => 'required',

        ];
    }

    public function messages()
    {
        return [
            
            'produto_id.required' => 'O campo NOME TÉCNICO é de preenchimento obrigatório!', 
            'nfe.required' => 'O campo NFE é de preenchimento obrigatório!', 
            'fornecedor_id.required' => 'O campo FORNECEDOR é de preenchimento obrigatório!'
           
        ];
    }
}
