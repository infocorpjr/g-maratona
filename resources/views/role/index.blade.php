@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mt-5 row">
            <div class="col-6">
                <h1>Minhas Configurações</h1>
            </div>
            <div class="col-6 text-right">
                <a href="{{route("home")}}" class="btn btn-dark subtitle">Voltar</a>
            </div>
        </div>
        <div class="card card-b mt-5 mb-4">
            <div class="text-right pr-3 pt-2">
                <h1>{{$user->name}}</h1>
                <h2>{{$user->email}}</h2>
            </div>
        </div>
        @include('role.edit')
    </div>
    <br>
    <br>
@endsection