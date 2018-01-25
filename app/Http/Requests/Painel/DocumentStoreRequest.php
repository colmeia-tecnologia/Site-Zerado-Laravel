<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class DocumentStoreRequest extends FormRequest
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
            'title' => 'required|max:100',
            'description' => 'required',
            'file' => 'required',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'O campo "Título" é obrigatório',
            'title.max' => 'O campo "Título" não deve ser maior do que :max caracteres',

            'description.required' => 'O campo "Descrição" é obrigatório',

            'file.required' => 'O campo "Arquivo" é obrigatório',
        ];
    }
}
