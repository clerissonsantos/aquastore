<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venda extends Model implements ModelInterface
{
    use SoftDeletes;

    protected $fillable = [
        'data_hora',
        'cliente_id',
        'valor_total',
        'forma_pagamento_id',
        'data_pagamento',
        'finalizada',
        'forma_pagamento',
        'desconto_valor',
        'desconto_percentual',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function itens(): HasMany
    {
        return $this->hasMany(VendaItem::class);
    }

    protected function descontoPercentual(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => formataDecimalDb($value),
        );
    }

    protected function casts()
    {
        return [
            'data_hora' => 'datetime',
            'data_pagamento' => 'datetime',
        ];
    }
}
