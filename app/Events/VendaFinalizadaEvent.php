<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Support\Collection;

class VendaFinalizadaEvent
{
    use Dispatchable;

    public function __construct(
        public Collection $produtos,
        public string $movimentacao = 'SAIDA'
    ) {}
}
