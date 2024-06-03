
@extends('home')

@section('content')
    <div>
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <form method="post" action="{{ route('produtos.salvar') }}" class="form-horizontal">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ $produto->id ?? null }}">
                                    {{ csrf_field() }}
                                    <div class="col-md-4">
                                        <label>Nome*: </label>
                                        <input type="text" id="nome" class="form-control" required name="nome" value="{{ $produto->nome ?? null }}">
                                    </div>
                                    <div class="col-md-2 col-xs-6">
                                        <label>Preço Compra: </label>
                                        <input type="text" id="preco_compra" oninput="maskReal(this)" class="form-control" name="preco_compra" value="{{ $produto->preco_compra ?? '0,00' }}">
                                    </div>
                                    <div class="col-md-2 col-xs-6">
                                        <label>Lucro(%): </label>
                                        <input type="text" id="percentual_lucro" oninput="maskReal(this)" class="form-control" name="percentual_lucro" value="{{ $produto->percentual_lucro ?? '0,00' }}">
                                    </div>
                                    <div class="col-md-2 col-xs-6">
                                        <label>Preço Sugerido: </label>
                                        <input disabled type="text" id="preco_venda" class="form-control" value="0,00">
                                    </div>
                                    <div class="col-md-2 col-xs-6">
                                        <label>Preço Venda: </label>
                                        <input type="text" oninput="maskReal(this)" class="form-control" name="preco_venda" value="{{ $produto->preco_venda ?? '0,00' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-2 col-xs-12">
                                        <label>Data Validade: </label>
                                        <input type="date" class="form-control" name="validade" value="{{ $produto->validade ?? null }}">
                                    </div>
                                    <div class="col-md-2 col-xs-6">
                                        <label>Estoque: </label>
                                        <input type="number" class="form-control" name="estoque" value="{{ $produto->estoque ?? 0 }}">
                                    </div>
                                    <div class="col-md-2 col-xs-6">
                                        <label>Estoque Mínimo: </label>
                                        <input type="number" class="form-control" name="estoque_minimo" value="{{ $produto->estoque_minimo ?? 0 }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <a href="{{ route('produtos.index') }}" class="btn btn-default">
                                            <i class="fa fa-arrow-left"></i> Voltar
                                        </a>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-save"></i> Salvar
                                        </button>
                                        @if(isset($produto))
                                            @if(!$produto->desativado)
                                                <a href="{{ route('produtos.desativar', ['id' => $produto->id, 'status' => 1]) }}" class="btn btn-warning">
                                                    <i class="fa fa-warning"></i> Desativar Produto
                                                </a>
                                            @else
                                                <a href="{{ route('produtos.desativar', ['id' => $produto->id, 'status' => 0]) }}" class="btn btn-info">
                                                    <i class="fa fa-warning"></i> Ativar Produto
                                                </a>
                                            @endif
                                            @if($produto->id)
                                                <a href="{{ route('produtos.excluir', $produto->id) }}" class="btn btn-danger btn-excluir">
                                                    <i class="fa fa-trash"></i> Excluir
                                                </a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('#nome').focus();

            $('#percentual_lucro').blur(function(){
                calcularPrecoVenda();
            });

            function calcularPrecoVenda() {
                var precoCompra = parseFloat($('#preco_compra').val().replace(".", "").replace(",", "."));
                var percentualLucro = parseFloat($('#percentual_lucro').val().replace(".", "").replace(",", "."));

                if (!isNaN(precoCompra) && !isNaN(percentualLucro)) {
                    var precoVenda = precoCompra + (precoCompra * (percentualLucro / 100));
                    return $('#preco_venda').val(formatarReal(precoVenda));
                } else {
                    return formatarReal(0);
                }
            }
        });
    </script>
@endsection
