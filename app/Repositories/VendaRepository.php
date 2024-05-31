<?php

namespace App\Repositories;

use App\Models\Venda;

class VendaRepository extends AbstratcRepository
{
    public function __construct(protected Venda $model)
    {}
}
