@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mt-5">Meus times</h1>
        <div class="card card-b mt-5 mb-4">
            <div class="card-body p-2">
                <div class="row justify-content-between">
                    <div class="col-5">
                        <form method="get">
                            <div class="input-group bg-dark card-c">
                                <div class="input-group-text p-0 pr-1 pl-4 bg-transparent">Search</div>
                                <input class="form-control" type="text" name="q" placeholder="Nome do time">
                                <div class="input-group-text p-0 bg-transparent">
                                    <button class="btn" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                data-target="#collapse"
                                aria-expanded="false" aria-controls="collapse">
                            <i class="fa fa-2x fa-plus-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-0">
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
                        @include('team.create')
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-3">
            <div class="row">
                @forelse($teams as $team)
                    <div class="col-12 col-md-4 col-lg-4 col-xl-4 p-1">
                        <a href="{{route('team.show', $team->id)}}">
                            <div class="card card-c">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <i class="fa fa-3x fa-users"></i>
                                        </div>
                                        <div class="col text-white">{{$team->name}}</div>
                                        <div class="col-12 pt-0 pb-0">
                                            <small class="text-white">
                                                Criado em {{$team->created_at->format('d.m.Y')}}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        @if(request()->has('q'))
                            <i class="fa fa-2x fa-sad-cry"></i> Ops, não encontrei nada ...
                        @else
                            <i class="fa fa-2x fa-sad-cry"></i> Você ainda não criou nenhum time ...
                        @endif
                    </div>
                @endforelse

                <div class="d-flex justify-content-center">
                    {{ $teams->links() }}
                </div>

            </div>
        </div>

    </div>
@endsection