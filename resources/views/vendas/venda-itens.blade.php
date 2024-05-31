<div>
    @if($venda)
        <div class="hpanel col-lg-8">
            @if(!$venda->finalizada)
                <div class="panel-body">
                    @include('vendas.venda-item-cabecalho', ['venda' => $venda])
                </div>
            @endif
            <div class="panel-footer">
                @if(count($venda->itens) > 0)
                    @include('vendas.venda-itens-produtos')
                @endif
                <div style="clear: both;"></div>
            </div>
        </div>
        <div class="hpanel col-lg-4">
            @include('vendas.venda-totalizadores')
        </div>
    @endif
</div>
