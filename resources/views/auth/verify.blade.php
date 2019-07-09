@extends('layouts.app')

@section('content')
    <div class="d-flex h-100 align-items-center">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-8 col-xl-8">
                <div class="card card-c">
                    <div class="card-header pt-5 pb-0">Por favor! Verifique seu endereço de email...</div>
                    <div class="card-body text-justify pt-3">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                Um novo link de verificação foi enviado para o seu endereço de e-mail.
                            </div>
                        @endif
                        Antes de prosseguir, verifique o link de confirmação no seu email <i class="fa fa-smile"></i>.
                        Se você não recebeu o email,
                        <a class="text-success" href="{{ route('verification.resend') }}">
                            posso te enviar novamente
                        </a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
