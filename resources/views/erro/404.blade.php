@extends('layouts.app')

@section('content')
    <div class="text-center mt-5 erro_title">
        <h1>Erro 404! Pagina não encontrada.</h1>
        <button type="button" class="btn btn-outline-secondary"><a href="{{ route('home') }}">Home</a></button>
    </div>
@endsection