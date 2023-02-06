@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('transacoes') }}">Voltar</a>
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
                            <label for="inputTransacao">Tipo de transacao:</label>
                            <input type="text" name="tipo_transacao" class="form-control" value="{{ $transacao->tipo_transacao }}">
                        </div>

                        <div class="form-group my-2">
                            <label for="inputTransacao">Pessoa:</label>
                            <input type="text" name="pessoa" class="form-control" value="{{ $transacao->pessoa }}">
                        </div>

                        <div class="form-group my-2">
                            <label for="inputTransacao">Categoria financeira:</label>
                            <input type="text" name="categoria_financeira" class="form-control" value="{{ $transacao->categoria_financeira }}">
                        </div>

                        <div class="form-group my-2">
                            <label for="inputTransacao">Saldo atual:</label>
                            <input type="text" name="saldo_atual" class="form-control" value="{{ $transacao->saldo_atual }}">
                        </div>

                        <div class="form-group my-2">
                            <label for="inputTransacao">Estado da transacao:</label>
                            <input type="text" name="estado_transacao" class="form-control" value="{{ $transacao->estado_transacao }}">
                        </div>
                        <button type="submit" class="btn btn-primary my-2">Atualizar</button>
                    </form>

                    @else

                    <form action="{{ url('transacoes/add') }}" method="post">
                        @csrf
                        <div class="form-group my-2">
                            <label for="inputTransacao">Tipo de transacao:</label>
                            <input type="text" name="tipo_transacao" class="form-control">
                        </div>

                        <div class="form-group my-2">
                            <label for="inputTransacao">Pessoa:</label>
                            <input type="text" name="pessoa" class="form-control">
                        </div>

                        <div class="form-group my-2">
                            <label for="inputTransacao">Categoria financeira:</label>
                            <input type="text" name="categoria_financeira" class="form-control">
                        </div>

                        <div class="form-group my-2">
                            <label for="inputTransacao">Saldo atual:</label>
                            <input type="text" name="saldo_atual" class="form-control">
                        </div>

                        <div class="form-group my-2">
                            <label for="inputTransacao">Estado da transacao:</label>
                            <input type="text" name="estado_transacao" class="form-control">
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