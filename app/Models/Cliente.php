<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model implements ModelInterface
{
    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'email',
        'telefone',
        'cep',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'uf',
    ];
}
