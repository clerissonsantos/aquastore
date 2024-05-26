<?php

namespace App\Repositories;

use App\Models\Cliente;

class ClienteRepository extends AbstratcRepository
{
    public function __construct(protected Cliente $model)
    {}
}
