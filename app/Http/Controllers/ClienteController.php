<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Repositories\ClienteRepository;

class ClienteController extends Controller
{
    public function __construct(private ClienteRepository $clienteRepository)
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
        return redirect()->route('clientes.index');
    }
}
