<div>
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-heading">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    <a class="closebox"><i class="fa fa-times"></i></a>
                </div>
                Buscar Cliente
            </div>
            <div class="panel-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Informação:</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" wire:model="search">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <button type="button" class="btn w-xs btn-success" wire:click="$refresh">
                                <i class="fa fa-search"></i> Pesquisar
                            </button>
                            <a href="{{ route('clientes.novo') }}" class="btn w-xs btn-info">
                                <i class="fa fa-plus"></i> Novo Cliente
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
                Listagem de Clientes
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-condensed table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>CPF</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($clientes as $cliente)
                            <tr>
                                <td>
                                    <a href="{{ route('clientes.exibir', $cliente->id) }}" class="btn w-xs btn-info">
                                        <i class="fa fa-plus"></i> Exibir
                                    </a>
                                </td>
                                <td>{{ formataCpf($cliente->cpf) }}</td>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>{{ formataTelefone($cliente->telefone) }}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                    {{ $clientes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

