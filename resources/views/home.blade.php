@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Projeto Técnico') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h1 class="text-center"> CRUD </h1>
                    <div class="text-center">
                        <a class="text-center my-2 btn btn-primary" href="{{ url('pessoas') }}">CRUD Pessoas</a>
                        <br>
                        <a class="text-center my-2 btn btn-primary" href="{{ url('categorias') }}">CRUD Categorias</a>
                        <br>
                        <a class="text-center my-2 btn btn-primary" href="{{ url('transacoes') }}">CRUD Transações</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection