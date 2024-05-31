<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendaItemRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'venda_id' => ['required', 'integer'],
            'produto_id' => ['required', 'integer'],
            'quantidade' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
