<?php

namespace App\Repositories;

use App\Models\Cliente;

class ClienteRepository extends AbstratcRepository
{
    public function __construct(protected Cliente $model)
    {}

    public function clienteComVendaAtiva(int $clienteId)
    {
        return $this->model->find($clienteId)->vendas->first();
    }
}
