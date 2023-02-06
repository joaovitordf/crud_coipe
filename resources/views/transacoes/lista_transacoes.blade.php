@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header"><a class="btn btn-primary" href="{{ url('transacoes/new') }}">Nova Transacao</a></div>

        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
        <h1 class="m-3"> Lista das transacoes </h1>
        <div class="m-3 table-responsive-xl">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipo de transacao</th>
                        <th scope="col">Pessoa</th>
                        <th scope="col">Categoria financeira</th>
                        <th scope="col">Saldo atual</th>
                        <th scope="col">Estado da transacao</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $transacoes as $t )
                    <tr>
                        <th scope="row">{{ $t->id }}</th>
                        <td>{{ $t->tipo_transacao }}</td>
                        <td>{{ $t->pessoa }}</td>
                        <td>{{ $t->categoria_financeira }}</td>
                        <td>{{ $t->saldo_atual }}</td>
                        <td>{{ $t->estado_transacao }}</td>
                        <td>
                            <a href="transacoes/{{ $t->id }}/edit" class="btn btn-success">Editar</a>
                        </td>
                        <td>
                            <form action="transacoes/delete/{{ $t->id }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection