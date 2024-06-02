<?php

namespace App\Repositories;

use App\Models\VendaItem;
use Illuminate\Support\Facades\DB;

class VendaItemRepository extends AbstratcRepository
{
    public function __construct(protected VendaItem $model)
    {}

    final public function selectItenAlterarEstoque(int $vendaId)
    {
        return DB::table('venda_itens')
            ->select('produto_id as id', 'quantidade')
            ->where('venda_id', $vendaId)
            ->get();
    }
}
