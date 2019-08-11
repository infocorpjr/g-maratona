@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mt-5 row">
            <div class="col-6">
                <h1>Meu perfil</h1>
            </div>
            <div class="col-6 text-right">
                <a href="{{route("home")}}" class="btn btn-dark subtitle">Voltar</a>
            </div>
        </div>
        @include('profile.create')
    </div>
@endsection