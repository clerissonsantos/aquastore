<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Support\Collection;

class VendaExcluidaEvent
{
    use Dispatchable;

    public function __construct(
        public Collection $produtos,
        public string $movimentacao = 'ENTRADA'
    ) {}
}
