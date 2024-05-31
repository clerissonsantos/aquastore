@extends('home')

@section('content')
    <div class="row social-board">
        <div class="col-lg-12">
        <h3>Vendas</h3>
            <div class="hpanel">
                <div class="panel-body">
                    @livewire('venda-cabecalho', ['venda' => $venda])
                </div>
                <div class="panel-body" style="margin-top: 30px">
                    Escolha os produtos:
                    <form class="form-horizontal" id="vendas-item-formulario" style="margin-top: 25px;">
                        <input type="hidden" name="produto_id" id="produto_id"/>
                        <input type="hidden" name="venda_id" id="venda_id" value="{{ $venda->id ?? null }}" />
                        {{ csrf_field() }}
                        <div class="col-lg-4 ui-widget">
                            <label>Produto:</label>
                            <input id="produto-autocomplete" type="text" placeholder="Digite o nome do produto" class="form-control">
                        </div>
                        <div class="col-lg-2">
                            <label>Quantidade:</label>
                            <input type="number" id="quantidade" class="form-control" name="quantidade" value="1">
                        </div>
                        <div class="col-lg-2">
                            <label>Preço Unidade:</label>
                            <input type="text" id="preco_venda" class="form-control" value="0,00">
                        </div>
                        <div class="col-lg-2">
                            <label>Total:</label>
                            <input disabled type="text" id="total_item" class="form-control" value="0,00">
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-info" id="adicionar-item" type="button"><i class="fa fa-save"></i> <br>Adicionar</button>
                        </div>
                    </form>
                    <div style="clear: both;"></div>
                </div>
                @include('vendas.venda-itens', ['venda' => $venda])
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '#adicionar-item', function(e) {
            e.preventDefault();

            var produto_id = $('#produto_id').val();
            var venda_id = $('#venda_id').val();
            var quantidade = $('#quantidade').val();

            if (!produto_id || !venda_id || !quantidade) {
                alert('Preencha todos os campos!');
                return;
            }

            $.ajax({
                url: "{{ route('vendas-item.salvar') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    produto_id: produto_id,
                    venda_id: venda_id,
                    quantidade: quantidade,
                },
                success: function(data) {
                    $('#vendas-itens').html(data);
                    $('#produto-autocomplete').val('');
                    $('#preco_venda').val('0,00');
                    $('#total_item').val('0,00');
                    $('#quantidade').val(1);
                },
                error: function(xhr, status, error) {
                    alert('Erro ao adicionar item!');
                }
            });
        });

        $(document).on('blur', '#percentual_desconto', function(e) {
            var totalItens = $('#total_itens').val();
            var percentualDesconto = parseFloat($(this).val().replace(".", "").replace(",", ".")) || 0;

            var desconto = (percentualDesconto / 100) * totalItens;
            var totalComDesconto = totalItens - desconto;
            $('#desconto_reais').text(formatarReal(desconto));
            $('#desconto_valor').val(formatarReal(desconto));
            $('#total_final_label').text(formatarReal(totalComDesconto));

        });

        $(document).on('change', '#quantidade', function(e) {
            var quantidade = parseFloat($(this).val() || 0);
            var preco = parseFloat($('#preco_venda').val().replace(".", "").replace(",", ".") || 0);
            var total = quantidade * preco;
            $('#total_item').val(formatarReal(total));
        });

        $(document).on('click', function() {
            $('.box-autocomplete').hide();
        });

        $(function() {
            $("#produto-autocomplete").autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('produtos.autocomplete') }}",
                        type: "POST",
                        dataType: "json",
                        data: {
                            _token: "{{ csrf_token() }}",
                            search: request.term
                        },
                        success: function(data) {
                            response(data.produtos);  // Passe os dados recebidos para o autocomplete
                        },
                        error: function(xhr, status, error) {
                            response(['Nenhum Produto Encontrado']);  // Retorna um array vazio em caso de erro
                        }
                    });
                },
                minLength: 2,
                select: function(event, ui) {
                    $('#produto_id').val(ui.item.produto_id);
                    $('#preco_venda').val(ui.item.preco_venda);
                    $('#total_item').val(ui.item.preco_venda);
                    $('#quantidade').focus();
                }
            });
        });
    </script>
@endsection
