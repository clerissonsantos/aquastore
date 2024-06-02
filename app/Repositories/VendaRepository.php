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
        $select = $this->model;

        if (empty($parametros)) {
            return $select->get();
        }

        if ($parametros['data_inicio'] !== null || $parametros['data_fim'] !== null) {
            $select = $this->model
                ->where('data_hora', '>=', $parametros['data_inicio'])
                ->where(DB::raw('DATE(data_hora)'), '<=', $parametros['data_fim']);
        }

        return $select->get();
    }
}
