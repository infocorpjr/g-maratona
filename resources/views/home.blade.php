@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        @guest
                            Olá!
                        @else
                            Olá! { <b>{{ Auth::user()->name }}</b> } <br>
                            <i class="fa fa-envelope text-white-50"></i> {{ Auth::user()->email }}
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
            <div class="col-12 col-md-3">
                <a href="{{route('user.index')}}">
                    <div class="card card-a">
                        <div class="card-body">
                            <i class="fa fa-5x fa-user-friends text-white-50"></i>
                            <h5 class="text-center text-white">Usuário</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-3">
                <a href="{{route('user.index')}}">
                    <div class="card card-b">
                        <div class="card-body">
                            <i class="fa fa-5x fa-laptop-code text-white-50"></i>
                            <h5 class="text-center text-white">Maratona</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="{{route('user.index')}}">
                    <div class="card card-c">
                        <div class="card-body">
                            <i class="fa fa-5x fa-file-invoice text-white-50"></i>
                            <h5 class="text-center text-white">Artigo</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-8">

            </div>
        </div>
    </div>
@endsection
