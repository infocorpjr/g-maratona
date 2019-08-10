@extends('layouts.app')

@section('content')
    <div class="text-center mt-5 erro_title">
        <h1>Forbidden! Você não tem permissão de acesso.</h1>
        <button type="button" class="btn btn-outline-secondary"><a href="{{ route('home') }}">Home</a></button>
    </div>
@endsection