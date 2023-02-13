@extends('layouts.app')

@section('content')
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('categorias') }}" class="btn btn-primary">Voltar</a>
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
                                <br>
                                <input type="radio" id="credito" name="tipo_categoria" value="Credito" checked="checked">
                                <label for="inputCategoria"><span class="mx-2">Credito</span></label><br>
                                <input type="radio" id="debito" name="tipo_categoria" value="Debito">
                                <label for="inputCategoria"><span class="mx-2">Debito</span></label>
                                <br>
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
                                <br>
                                <input type="radio" id="credito" name="tipo_categoria" value="Credito" checked="checked">
                                <label for="inputCategoria"><span class="mx-2">Credito</span></label><br>
                                <input type="radio" id="debito" name="tipo_categoria" value="Debito">
                                <label for="inputCategoria"><span class="mx-2">Debito</span></label>
                                <br>
                            </div>
                            <button type="submit" class="btn btn-primary my-2">Cadastrar</button>
                        </form>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection