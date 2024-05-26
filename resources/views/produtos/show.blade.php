
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
                                        <input type="text" class="form-control" required name="nome" value="{{ $produto->nome ?? null }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Preço Compra: </label>
                                        <input type="text" oninput="maskReal(this)" class="form-control" name="preco_compra" value="{{ $produto->preco_compra ?? 0 }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Lucro(%): </label>
                                        <input type="text" oninput="maskReal(this)" class="form-control" name="percentual_lucro" value="{{ $produto->percentual_lucro ?? 0 }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Preço Venda: </label>
                                        <input type="text" oninput="maskReal(this)" class="form-control" name="preco_venda" value="{{ $produto->preco_venda ?? 0 }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Data Validade: </label>
                                        <input type="date" class="form-control" name="validade" value="{{ $produto->validade ?? null }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label>Estoque: </label>
                                        <input type="number" class="form-control" name="estoque" value="{{ $produto->estoque ?? null }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Estoque Mínimo: </label>
                                        <input type="number" class="form-control" name="estoque_minimo" value="{{ $produto->estoque_minimo ?? null }}">
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
                                        @if(!$produto->desativado)
                                            <a href="{{ route('produtos.desativar', ['id' => $produto->id, 'status' => 1]) }}" class="btn btn-info">
                                                <i class="fa fa-warning"></i> Ativar Produto
                                            </a>
                                        @else
                                            <a href="{{ route('produtos.desativar', ['id' => $produto->id, 'status' => 0]) }}" class="btn btn-warning">
                                                <i class="fa fa-warning"></i> Desativar Produto
                                            </a>
                                        @endif
                                        @if($produto->id)
                                            <a href="{{ route('produtos.excluir', $produto->id) }}" class="btn btn-danger btn-excluir">
                                                <i class="fa fa-trash"></i> Excluir
                                            </a>
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
@endsection
