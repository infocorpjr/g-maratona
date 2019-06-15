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
                            Bem vindo! {{ Auth::user()->name }}
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
                        dpoaksdpoka
                    </div>
                    <div class="card-body">
                        apksdpsa
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card">
                    <div class="card-body">
                        <i class="fa fa-8x fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
