<?php

namespace App\Repositories;

use App\Models\Venda;
use Illuminate\Support\Facades\DB;

class VendaRepository extends AbstratcRepository
{
    public function __construct(protected Venda $model)
    {}

    public function selectRelatorioDeVendas(array $parametros)
    {
        $select = $this->model
            ->join('clientes', 'vendas.cliente_id', '=', 'clientes.id')
            ->select('vendas.*');

        if (empty($parametros)) {
            return $select->get();
        }

        if ($parametros['data_inicio'] !== null || $parametros['data_fim'] !== null) {
            $select = $select
                ->where('data_hora', '>=', $parametros['data_inicio'])
                ->where(DB::raw('DATE(data_hora)'), '<=', $parametros['data_fim']);
        }

        if (isset($parametros['cliente'])) {
            $select = $select
                ->where('clientes.nome', 'like', "%{$parametros['cliente']}%");
        }

        if (isset($parametros['forma_pagamento']) && $parametros['forma_pagamento'] !== 'TODAS') {
            $select = $select
                ->where('forma_pagamento', '=', $parametros['forma_pagamento']);
        }

        if (isset($parametros['finalizadas']) && $parametros['finalizadas'] !== 'TODAS') {
            $select = $select
                ->where('finalizada', '=', $parametros['finalizadas'] === 'SIM' ? 1 : 0);
        }

        return $select->orderBy('data_hora')->get();
    }
}
