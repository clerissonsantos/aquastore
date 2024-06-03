<div>
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-heading">
                Buscar Cliente
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
                                    <a href="{{ route('clientes.exibir', $cliente->id) }}" class="btn btn-info">
                                        <i class="fa fa-eye"></i>
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
                    {{ $clientes->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

