
<div id="vendas-itens">
    <div class="panel-body col-lg-8" style="margin-top: 10px">
        <div class="table-responsive" style="margin-top: 25px">
            <table class="table">
                <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                @php $totalItens = 0; @endphp
                @if($venda && $venda->itens->count() > 0)
                    @foreach($venda->itens as $vendaItem)
                        <tr>
                            <td>{{ $vendaItem->produto->nome }}</td>
                            <td>{{ $vendaItem->quantidade }}</td>
                            <td>{{ $vendaItem->preco_venda }}</td>
                            <td>{{ $vendaItem->total }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @php
                            $totalItens += $vendaItem->quantidade * $vendaItem->getRawOriginal('preco_venda');
                        @endphp
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="hpanel hbggreen col-lg-4" style="margin-top: 10px">
        <form class="form-horizontal" action="{{ route('vendas.finalizar') }}" method="post">
            <div class="panel-body ">
                <table class="table text-white">
                    <tbody>
                    <tr>
                        <input type="hidden" name="id" value="{{ $venda->id ?? null }}"/>
                        {{ csrf_field() }}
                        <input type="hidden" id="total_itens" value="{{ $totalItens }}"/>
                        <td><strong>VALOR TOTAL :</strong></td>
                        <td><h2><strong>R$ {{ formataDecimal($totalItens) }}</strong></h2></td>
                    </tr>
                    <tr>
                        <td>
                            <label>Forma de Pagamento: </label>
                        </td>
                        <td>
                            <select name="forma_pagamento" class="form-control">
                                <option>DINHEIRO</option>
                                <option>CARTÃO</option>
                                <option>PIX</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Desconto (%):</strong></td>
                        <td>
                            <div class="input-group">
                                <input
                                    id="percentual_desconto"
                                    name="desconto_percentual"
                                    type="text"
                                    oninput="maskReal(this)"
                                    class="form-control"
                                    value="{{ $venda->desconto_percentual ?? '0,00' }}">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info">Aplicar
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Desconto R$:</strong>
                        </td>
                        <td>
                            <input id="desconto_valor" name="desconto_valor" type="hidden" class="form-control"
                                value="{{ $venda->desconto_valor ?? 0.00 }}">
                            <h2><strong id="desconto_reais" name="desconto_valor">R$ {{ $venda->desconto_valor ?? '0,00' }}</strong></h2>
                        </td>
                    </tr>
                    <tr>
                        <td><strong><h3>VALOR TOTAL:</h3></strong></td>
                        <td><h2><strong id="total_final_label">R$ {{ formataDecimal($totalItens) }}</strong></h2></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <button type="submit" id="finalizar-venda" class="btn btn-info btn-block" style="margin-top: 10px">Finalizar
                Venda
            </button>
        </form>
    </div>
</div>


