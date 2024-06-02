<?php

namespace App\Http\Controllers;

use App\Events\VendaExcluidaEvent;
use App\Events\VendaFinalizadaEvent;
use App\Http\Requests\VendaItemRequest;
use App\Http\Requests\VendaRequest;
use App\Models\Produto;
use App\Models\Venda;
use App\Models\VendaItem;
use App\Repositories\VendaItemRepository;
use App\Repositories\VendaRepository;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function __construct(
        private VendaRepository $repository,
        private VendaItemRepository $itemRepository
    )
    {
        session(['tela_atual' => 'Vendas']);
    }

    public function principal(Venda $venda = null)
    {
        return view('vendas.principal', [
            'venda' => $venda,
        ]);
    }

    public function store(VendaRequest $request)
    {
        $venda = $this->repository->salvar($request->all());
        return redirect()->route('vendas.tela', $venda);
    }

    public function adicionarProduto(VendaItemRequest $request)
    {
        $vendaItem = [
            'venda_id' => $request->venda_id,
            'produto_id' => $request->produto_id,
            'quantidade' => $request->quantidade,
            'preco_venda' => Produto::find($request->produto_id)->preco_venda,
        ];

        $this->itemRepository->salvar($vendaItem);

        return view('vendas.venda-itens', [
            'venda' => Venda::find($request->venda_id),
            'totalItens' => 0
        ]);
    }

    public function finalizar(Request $request)
    {
        $this->repository->salvar([
            'id' => $request->id,
            'finalizada' => true,
            'forma_pagamento' => $request->forma_pagamento,
            'desconto_valor' => $request->desconto_valor,
            'desconto_percentual' => $request->desconto_percentual,
            'valor_total' => $request->valor_total,
        ]);

        $itens = $this->itemRepository->selectItenAlterarEstoque($request->id);
        VendaFinalizadaEvent::dispatch($itens);

        return redirect()->route('vendas.tela', Venda::find($request->id));
    }

    public function itemdestroy(Request $request)
    {
        $item = VendaItem::find($request->id);
        $itemVenda = $item->venda_id;
        $item->delete();

        return view('vendas.venda-itens', [
            'venda' => Venda::find($itemVenda),
            'totalItens' => 0
        ]);
    }

    public function destroy(int $vendaId)
    {
        $venda = Venda::find($vendaId);

        if ($venda->delete()) {
            $itens = $this->itemRepository->selectItenAlterarEstoque($vendaId);
            VendaExcluidaEvent::dispatch($itens);
        }

        return redirect()->route('vendas.tela');
    }
}
