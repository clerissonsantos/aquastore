<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model implements ModelInterface
{
    use SoftDeletes;
    protected $fillable = [
        'nome',
        'preco_compra',
        'preco_venda',
        'percentual_lucro',
        'estoque',
        'estoque_minimo',
        'validade',
        'desativado',
        'desativado_user_id',
    ];

    public function desativadoUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'desativado_user_id');
    }

    protected function precoCompra(): Attribute
    {
        return Attribute::make(
            get: fn (float $value) => formataDecimal($value),
            set: fn (string $value) => formataDecimalDb($value),
        );
    }

    protected function precoVenda(): Attribute
    {
        return Attribute::make(
            get: fn (float $value) => formataDecimal($value),
            set: fn (string $value) => formataDecimalDb($value),
        );
    }

    protected function percentualLucro(): Attribute
    {
        return Attribute::make(
            get: fn (float $value) => formataDecimal($value),
            set: fn (string $value) => formataDecimalDb($value),
        );
    }
}
