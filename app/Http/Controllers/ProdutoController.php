<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Http\Requests\ProdutoRequest;
use App\Models\Cliente;
use App\Models\Produto;
use App\Repositories\ClienteRepository;
use App\Repositories\ProdutoRepository;

class ProdutoController extends Controller
{
    protected string $view = 'produtos';

    public function __construct(private ProdutoRepository $repository)
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
        $produto->delete();
        return redirect()->route("$this->view.index");
    }
}
