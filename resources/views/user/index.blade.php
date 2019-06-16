@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                @forelse ($users as $user)
                    <div class="card card-b mb-4">
                        <div class="card-body p-1">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <i class="fa fa-5x fa-user-circle text-white-50"></i>
                                </div>
                                <div class="col">
                                    {{$user->name}} <br>
                                    <small>{{$user->email}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty

                    Nenhum usuário encontrado ...

                @endforelse

            </div>
        </div>
    </div>
@endsection