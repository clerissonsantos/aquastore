@extends('home')

@section('content')
    <div class="hpanel">
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
                            <div class="col-md-2">
                                <label>Data Inicio: </label>
                                <input type="date" class="form-control" name="data_inicio" value="{{ $parametros['data_inicio'] ?? null }}">
                            </div>
                            <div class="col-md-2">
                                <label>Data Fim: </label>
                                <input type="date" class="form-control" name="data_fim" value="{{ $parametros['data_fim'] ?? null }}">
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
                <table class="table">
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
                            <td>{{ $venda->cliente->nome }}</td>
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
@endsection
