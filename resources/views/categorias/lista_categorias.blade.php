@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header"><a class="btn btn-primary" href="{{ url('categorias/new') }}">Nova Categoria</a></div>

        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
        <h1 class="m-3"> Lista das categorias </h1>
        <div class="m-3 table-responsive-xl">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome da categoria</th>
                        <th scope="col">Tipo da categoria</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $categorias as $c )
                    <tr>
                        <th scope="row">{{ $c->id }}</th>
                        <td>{{ $c->nome_categoria }}</td>
                        <td>{{ $c->tipo_categoria }}</td>
                        <td>
                            <a href="categorias/{{ $c->id }}/edit" class="btn btn-success">Editar</a>
                        </td>
                        <td>
                            <form action="categorias/delete/{{ $c->id }}" method="post">
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