<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'produtobo' => 'required',
            'nometec' => 'required',
            'st' => 'required',
            'resparea_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            
            'produtobo.required' => 'O campo PRODUTO é de preenchimento obrigatório!', 
            'nometec.required' => 'O campo COMERCIAL é de preenchimento obrigatório!', 
            'st.required' => 'O campo Situação é de preenchimento obrigatório!',
            'resparea_id.required' => 'Necessário Informar uma Área Responsavel'
        ];
    }
}