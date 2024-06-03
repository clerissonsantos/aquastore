@extends('home')

@section('content')
    <div class="row social-board">
        <div class="col-lg-12">
            <h3>Vendas</h3>
            <div class="hpanel">
                <div class="panel-body">
                    @livewire('venda-cabecalho', ['venda' => $venda])
                </div>
            </div>
        </div>
    </div>
    <div class="row social-board" id="vendas-itens">
        @include('vendas.venda-itens')
    </div>
    <script>
        $(document).on('click', '#adicionar-item', function(e) {
            e.preventDefault();

            var produto_id = $('#produto_id').val();
            var venda_id = $('#venda_id').val();
            var quantidade = $('#quantidade').val();
            var valorTotal = $('#total_final').val();

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
                    $('#quantidade').val(1);
                },
                error: function(xhr, status, error) {
                    alert('Erro ao adicionar item!');
                }
            });
        });

        $(document).on('click', '.deletar-item', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: "{{ route('vendas-item.deletar') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                },
                success: function(data) {
                    $('#vendas-itens').html(data);
                },
                error: function(xhr, status, error) {
                    alert('Erro ao deletar item!');
                }
            });
        });

        $(document).on('blur', '#percentual_desconto', function(e) {
            var totalItens = $('#total_itens').val();
            var percentualDesconto = parseFloat($(this).val().replace(".", "").replace(",", ".")) || 0;

            var desconto = (percentualDesconto / 100) * totalItens;
            var totalComDesconto = totalItens - desconto;

            $('#desconto_reais').empty().text(formatarReal(desconto));
            $('#desconto_valor').val(desconto);
            $('#total_final').val(totalComDesconto);
            $('#total_final_label').empty().text(formatarReal(totalComDesconto));
        });

        $(document).on('keyup, blur, change', '#quantidade', function(e) {
            var quantidade = parseFloat($(this).val() || 0);
            var preco = parseFloat($('#preco_venda').val().replace(".", "").replace(",", ".") || 0);
            var total = quantidade * preco;
            $('#total_item').val(formatarReal(total));
        });

        $(document).on('click', function() {
            $('.box-autocomplete').hide();
        });
    </script>
@endsection
