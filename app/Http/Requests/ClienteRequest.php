<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['nullable', 'int'],
            'nome' => ['required', 'string', 'max:255'],
            'telefone' => ['nullable', 'string', 'max:11'],
            'cpf' => ['nullable', 'string', 'max:11'],
            'email' => ['nullable', 'email', 'max:255'],
            'data_nascimento' => ['nullable', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
