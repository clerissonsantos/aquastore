<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Http\Requests\ProdutoRequest;
use App\Models\Cliente;
use App\Models\Produto;
use App\Repositories\ClienteRepository;
use App\Repositories\ProdutoRepository;
use App\Repositories\VendaItemRepository;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    protected string $view = 'produtos';

    public function __construct(
        private ProdutoRepository $repository,
        private VendaItemRepository $vendaItemrepository,
    )
    {
        session(['tela_atual' => ucfirst($this->view)]);
    }

    public function show(int $id)
    {
        $produto = Produto::findOrFail($id);
        return view("$this->view.show", ['produto' => $produto]);
    }

    public function store(ProdutoRequest $request)
    {
        $this->repository->salvar($request->validated());
        session()->flash('dialog', [
            'success' => 'Produto cadastrado com sucesso!'
        ]);
        return redirect()->route("$this->view.index");
    }

    public function desativar(int $id, int $status)
    {
        $this->repository->salvar([
            'id' => $id,
            'desativado' => $status,
            'desativado_user_id' => auth()->id()
        ]);

        return redirect()->route('produtos.exibir', $id);
    }

    public function destroy(Produto $produto)
    {
        $produtoAtivo = $this->vendaItemrepository->produtoComVendaAtiva($produto->id);

        if (empty($produtoAtivo)) {
            $produto->delete();
        } else {
            session()->flash('dialog', [
                'warning' => 'Este produto não pode ser excluído pois está vinculado a uma venda ativa',
            ]);
        }

        return redirect()->route("$this->view.index");
    }

    public function autocomplete(Request $request)
    {
        $produtos = Produto::query()
            ->when($request->search, fn($query, $search) => $query->where('nome', 'like', "%{$search}%")
            ->where('desativado', 0))
            ->limit(20)
            ->get()
            ->toArray();

        if (empty($produtos)) {
            return response()->json(['produtos' => [['label' => 'Nenhum produto encontrado', 'value' => '']]]);
        }

        $produtosAutoComplete = [];
        foreach ($produtos as $key => $produto) {
            $produtosAutoComplete[] = [
                'label' => "{$produto['nome']} -- R$: {$produto['preco_venda']} -- Estoque: {$produto['estoque']}",
                'value' => "{$produto['nome']}",
                'produto_id' => $produto['id'],
                'preco_venda' => $produto['preco_venda'],
            ];
        }

        return response()->json(['produtos' => $produtosAutoComplete]);
    }
}
