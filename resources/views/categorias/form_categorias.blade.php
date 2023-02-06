@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('categorias') }}">Voltar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    @if( Request::is('*/edit'))
                    <form action="{{ url('categorias/update') }}/{{ $categoria->id }}" method="post">
                        @csrf
                        <div class="form-group my-2">
                            <label for="inputCategoria">Nome da categoria:</label>
                            <input type="text" name="nome_categoria" class="form-control" value="{{ $categoria->nome_categoria }}">
                        </div>

                        <div class="form-group my-2">
                            <label for="inputCategoria">Tipo de categoria:</label>
                            <input type="text" name="tipo_categoria" class="form-control" value="{{ $categoria->tipo_categoria }}">
                        </div>
                        <button type="submit" class="btn btn-primary my-2">Atualizar</button>
                    </form>

                    @else

                    <form action="{{ url('categorias/add') }}" method="post">
                        @csrf
                        <div class="form-group my-2">
                            <label for="inputCategoria">Nome da categoria:</label>
                            <input type="text" name="nome_categoria" class="form-control">
                        </div>

                        <div class="form-group my-2">
                            <label for="inputCategoria">Tipo de categoria:</label>
                            <input type="text" name="tipo_categoria" class="form-control">
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