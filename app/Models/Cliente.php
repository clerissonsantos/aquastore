<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model implements ModelInterface
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'email',
        'telefone',
        'cep',
        'logradouro',
        'complemento',
        'numero',
        'bairro',
        'cidade',
        'uf',
    ];

    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }
}
