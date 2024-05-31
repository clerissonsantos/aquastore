<div>
    <style>
        #box-cliente {
            margin-top: 1em;
        }
        .box-autocomplete{
            position: absolute;
            border: 1px solid #d4d4d4;
            border-top: none;
            background-color: #fff;
            z-index: 1000;
            width: calc(100% - 30px);
            -webkit-box-shadow: 0px 2px 26px -10px rgba(0,0,0,0.75);
            -moz-box-shadow: 0px 2px 26px -10px rgba(0,0,0,0.75);
            box-shadow: 0px 2px 26px -10px rgba(0,0,0,0.75);
        }

        .box-autocomplete-option {
            border: 1px solid #d4d4d4;
            border-top: none;
            overflow-y: auto;
            z-index: 1000;
            background-color: #fff;
            width: 100%; /* Adjust based on your input width */
            padding: 10px;
            cursor: pointer;
        }

        .box-autocomplete-option:hover {
            background-color: #2aabd2;
            color: #fff;
        }
    </style>
        <div id="box-cliente-autocomplete">
            <form class="form-horizontal" id="vendas-formulario" method="post" action="{{ route('vendas.salvar') }}">
                <div class=" col-lg-2">
                    <label>Data Venda:</label>
                    <input
                        @disabled($venda->finalizada)
                        type="datetime-local"
                        class="form-control"
                        value="{{ $venda->data_hora ?? \Illuminate\Support\Carbon::now()->format('Y-m-d H:i') }}"
                        name="data_hora">
                    <input type="hidden" name="cliente_id" id="cliente_id" value="{{ $venda->cliente_id ?? null }}" />
                    <input type="hidden" name="id" id="id" value="{{ $venda->id ?? null }}" />
                    {{ csrf_field() }}
                </div>
                <div class=" col-lg-10">
                    <label>Cliente:</label>
                    <input
                        @disabled($venda->finalizada)
                        id="cliente-autocomplete"
                        type="text"
                        placeholder="Digite informações do cliente..."
                        wire:model="search"
                        class="form-control"
                        wire:keyup.debounce="$refresh">
                </div>
            </form>
            <div style="clear: both;"></div>

            @if($search)
                <div class="box-autocomplete">
                    @forelse($clientes as $cliente)
                        <div class="box-autocomplete-option" data-field="#cliente_id" data-form="#vendas-formulario" data-id="{{ $cliente->id }}" data-nome="{{ $cliente->nome }}">
                            Cliente: <strong>{{ $cliente->nome }}</strong><br>
                            CPF: {{ formataCpf($cliente->cpf) }}
                        </div>
                    @empty
                        <div class="box-autocomplete-option">
                            Nenhum cliente encontrado
                        </div>
                    @endforelse
                </div>
            @endif
        </div>

        <div id="box-cliente" {{ !$venda ? 'hidden' : null }}>
            <fieldset>
                <legend></legend>
                <div class="col-lg-12">
                    <h3>Cliente:
                        @if($venda)
                            <a href="{{ route('clientes.exibir', $venda->cliente_id) }}" target="_blank" class="text-info">{{ $venda->cliente->nome ?? 'Nenhum cliente selecionado' }} - {{ $venda->cliente->cpf ?? '-' }}</a>
                        @endif
                    </h3>
{{--                    Telefone: <strong>{{ $venda->cliente->telefone ?? '-' }}</strong>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4">--}}
{{--                    Email: <strong>{{ $venda->cliente->email ?? '-' }}</strong><br>--}}
{{--                    CEP: <strong>{{ $venda->cliente->cep ?? '-' }}</strong><br>--}}
{{--                    Rua: <strong>{{ $venda ? $venda->cliente->logradouro .', ' . $venda->cliente->numero : '-' }}</strong>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4">--}}
{{--                    Bairro: <strong>{{ $venda->cliente->bairro ?? '-' }}</strong><br>--}}
{{--                    Cidade: <strong>{{ $venda->cliente->cidade ?? '-' }}</strong><br>--}}
{{--                    UF: <strong>{{ $venda->cliente->uf ?? '-' }}</strong>--}}
                </div>
            </fieldset>
        </div>

    <script>
        $(document).ready(function(){
            $(document).on('click', function(){
                $('.box-autocomplete').hide();
            });
        });

        $(document).on('click', '.box-autocomplete-option', function(){
            $($(this).data('field')).val($(this).data('id'));
            $($(this).data('form')).submit();
        });
    </script>
</div>
