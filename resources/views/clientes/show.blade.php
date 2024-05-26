
@extends('home')

@section('content')
    <div>
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <form method="post" action="{{ route('clientes.salvar') }}" class="form-horizontal">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ $cliente->id ?? null }}">
                                    {{ csrf_field() }}
                                    <div class="col-md-4">
                                        <label>Nome*: </label>
                                        <input type="text" class="form-control" required name="nome" value="{{ $cliente->nome ?? null }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label>CPF: </label>
                                        <input type="text" maxlength="11" oninput="validateNumberInput(this)" class="form-control" name="cpf" value="{{ $cliente->cpf ?? null }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Telefone: </label>
                                        <input type="text" maxlength="11" class="form-control" oninput="validateNumberInput(this)" name="telefone" value="{{ $cliente->telefone ?? null }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label>E-mail: </label>
                                        <input type="text" class="form-control" name="email" value="{{ $cliente->email ?? null }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label>Data nascimento: </label>
                                        <input type="date" class="form-control" name="data_nascimento" value="{{ $cliente->data_nascimento ?? null }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label>CEP: </label>
                                        <input type="text" class="form-control" maxlength="8" oninput="validateNumberInput(this)" name="cep" value="{{ $cliente->cep ?? null }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Endereço: </label>
                                        <input type="text" class="form-control" name="logradouro" value="{{ $cliente->logradouro ?? null }}">
                                    </div>
                                    <div class="col-md-1">
                                        <label>Número: </label>
                                        <input type="text" class="form-control" oninput="validateNumberInput(this)" name="numero" value="{{ $cliente->numero ?? null }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label>Cidade: </label>
                                        <input type="text" class="form-control" name="cidade" value="{{ $cliente->cidade ?? null }}">
                                    </div>
                                    <div class="col-md-1">
                                        <label>UF: </label>
                                        <input type="text" class="form-control" name="uf" value="{{ $cliente->uf ?? null }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <a href="{{ route('clientes.index') }}" class="btn btn-default">
                                            <i class="fa fa-arrow-left"></i> Voltar
                                        </a>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-save"></i> Salvar
                                        </button>
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
