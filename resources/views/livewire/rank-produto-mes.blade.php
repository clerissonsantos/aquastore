<div>
    <div class="col-lg-6" style="">
        <div class="hpanel stats">
            <div class="panel-body h-200">
                <div class="stats-title pull-left">
                    <h3><i class="fa fa-line-chart text-success"></i> Rank Produtos do Mês </h3>
                </div>
                <div class="m-t-xl">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Estoque Atual</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($itens as $item)
                            <tr>
                                <td><a class="text-success" href="{{ route('produtos.exibir', $item->produto_id) }}">{{ $item->nome }}</a></td>
                                <td>{{ $item->quantidade }}</td>
                                <td>{{ $item->estoque }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Realize suas primeiras Vendas</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
