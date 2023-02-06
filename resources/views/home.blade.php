@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1> Seja bem vindo </h1>
                    <a class="my-2 btn btn-primary" href="{{ url('pessoas') }}">Lista das pessoas</a>
                    <br>
                    <a class="my-2 btn btn-primary" href="{{ url('categorias') }}">Lista das categorias</a>
                    <br>
                    <a class="my-2 btn btn-primary" href="{{ url('transacoes') }}">Lista das transacoes</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
