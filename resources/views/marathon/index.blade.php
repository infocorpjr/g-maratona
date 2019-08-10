@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mt-5 row">
            <div class="col-6">
                <h1>Todas as maratonas</h1>
            </div>
            <div class="col-6 text-right">
                <a href="{{route("home")}}" class="btn btn-dark subtitle">Voltar</a>
            </div>
        </div>
        @include('marathon.create')
        <div class="card card-c mt-5 mb-4">
            <div class="card-body p-2">
                <div class="row">
                    <div class="col-4">
                        <form>
                            <div class="input-group bg-dark card-c">
                                <div class="input-group-text p-0 pr-1 pl-4 bg-transparent ">Search</div>
                                <input class="form-control" type="text" name="q" placeholder="Título ou ano"
                                       value="{{request('q', '')}}">
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
        <div class="card card-a mt-5 mb-4">
            <div class="card-body pr-2 pl-2">
                @forelse ($marathons as $marathon)
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="row">
                                <div class="col-auto">
                                    <i class="fa fa-4x fa-laptop-code"></i>
                                </div>
                                <div class="col">
                                    <a class="text-white" href="{{route('marathon.show', $marathon->id)}}">
                                        <h2 class="m-0">
                                            <small>{{$marathon->title}}</small> - {{$marathon->date->format('Y')}}
                                        </h2>
                                        <h4 class="m-0">
                                            <i class="fa fa-calendar-day"></i> {{$marathon->date->format('d.m.Y H:i:s')}}
                                                ( {{$marathon->date->diffForHumans()}} )
                                        </h4>
                                        <code>
                                            #{{$marathon->id}} Updated {{$marathon->updated_at->format('d.m.Y H:i:s')}}
                                        </code>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-right">
                            <div class="text-right">
                                <p>Periodo de inscrição</p>
                                <p>
                                    Início {{$marathon->starts->diffForHumans()}} <br>
                                    Fim {{$marathon->ends->diffForHumans()}}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center">Que pena... Nenhuma maratona encontrada!</div>
                @endforelse
                <div class="d-flex justify-content-center">
                    {{ $marathons->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection