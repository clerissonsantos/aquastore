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
            'cpf' => ['nullable', 'string', 'max:11', 'min:11'],
            'email' => ['nullable', 'email', 'max:255'],
            'data_nascimento' => ['nullable', 'date'],
            'cep' => ['nullable', 'string', 'max:8', 'min:8'],
            'logradouro' => ['nullable', 'string'],
            'numero' => ['nullable', 'string'],
            'bairro' => ['nullable', 'string'],
            'cidade' => ['nullable', 'string'],
            'uf' => ['nullable', 'string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
