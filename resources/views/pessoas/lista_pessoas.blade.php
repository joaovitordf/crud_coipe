@extends('layouts.app')

@section('content')

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="card-header"><a class="btn btn-primary" href="{{ url('pessoas/new') }}"><i class="bi bi-plus text-center" style="display: inline-block; margin: -1px 2px 4px 2px; font-size: 20px;"></i></a></div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <h1 class="m-3 text-center"> CRUD Pessoas </h1>
            <div class="m-3 table-responsive-xl">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
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
                                <a href="pessoas/{{ $p->id }}/edit" class="btn btn-success"><i class="bi bi-pencil-square"></i></span></a>
                            </td>
                            <td>
                                <form action="pessoas/delete/{{ $p->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
@endsection