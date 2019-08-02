<?php

namespace estoque\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosRequest extends FormRequest
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
            'nome' => 'required|max:25',
            'descricao' => 'required|max:100',
            'valor' => 'required|numeric',
            'quantidade' => 'required|numeric|min: 0'
        ];
    }

    public function messages(){
        return [
            'nome.required' => 'The :attribute field can not be empty' //utiliza-se :attibute para pegar o nome do campo que é necessário preencher.
        ];
    }
}
