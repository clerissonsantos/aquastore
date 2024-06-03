<div>
    <style>
        a:hover {
            color: #6be06c !important;
        }
    </style>
    <div class="col-lg-4" style="">
        <div class="hpanel stats">
            <div class="panel-body h-200">
                <div class="stats-title pull-left">
                    <h3><i class="fa fa-birthday-cake text-warning"></i> Aniversariantes do Mês</h3>
                </div>
                <div class="m-t-xl">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Data</th>
                                <th>Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($aniversariantes as $aniversariante)
                                <tr>
                                    @php
                                        $aniversario = (new \Carbon\Carbon($aniversariante->data_nascimento))->format('d/m');
                                        $hoje = (new \Carbon\Carbon())->format('d/m');
                                    @endphp
                                    <td>{!! $aniversario === $hoje ? "(HOJE)" : null !!}</td>
                                    <td>{{ (new \Carbon\Carbon($aniversariante->data_nascimento))->format('d/m') }}</td>
                                    <td><a class="text-success" href="{{ route('clientes.exibir', $aniversariante->id) }}">{{ $aniversariante->nome }}</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Nenhum cliente aniversariando este mês</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                Parabenize seus clientes!
            </div>
        </div>
    </div>
</div>
