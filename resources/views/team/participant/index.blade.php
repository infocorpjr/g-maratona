@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mt-5 row">
            <div class="col-6">
                <h1>Participantes</h1>
            </div>
            <div class="col-6 text-right">
                <a href="{{route("team.index")}}" class="btn btn-dark subtitle">Voltar</a>
            </div>
        </div>
        <div class="card card-b mt-5">
            <div class="card-body">
                <form method="get">
                    <div class="input-group card-c mb-3">
                        <div class="input-group-text bg-dark">Buscar participante</div>
                        <input class="form-control" name="q">
                        <div class="input-group-text bg-dark">
                            <button class="btn btn-sm btn-success" type="submit">Pesquisar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card card-c mt-5">
            <div class="card-body">
                @forelse ($participants as $key => $participant)
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="row">
                                <div class="col-auto">
                                    <i class="fa fa-4x fa-user-circle"></i>
                                </div>
                                <div class="col">
                                    {{$participant->name}} <br>
                                    <small class="">- {{$participant->email}}</small>
                                    <br>
                                    <code>Updated {{$participant->updated_at->format('d.m.Y')}}</code>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-right">
                            <div class="row">
                                <div class="col-auto p-1">
                                    <button class="btn btn-outline-primary"
                                            style="display: inline-block"
                                            onclick="document.getElementById('{{md5($key . 'cancel')}}').style.display='inline-block';document.getElementById('{{md5($key . 'confirm')}}').style.display='inline-block';">
                                        Adicionar
                                    </button>
                                </div>
                                <div class="col-auto p-1">
                                    <button id="{{md5($key . 'cancel')}}" class="btn btn-outline-light vibrate-3"
                                            style="display: none;"
                                            onclick="document.getElementById('{{md5($key . 'confirm')}}').style.display='none';this.style.display='none';">
                                        Não!
                                    </button>
                                </div>
                                <div class="col-auto p-1">
                                    <form method="post" action="{{route('team.participant.store', [$team])}}">
                                        @csrf()
                                        <input type="hidden" name="user_id" value="{{$participant->id}}">
                                        <button id="{{md5($key . 'confirm')}}" type="submit"
                                                class="btn btn-outline-success vibrate-3"
                                                style="display: none;animation-delay: 100ms">
                                            Sim, tenho certeza!
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <code>Updated {{$participant->actor->updated_at->format('d.m.Y H:i:s')}}</code>
                        </div>
                    </div>
                @empty
                    <div class="text-center">Que pena... Nenhum usuário encontrado!</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection