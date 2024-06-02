<div class="hpanel hbggreen col-lg-12">
    <form class="form-horizontal" action="{{ route('vendas.finalizar') }}" method="post">
        <div class="panel-body ">
            <table class="table text-white">
                <tbody>
                    <tr>
                        <input type="hidden" name="id" value="{{ $venda->id ?? null }}"/>
                        {{ csrf_field() }}
                        <input type="hidden" id="total_itens" value="{{ $venda->totalItens ?? 0 }}"/>
                        <td><strong>VALOR TOTAL :</strong></td>
                        <td><h2><strong>R$ {{ formataDecimal($venda->totalItens ?? 0) }}</strong></h2></td>
                    </tr>
                    <tr>
                        <td>
                            <label>Forma de Pagamento: </label>
                        </td>
                        <td>
                            <select name="forma_pagamento" class="form-control" @disabled($venda->finalizada)>
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
                                    @disabled($venda->finalizada)
                                    id="percentual_desconto"
                                    name="desconto_percentual"
                                    type="text"
                                    class="form-control"
                                    value="{{ $venda->desconto_percentual ?? '0,00' }}">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info" @disabled($venda->finalizada)>Aplicar
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
                            <input id="desconto_valor" name="desconto_valor" type="hidden" class="form-control" value="{{ $venda->desconto_valor ?? 0 }}">
                            <h2><strong id="desconto_reais" name="desconto_valor">R$ - {{ formataDecimal($venda->desconto_valor ?? '0.00') }}</strong></h2>
                        </td>
                    </tr>
                    <tr>
                        <input type="hidden" id="total_final" name="valor_total" value="{{ $venda->totalItens ?? 0 }}">
                        <td><strong><h3>VALOR TOTAL:</h3></strong></td>
                        <td><h2><strong id="total_final_label">R$ {{ formataDecimal($venda->valor_total ?? $venda->totalItens ?? 0) }}</strong></h2></td>
                    </tr>
                </tbody>
            </table>
        </div>
        @if(!$venda->finalizada)
            <button type="submit" id="finalizar-venda" class="btn btn-info btn-block" style="margin-top: 10px">Finalizar
                Venda
            </button>
        @else
            <a href="{{ route('vendas.tela') }}" class="btn btn-info btn-block" style="margin-top: 10px">Nova Venda</a>
            <a href="{{ route('vendas.excluir', $venda->id) }}" class="btn btn-danger btn-block btn-excluir" style="margin-top: 10px">Excluir Venda</a>
        @endif

    </form>
</div>
