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
            <div class="card-header"><a class="btn btn-primary" href="{{ url('transacoes/new') }}"><i class="bi bi-plus text-center" style="display: inline-block; margin: 6px 2px 6px 2px; font-size: 20px;"></i></a></div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <h1 class="text-center"> CRUD Transações </h1>
            <div class="divFiltraStatus">
                <button onclick="filtraAberta()" class="btnFiltraStatus">Aberta</button>
                <button onclick="filtraLiquidada()" class="btnFiltraStatus">Liquidada</button>
            </div>
            <div>
                @php
                $categorias = App\Models\Categoria::all();
                @endphp
                <select class="text-center form_control selectCategorias" id="selectCategorias">
                    @php
                    $array_categorias = array();
                    foreach($categorias as $categoria) {
                    if (!in_array($categoria->nome_categoria, $array_categorias)) {
                    array_push($array_categorias, $categoria->nome_categoria);
                    }
                    }
                    @endphp

                    @foreach ($array_categorias as $categoria)
                    <option value="{{ $categoria }}">{{ $categoria }}</option>
                    @endforeach
                </select>
            </div>
            <div class="m-3 table-responsive-xl">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Status da transacao</th>
                            <th scope="col">Tipo da transacao</th>
                            <th scope="col">Pessoa</th>
                            <th scope="col">Categoria financeira</th>
                            <th scope="col">Saldo atual</th>
                            <th scope="col">Data de vencimento do titulo</th>
                            <th scope="col">Data da liquidacao</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Deletar</th>
                        </tr>
                    </thead>
                    <tbody id="tabela_transacoes">
                        @foreach( $transacoes as $t )
                        <tr>
                            <th scope="row">{{ $t->id }}</th>
                            <td>{{ $t->status_transacao }}</td>
                            <td>{{ $t->tipo_transacao }}</td>
                            <td>{{ $t->pessoas->nome }}</td>
                            <td>{{ $t->categorias->nome_categoria }}</td>
                            <td>{{ $t->saldo_atual }}</td>
                            <td>{{ $t->data_vencimentoTitulo }}</td>
                            <td>{{ $t->data_liquidacao }}</td>
                            <td>
                                <a href="transacoes/{{ $t->id }}/edit" class="btn btn-success"><i class="bi bi-pencil-square"></i></span></a>
                            </td>
                            <td>
                                <form action="transacoes/delete/{{ $t->id }}" method="post">
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

<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

<script>
    $(document).ready(() => {
        $('#selectCategorias').change((e) => {
            e.preventDefault()
            let dados = e.target.value

            $.ajax({
                type: 'get',
                url: "{{ route('filtro.categoria') }}" + "?categoria=" + dados,
                success: function(data) {
                    var tabela = '';
                    data.forEach(element => {
                        tabela += '<tr>';
                        tabela += '<th scope="row">' + element.id + '</th>';
                        tabela += '<td>' + element.status_transacao + '</td>';
                        tabela += '<td>' + element.tipo_transacao + '</td>';
                        tabela += '<td>' + element.pessoas.nome + '</td>';
                        tabela += '<td>' + element.categorias.nome_categoria + '</td>';
                        tabela += '<td>' + element.saldo_atual + '</td>';
                        tabela += '<td>' + element.data_vencimentoTitulo + '</td>';
                        tabela += '<td>' + element.data_liquidacao + '</td>';
                        tabela += '<td>';
                        tabela += '<a href="transacoes/' + element.id + '/edit" class="btn btn-success"><i class="bi bi-pencil-square"></i></a></td>';
                        tabela += '<td>';
                        tabela += '<form action="transacoes/delete/' + element.id + '" method="post">';
                        tabela += '@csrf';
                        tabela += '@method("delete")';
                        tabela += '<button class="btn btn-danger"><i class="bi bi-trash"></i></button></form></td></tr>';
                    });
                    document.getElementById('tabela_transacoes').innerHTML = tabela;
                }
            })
        })

    })

    function filtraAberta() {
        document.getElementById('tabela_transacoes').innerHTML =
            `
            @foreach( $transacoes as $t )
            @if($t->status_transacao == 'Aberta')
            <tr>
                <th scope="row">{{ $t->id }}</th>
                <td>{{ $t->status_transacao }}</td>
                <td>{{ $t->tipo_transacao }}</td>
                <td>{{ $t->pessoas->nome }}</td>
                <td>{{ $t->categorias->nome_categoria }}</td>
                <td>{{ $t->saldo_atual }}</td>
                <td>{{ $t->data_vencimentoTitulo }}</td>
                <td>{{ $t->data_liquidacao }}</td>
                <td>
                    <a href="transacoes/{{ $t->id }}/edit" class="btn btn-success"><i class="bi bi-pencil-square"></i></span></a>
                </td>
                <td>
                    <form action="transacoes/delete/{{ $t->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
        `;
    }

    function filtraLiquidada() {
        document.getElementById('tabela_transacoes').innerHTML =
            `
        @foreach( $transacoes as $t )
        @if($t->status_transacao == 'Liquidada')
        <tr>
            <th scope="row">{{ $t->id }}</th>
            <td>{{ $t->status_transacao }}</td>
            <td>{{ $t->tipo_transacao }}</td>
            <td>{{ $t->pessoas->nome }}</td>
            <td>{{ $t->categorias->nome_categoria }}</td>
            <td>{{ $t->saldo_atual }}</td>
            <td>{{ $t->data_vencimentoTitulo }}</td>
            <td>{{ $t->data_liquidacao }}</td>
            <td>
                <a href="transacoes/{{ $t->id }}/edit" class="btn btn-success"><i class="bi bi-pencil-square"></i></span></a>
            </td>
            <td>
                <form action="transacoes/delete/{{ $t->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
        @endif
        @endforeach
        `;
    }
</script>