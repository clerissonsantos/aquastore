<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Repositories\ClienteRepository;

class ClienteController extends Controller
{
    public function __construct(
        private ClienteRepository $clienteRepository
    )
    {
        session(['tela_atual' => 'Clientes']);
    }

    public function show(int $id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', ['cliente' => $cliente]);
    }

    public function store(ClienteRequest $clienteRequest)
    {
        $this->clienteRepository->salvar($clienteRequest->validated());
        session()->flash('dialog', [
            'success' => 'Cliente cadastrado com sucesso!'
        ]);
        return redirect()->route('clientes.index');
    }

    public function destroy(Cliente $cliente)
    {
        $clienteAtivo = $this->clienteRepository->clienteComVendaAtiva($cliente->id);

        if (empty($clienteAtivo)) {
            $cliente->delete();
        } else {
            session()->flash('dialog', [
                'warning' => 'Este Cliente não pode ser excluído pois está vinculado a uma venda ativa',
            ]);
        }

        return redirect()->route("clientes.index");
    }
}
