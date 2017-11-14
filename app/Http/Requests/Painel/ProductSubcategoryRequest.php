<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class ProductSubcategoryRequest extends FormRequest
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
            'product_category_id' => 'required|integer|exists:product_categories,id',
            'title' => 'required|max:100',
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
            'title.required' => 'O campo "Categoria de Produto" é obrigatório',
            'title.integer' => 'O campo "Categoria de Produto" deve ser um número inteiro',
            'title.exists' => 'Categoria de Produto não cadastrada',


            'title.required' => 'O campo "Título" é obrigatório',
            'title.max' => 'O campo "Título" não deve ser maior do que :max caracteres',
        ];
    }
}
