@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('transacoes') }}" class="btn btn-primary">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    @if( Request::is('*/edit'))
                    <form action="{{ url('transacoes/update') }}/{{ $transacao->id }}" method="post">
                        @csrf
                        <div class="form-group my-2">
                            <label for="inputTransacao">Status da transacao:</label>
                            <br>
                            <input type="radio" id="aberta" name="status_transacao" value="Aberta" checked="checked">
                            <label for="inputTransacao"><span class="mx-2">Aberta</span></label><br>
                            <input type="radio" id="liquidada" name="status_transacao" value="Liquidada">
                            <label for="inputTransacao"><span class="mx-2">Liquidada</span></label>
                            <br>
                        </div>

                        <div class="form-group my-2">
                            <label for="inputTransacao">Tipo da transacao:</label>
                            <br>
                            <input type="radio" id="credito" name="tipo_transacao" value="Credito" checked="checked">
                            <label for="inputTransacao"><span class="mx-2">Credito</span></label><br>
                            <input type="radio" id="debito" name="tipo_transacao" value="Debito">
                            <label for="inputTransacao"><span class="mx-2">Debito</span></label>
                            <br>
                        </div>

                        <div class="form-group my-2">
                            <label for="inputTransacao">Pessoa(id):</label>
                            <input type="text" name="pessoa_id" class="form-control" value="{{ $transacao->pessoa_id }}">
                        </div>

                        <div class="form-group my-2">
                            <label for="inputTransacao">Categoria financeira(id):</label>
                            <input type="text" name="categoria_id" class="form-control" value="{{ $transacao->categoria_id }}">
                        </div>

                        <div class="form-group my-2">
                            <label for="inputTransacao">Data de vencimento do titulo:</label>
                            <input type="date" name="data_vencimentoTitulo" class="form-control" value="{{ $transacao->data_vencimentoTitulo }}">
                        </div>

                        <div class="form-group my-2">
                            <label for="inputTransacao">Data da liquidacao:</label>
                            <input type="date" name="data_liquidacao" class="form-control" value="{{ $transacao->data_liquidacao }}">
                        </div>

                        <div class="form-group my-2">
                            <label for="inputTransacao">Saldo atual:</label>
                            <input type="text" name="saldo_atual" class="form-control" value="{{ $transacao->saldo_atual }}">
                        </div>

                        <button type="submit" class="btn btn-primary my-2">Atualizar</button>
                    </form>

                    @else

                    <form action="{{ url('transacoes/add') }}" method="post">
                        @csrf
                        <div class="form-group my-2">
                            <label for="inputTransacao">Status da transacao:</label>
                            <br>
                            <input type="radio" id="aberta" name="status_transacao" value="Aberta" checked="checked">
                            <label for="inputTransacao"><span class="mx-2">Aberta</span></label><br>
                            <input type="radio" id="liquidada" name="status_transacao" value="Liquidada">
                            <label for="inputTransacao"><span class="mx-2">Liquidada</span></label>
                            <br>
                        </div>

                        <div class="form-group my-2">
                            <label for="inputTransacao">Tipo da transacao:</label>
                            <br>
                            <input type="radio" id="credito" name="tipo_transacao" value="Credito" checked="checked">
                            <label for="inputTransacao"><span class="mx-2">Credito</span></label><br>
                            <input type="radio" id="debito" name="tipo_transacao" value="Debito">
                            <label for="inputTransacao"><span class="mx-2">Debito</span></label>
                            <br>
                        </div>

                        <div class="form-group my-2">
                            <label for="inputTransacao">Pessoa(id):</label>
                            <input type="text" name="pessoa_id" class="form-control">
                        </div>

                        <div class="form-group my-2">
                            <label for="inputTransacao">Categoria financeira(id):</label>
                            <input type="text" name="categoria_id" class="form-control">
                        </div>

                        <div class="form-group my-2">
                            <label for="inputTransacao">Saldo:</label>
                            <input type="text" name="saldo_atual" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="inputTransacao">Data de vencimento do titulo:</label>
                            <input type="date" name="data_vencimentoTitulo" class="form-control">
                        </div>
                        <div class="form-group my-2">
                            <label for="inputTransacao">Data da liquidacao:</label>
                            <input type="date" name="data_liquidacao" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary my-2">Cadastrar</button>
                    </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection