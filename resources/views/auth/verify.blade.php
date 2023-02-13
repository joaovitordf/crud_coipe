@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifique seu endereco Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Um link de veriicação foi enviado para seu Email.') }}
                        </div>
                    @endif

                    {{ __('Para continuar verifique o link em seu endereço Email.') }}
                    {{ __('Se você não recebeu o email.') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('clique para enviar novamente') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
