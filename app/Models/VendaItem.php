<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendaItem extends Model implements ModelInterface
{
    use SoftDeletes;

    protected $table = 'venda_itens';
    protected $fillable = [
        'venda_id',
        'produto_id',
        'quantidade',
        'preco_venda',
    ];

    protected function precoVenda(): Attribute
    {
        return Attribute::make(
            get: fn (float $value) => formataDecimal($value),
            set: fn (string $value) => formataDecimalDb($value),
        );
    }

    protected function total(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => formataDecimal($attributes['quantidade'] * $attributes['preco_venda']),
        );
    }

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }
}
