@extends('layouts.app')

@section('content')
    <div class="container">
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
                @forelse ($participants as $participant)
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
                        @can('update', $participant->actor)
                            <div class="col-auto text-right">
                                
                                <code>Updated {{$participant->actor->updated_at->format('d.m.Y H:i:s')}}</code>
                            </div>
                        @endcan
                    </div>
                @empty
                    <div class="text-center">Que pena... Nenhum usuário encontrado!</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection