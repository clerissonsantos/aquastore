<div>
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    <a class="closebox"><i class="fa fa-times"></i></a>
                </div>
                Buscar Produtos
            </div>
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <label>Informação:</label>
                            <input class="form-control" type="text" wire:model="search" wire:keyup.debounce="$refresh">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <button type="button" class="btn w-xs btn-success" wire:click="$refresh">
                                <i class="fa fa-search"></i> Pesquisar
                            </button>
                            <a href="{{ route('produtos.novo') }}" class="btn w-xs btn-info">
                                <i class="fa fa-plus"></i> Novo Produto
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-heading">
                Listagem de Produtos
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Preço Venda</th>
                                <th>Estoque</th>
                                <th>Estoque Mínimo</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($produtos as $produto)
                            <tr>
                                <td>
                                    <a href="{{ route('produtos.exibir', $produto->id) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                                <td>{{ $produto->id }}</td>
                                <td>{{ $produto->nome }}</td>
                                <td>R$ {{ $produto->preco_venda }}</td>
                                <td>{{ $produto->estoque }}</td>
                                <td>{{ $produto->estoque_minimo }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                    {{ $produtos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

