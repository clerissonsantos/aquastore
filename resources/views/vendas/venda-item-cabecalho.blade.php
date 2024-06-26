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
        <label>Preço:</label>
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
<script>
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
