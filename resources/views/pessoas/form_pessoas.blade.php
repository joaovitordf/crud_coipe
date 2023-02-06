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
                        <a href="{{ url('pessoas') }}">Voltar</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif


                        @if( Request::is('*/edit'))
                        <form action="{{ url('pessoas/update') }}/{{ $pessoa->id }}" method="post">
                            @csrf
                            <div class="form-group my-2">
                                <label for="inputPessoa">Nome:</label>
                                <input type="text" name="nome" class="form-control" value="{{ $pessoa->nome }}">
                            </div>

                            <div class="form-group my-2">
                                <label for="inputPessoa">E-mail:</label>
                                <input type="email" name="email" class="form-control" value="{{ $pessoa->email }}">
                            </div>

                            <div class="form-group my-2">
                                <label for="inputPessoa">Celular:</label>
                                <input type="text" name="celular" id="celular" class="form-control" value="{{ $pessoa->celular }}">
                            </div>

                            <div class="form-group my-2">
                                <label for="inputPessoa">Cidade:</label>
                                <input type="text" name="cidade" class="form-control" value="{{ $pessoa->cidade }}">
                            </div>

                            <div class="form-group my-2">
                                <label for="inputPessoa">Estado:</label>
                                <input type="text" name="estado" class="form-control" value="{{ $pessoa->estado }}">
                            </div>

                            <div class="form-group my-2">
                                <label for="inputPessoa">Documento:</label>
                                <br>
                                <select id="documento">
                                    <option value="cpf">CPF</option>
                                    <option value="cnpj">CNPJ</option>
                                </select>
                                <input type="text" name="documento" id="maskDocumento"  class="form-control" value="{{ $pessoa->documento }}">
                            </div>

                            <div class="form-group my-2">
                                <label for="inputPessoa">Tipo:</label>
                                <input type="text" name="tipo" class="form-control" value="{{ $pessoa->tipo }}">
                            </div>

                            <div class="form-group my-2">
                                <label for="inputPessoa">ativo:</label>
                                <input type="text" name="ativo" class="form-control" value="{{ $pessoa->ativo }}">
                            </div>

                            <button type="submit" class="btn btn-primary my-2">Atualizar</button>
                        </form>

                        @else

                        <form action="{{ url('pessoas/add') }}" method="post">
                            @csrf
                            <div class="form-group my-2">
                                <label for="inputPessoa">Nome:</label>
                                <input type="text" name="nome" class="form-control">
                            </div>

                            <div class="form-group my-2">
                                <label for="inputPessoa">E-mail:</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="form-group my-2">
                                <label for="inputPessoa">Celular:</label>
                                <input type="text" name="celular" id="celular" class="form-control">
                            </div>

                            <div class="form-group my-2">
                                <label for="inputPessoa">Cidade:</label>
                                <input type="text" name="cidade" class="form-control">
                            </div>

                            <div class="form-group my-2">
                                <label for="inputPessoa">Estado:</label>
                                <input type="text" name="estado" class="form-control">
                            </div>

                            <div class="form-group my-2">
                                <label for="inputPessoa">Documento:</label>
                                <br>
                                <select id="documento">
                                    <option value="cpf">CPF</option>
                                    <option value="cnpj">CNPJ</option>
                                </select>
                                <input type="text" name="documento" id="maskDocumento" class="form-control">
                            </div>

                            <div class="form-group my-2">
                                <label for="inputPessoa">Tipo:</label>
                                <input type="text" name="tipo" class="form-control">
                            </div>

                            <div class="form-group my-2">
                                <label for="inputPessoa">Ativo:</label>
                                <input type="text" name="ativo" class="form-control">
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

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        let select = document.querySelector('#documento');
        $('#celular').mask('(00) 00000-0000');
        $('#maskDocumento').mask('000.000.000-00', {
            reverse: true
        });
        select.addEventListener('change', () => {
            if (select.value == 'cnpj') {
                $('#maskDocumento').mask('00.000.000/0000-00', {
                    reverse: true
                });
            } else {
                $('#maskDocumento').mask('000.000.000-00', {
                    reverse: true
                });
            }
        });
    });
</script>