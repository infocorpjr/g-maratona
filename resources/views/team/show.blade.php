@extends('layouts.app')

@section('content')
    @includeWhen($errors->any(), 'message.errors')
    <div class="container mb-5">

        <div class="mt-5 row">
            <div class="col-6">
                <h1>Time</h1>
            </div>
            <div class="col-6 text-right">
                <a href="{{route("team.index")}}" class="btn btn-dark subtitle">Voltar</a>
            </div>
        </div>

        @if($marathons)
            <h1 class="mt-5">Evento(s) com período de inscrição abertos</h1>
        @endif

        {{-- Seção para exibição de maratona --}}
        @forelse($marathons as $marathon)
            <div class="card card-c mt-4 border-success">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-12 p-0">
                            Aberto o período de inscrição para
                        </div>
                        <div class="col-auto p-0">
                            <h1 class="m-0 d-inline-block pr-2">{{$marathon->title}}.</h1>
                            { A inscrição encerra {{$marathon->ends->diffForHumans()}} }
                        </div>
                        <div class="col-auto p-0">
                            <form method="post" action="{{route('marathon.team.store', $marathon->id)}}">
                                @csrf()
                                <input type="hidden" name="team_id" value="{{$team->id}}">
                                @if(!$team->marathon_id)
                                    <button class="btn btn-warning text-uppercase">
                                        Fazer inscrição
                                    </button>
                                @endif
                            </form>
                        </div>
                        <div class="col-12 p-0">
                            - O evento será realizado em {{$marathon->date->format('d/m/Y')}}
                            às {{$marathon->date->format('H:i')}}
                            <br/>
                            {{$marathon->description}}
                        </div>
                    </div>
                </div>
            </div>
        @empty
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
        @endforelse

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
                        <div class="row">
                            <div class="col-6">{{$team->description}}</div>
                            <div class="col-6 text-right">
                                {{-- TODO: Adicionar Participantes --}}
                                <button class="btn btn-dark">
                                    Adicionar Participantes
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto p-0">
                                @if($team->marathon_id)
                                    <div class="text-white">
                                        <i class="fa fa-info-circle"></i> Este time está matriculado em
                                        { {{$team->marathon->title}} }
                                    </div>
                                @endif
                            </div>
                            <div class="col-auto p-0">
                                @if($team->marathon_id)
                                    <form method="post"
                                          action="{{route('marathon.team.destroy', [$team->marathon->id, $team->id])}}">
                                        @csrf()
                                        @method('delete')
                                        <input type="hidden" name="team_id" value="{{$team->id}}">

                                        <button class="btn btn-warning text-uppercase">
                                            Desfazer inscrição
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
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
    </div>
@endsection