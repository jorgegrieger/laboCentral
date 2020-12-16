<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnaliseRequest extends FormRequest
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
            
            'fds' => 'required',
            'tplaudo' => 'required',
            'laudo' => 'required',
            'sto' => 'required',
            'analista_id' => 'required',
            
        ];
    }

    public function messages()
    {

        return [

            'fds.required' => 'O campo RECEBIDO EM FINAL DE SEMANA é de preenchimento obrigatório!', 
            'tplaudo.required' => 'O campo TIPO DE LIBERAÇÃO é de preenchimento obrigatório!', 
            'laudo.required' => 'O campo LAUDO é de preenchimento obrigatório!', 
            'sto.required' => 'O campo SITUAÇÃO é de preenchimento obrigatório!', 
            'analista_id.required' => 'O campo RECEBIDO POR é de preenchimento obrigatório!'

        ];

    }
}
