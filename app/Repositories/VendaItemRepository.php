<?php

namespace App\Repositories;

use App\Models\VendaItem;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class VendaItemRepository extends AbstratcRepository
{
    public function __construct(protected VendaItem $model)
    {}

    public function produtoComVendaAtiva(int $produtoId)
    {
        return $this->model->where('produto_id', $produtoId)->first();
    }

    public static function itensMaisVendidosDoMes(string $mes = '')
    {
        if (empty($mes)) {
            $mes = Carbon::now()->format('m');
        }

        return DB::table('venda_itens')
            ->select(
                'produto_id',
                'produtos.nome',
                'produtos.estoque',
                DB::raw('sum(quantidade) as quantidade')
            )
            ->join('produtos', 'venda_itens.produto_id', '=', 'produtos.id')
            ->join('vendas', 'vendas.id', '=', 'venda_itens.venda_id')
            ->whereMonth('vendas.data_hora', $mes)
            ->groupBy('produto_id')
            ->orderBy('quantidade', 'desc')
            ->limit(10)
            ->get()
            ->toArray();
    }

    final public function selectItenAlterarEstoque(int $vendaId)
    {
        return DB::table('venda_itens')
            ->select('produto_id as id', 'quantidade')
            ->where('venda_id', $vendaId)
            ->get();
    }
}
