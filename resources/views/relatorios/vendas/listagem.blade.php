@extends('home')

@section('content')
    <h2 class="text-success">Relatório de Vendas</h2>

    <div class="hpanel col-lg-9">
        <div class="panel-heading">
            Painel de Vendas
        </div>
        <div class="panel-body">
            <form method="get" action="{{ route('relatorios-vendas.listagem') }}" class="form-horizontal">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $produto->id ?? null }}">
                            {{ csrf_field() }}
                            <div class="col-md-2 col-xs-6">
                                <label>Data Inicio: </label>
                                <input type="date" class="form-control" name="data_inicio" value="{{ $parametros['data_inicio'] ?? null }}">
                            </div>
                            <div class="col-md-2 col-xs-6">
                                <label>Data Fim: </label>
                                <input type="date" class="form-control" name="data_fim" value="{{ $parametros['data_fim'] ?? null }}">
                            </div>
                            <div class="col-md-3">
                                <label>Cliente: </label>
                                <input type="text" class="form-control" name="cliente" value="{{ $parametros['cliente'] ?? null }}">
                            </div>
                            <div class="col-md-2 col-xs-6">
                                <label>Pagamento: </label>
                                <select name="forma_pagamento" class="form-control">
                                    <option {{ empty($parametros['forma_pagamento']) ? 'selected' : null }}>TODAS</option>
                                    <option {{ isset($parametros['forma_pagamento']) && $parametros['forma_pagamento'] === 'DINHEIRO' ? 'selected' : null }}>DINHEIRO</option>
                                    <option {{ isset($parametros['forma_pagamento']) && $parametros['forma_pagamento'] === 'CARTÃO' ? 'selected' : null }} >CARTÃO</option>
                                    <option {{ isset($parametros['forma_pagamento']) && $parametros['forma_pagamento'] === 'PIX' ? 'selected' : null }} >PIX</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-xs-6">
                                <label>Finalizadas: </label>
                                <select name="finalizadas" class="form-control">
                                    <option {{ empty($parametros['finalizadas']) ? 'selected' : null }}>TODAS</option>
                                    <option {{ isset($parametros['finalizadas']) && $parametros['finalizadas'] === 'SIM' ? 'selected' : null }}>SIM</option>
                                    <option {{ isset($parametros['finalizadas']) && $parametros['finalizadas'] === 'NÃO' ? 'selected' : null }} >NÃO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success">Pesquisar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="panel-footer">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Data Venda</th>
                            <th>CPF</th>
                            <th>Cliente</th>
                            <th>Valor Total</th>
                            <th>Forma Pagamento</th>
                            <th>Desconto Valor</th>
                            <th>Finalizada</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($vendas as $venda)
                        <tr>
                            <td><a class="btn btn-info btn-sm" href="{{ route('vendas.tela', $venda->id) }}">Exibir</a></td>
                            <td>{{ formataDataView($venda->data_hora) }}</td>
                            <td>{{ formataCpf($venda->cliente->cpf) }}</td>
                            <td><a class="text-success" href="{{ route('clientes.exibir', $venda->cliente_id) }}">{{ $venda->cliente->nome }}</a></td>
                            <td>{{ formataDecimal($venda->valor_total) }}</td>
                            <td>{{ $venda->forma_pagamento }}</td>
                            <td>{{ formataDecimal($venda->desconto_valor) }}</td>
                            <td>{{ $venda->finalizada ? 'SIM' : 'NÃO' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="hpanel">
            <div class="panel-body">
                <div class="stats-title pull-left">
                    <h4>Total de Vendas</h4>
                </div>
                <div class="stats-icon pull-right">
                    <i class="pe-7s-cash fa-4x"></i>
                </div>
                <div class="m-t-xl">
                    <h1 class="text-success">R$ {{ formataDecimal($vendas->sum('valor_total')) }}</h1>
                    <small>
                        Esse é o valor total das vendas realizadas no período selecionado.
                    </small>
                </div>
            </div>
        </div>
    </div>
@endsection
