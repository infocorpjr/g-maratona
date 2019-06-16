@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        @guest
                            Bem vindo!
                        @else
                            Bem vindo! { <b>{{ Auth::user()->name }}</b> } <br>
                            <i class="fa fa-envelope text-warning"></i> {{ Auth::user()->email }}
                        @endguest
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <div class="col-auto">
                <a href="{{route('user.index')}}">
                    <div class="card card">
                        <div class="card-body">
                            <i class="fa fa-5x fa-user-friends text-success"></i>
                            <div class="text-center text-success">Usuário</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-auto">
                <a href="{{route('user.index')}}">
                    <div class="card card">
                        <div class="card-body">
                            <i class="fa fa-5x fa-laptop-code text-info"></i>
                            <div class="text-center text-white">Maratona</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-auto">
                <a href="{{route('user.index')}}">
                    <div class="card card">
                        <div class="card-body">
                            <i class="fa fa-5x fa-tshirt text-success"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-auto">
                <a href="{{route('user.index')}}">
                    <div class="card card">
                        <div class="card-body">
                            <i class="fa fa-5x fa-file text-success"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
