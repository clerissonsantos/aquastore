<?php

namespace App\Http\Controllers;

use App\Repositories\VendaRepository;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    public function __construct(protected VendaRepository $vendaRepository)
    {}

    public function vendasListagem(Request $request)
    {
        if ($request->data_inicio === null && $request->data_fim === null) {
            $request->merge([
                'data_inicio' => date('Y-m-d', strtotime('-1 week')),
                'data_fim' => date('Y-m-d'),
            ]);
        }

        $vendas = $this->vendaRepository->selectRelatorioDeVendas($request->all());
        return view('relatorios.vendas.listagem', [
            'vendas' => $vendas,
            'parametros' => $request->all(),
        ]);
    }
}
