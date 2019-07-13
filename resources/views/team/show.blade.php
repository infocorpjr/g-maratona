@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card card-a mt-5">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <i class="fa fa-4x fa-users"></i>
                    </div>
                    <div class="col">
                        <h2>{{$team->name}}</h2>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link" data-toggle="collapse"
                                data-target="#collapse"
                                aria-expanded="false" aria-controls="collapse">
                            <i class="fa fa-2x fa-edit"></i>
                        </button>
                    </div>
                    <div class="col-12">
                        {{$team->description}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Formulário para edição do recurso --}}
        <div class="mt-2">
            <div class="collapse {{ $errors->all() ? 'show' : '' }}" id="collapse">
                <div class="card">
                    <div class="card-header pr-2">
                        <div class="text-right">
                            <button class="btn btn-link" data-toggle="collapse"
                                    data-target="#collapse"
                                    aria-expanded="false" aria-controls="collapse">
                                <i class="fa fa-2x fa-angle-double-up text-white"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('team.edit')
                    </div>
                </div>
            </div>
        </div>

        {{-- Seção para exibição de maratona --}}
        <div class="card card-c mt-4">
            <div class="card-body">
               <div class="row align-items-center">
                   <div class="col-auto p-0">
                       <i class="fa fa-2x fa-sad-tear"></i>
                   </div>
                   <div class="col text-center p-0">
                       O período de inscrição ainda não está aberto ...
                   </div>
               </div>
            </div>
        </div>

    </div>
@endsection