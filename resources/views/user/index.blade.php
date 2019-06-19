@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5">Usuários</h1>
        <div class="card card-c mt-5 mb-4">
            <div class="card-body p-2">
                <div class="row">
                    <div class="col-4">
                        <form>
                            <div class="input-group bg-dark card-c">
                                <div class="input-group-text p-0 pr-1 pl-4 bg-transparent">Search</div>
                                <input class="form-control" type="text" name="q" placeholder="{name, email}">
                                <div class="input-group-text p-0 bg-transparent">
                                    <button class="btn" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-b mt-5 mb-4">
            <div class="card-body pr-2 pl-2">
                @forelse ($users as $user)
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="row">
                                <div class="col-auto">
                                    <i class="fa fa-4x fa-user-circle"></i>
                                </div>
                                <div class="col">
                                    {{$user->name}} <br>
                                    <small class="">- {{$user->email}}</small> <br>
                                    <code>Updated {{$user->updated_at->format('d.m.Y H:i:s')}}</code>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-dark dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                    @if($user->actor)
                                        @if($user->actor->is_administrator)
                                            Administrador
                                        @elseif($user->actor->is_technician)
                                            Técnico
                                        @elseif($user->actor->is_voluntary)
                                            Voluntário
                                        @elseif($user->actor->is_participant)
                                            Participante
                                        @else
                                            Não classificado
                                        @endif
                                    @else
                                        Não classificado
                                    @endif
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    @if($user->actor)
                                        <form method="post"
                                              action="{{route('user.actor.update', [$user->id, $user->actor->id])}}">
                                            @csrf
                                            {{method_field('put')}}
                                            @if(!$user->actor->is_administrator)
                                                <button class="dropdown-item" type="submit" name="actor"
                                                        value="is_administrator">
                                                    Administrador
                                                </button>
                                            @endif
                                            @if(!$user->actor->is_technician)
                                                <button class="dropdown-item" type="submit" name="actor"
                                                        value="is_technician">
                                                    Técnico
                                                </button>
                                            @endif
                                            @if(!$user->actor->is_voluntary)
                                                <button class="dropdown-item" type="submit" name="actor"
                                                        value="is_voluntary">
                                                    Voluntário
                                                </button>
                                            @endif
                                            @if(!$user->actor->is_participant)
                                                <button class="dropdown-item" type="submit" name="actor"
                                                        value="is_participant">
                                                    Participante
                                                </button>
                                            @endif
                                        </form>
                                    @endif
                                </div>
                            </div>
                            <code>Updated {{$user->actor->updated_at->format('d.m.Y H:i:s')}}</code>
                        </div>
                    </div>
                @empty
                    <div class="text-center">Que pena... Nenhum usuário encontrado!</div>
                @endforelse

                <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection