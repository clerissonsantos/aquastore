<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'data_hora' => ['required', 'date'],
            'cliente_id' => ['required']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
