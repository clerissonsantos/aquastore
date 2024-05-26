<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['nullable', 'int'],
            'nome' => ['required', 'string', 'max:255'],
            'preco_compra' => ['required'],
            'preco_venda' => ['required'],
            'percentual_lucro' => ['nullable'],
            'estoque' => ['nullable', 'integer'],
            'estoque_minimo' => ['nullable', 'integer'],
            'validade' => ['nullable', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
