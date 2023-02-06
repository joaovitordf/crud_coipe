@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header"><a class="btn btn-primary" href="{{ url('pessoas/new') }}">Nova pessoa</a></div>

        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
        <h1 class="m-3"> Lista das pessoas </h1>
        <div class="m-3 table-responsive-xl">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Ativo</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $pessoas as $p )
                    <tr>
                        <th scope="row">{{ $p->id }}</th>
                        <td>{{ $p->nome }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->celular }}</td>
                        <td>{{ $p->cidade }}</td>
                        <td>{{ $p->estado }}</td>
                        <td>{{ $p->documento }}</td>
                        <td>{{ $p->tipo }}</td>
                        <td>{{ $p->ativo }}</td>
                        <td>
                            <a href="pessoas/{{ $p->id }}/edit" class="btn btn-success">Editar</a>
                        </td>
                        <td>
                            <form action="pessoas/delete/{{ $p->id }}" method="post">
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