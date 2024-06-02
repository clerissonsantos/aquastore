<div class="panel-body col-lg-12" style="margin-top: 10px">
    <div class="table-responsive" style="margin-top: 25px">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço Unitário</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            @if($venda && $venda->itens->count() > 0)
                @foreach($venda->itens as $vendaItem)
                    <tr>
                        <td>{{ $vendaItem->produto->nome }}</td>
                        <td>{{ $vendaItem->quantidade }}</td>
                        <td>{{ $vendaItem->preco_venda }}</td>
                        <td>{{ $vendaItem->total }}</td>
                        <td>
                            @if(!$venda->finalizada)
                                <button class="btn btn-danger btn-sm deletar-item" data-id="{{ $vendaItem->id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                    @php
                        $venda->totalItens += $vendaItem->quantidade * $vendaItem->getRawOriginal('preco_venda');
                    @endphp
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>


