@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card card-b mt-5">
            <div class="card-body p-1">
                <div class="row">
                    <div class="col-auto">
                        <a class="btn btn-outline-dark" href="{{route('marathon.show', $marathon->id)}}">
                            <i class="fa fa-arrow-alt-circle-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-b mt-5">
            <h3 class="p-3">Editando {{$marathon->title}}</h3>
            @include('message.update')
            <div class="card-body p-3">
                <form class="m-0" method="post" action="{{route('marathon.update', $marathon->id)}}">
                    @csrf @method('put')
                    <div class="input-group card-c mb-3">
                        <div class="input-group-text bg-dark">Título</div>
                        <input class="form-control" name="title" value="{{$marathon->title}}"
                               placeholder="Ex: Maratona de programação {{date('Y')}}">
                    </div>
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <div class="row">
                        <div class="col-12 col-md-8 col-lg-8 col-xl-8 pl-0">Período de inscrição</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12 col-md-4 col-lg-4 col-xl-4 pl-0 pr-0 pr-md-1 pr-lg-1 pr-xl-1">
                            <div class="input-group card-b">
                                <div class="input-group-text bg-dark">Início</div>
                                <input class="form-control date_time" name="starts"
                                       value="{{$marathon->starts->format('d/m/Y H:i')}}"
                                       placeholder="00/00/0000 00:00">
                            </div>
                            @if ($errors->has('starts'))
                                <span class="text-danger">{{ $errors->first('starts') }}</span>
                            @endif
                        </div>
                        <div class="col-12 col-md-4 col-lg-4 col-xl-4 pl-0 pl-md-1 pl-xl-1 pl-xl-1 pr-0 pr-md-1 pr-lg-1 pr-xl-1">
                            <div class="input-group card-b">
                                <div class="input-group-text bg-dark">Término</div>
                                <input class="form-control date_time" name="ends"
                                       value="{{$marathon->ends->format('d/m/Y H:i')}}"
                                       placeholder="00/00/0000 00:00">
                            </div>
                            @if ($errors->has('ends'))
                                <span class="text-danger">{{ $errors->first('ends') }}</span>
                            @endif
                        </div>
                        <div class="col-12 col-md-4 col-lg-4 col-xl-4 pl-0 pl-md-1 pl-xl-1 pl-xl-1 pr-0 pr-md-1 pr-lg-1 pr-xl-1">
                            <div class="input-group card-b">
                                <div class="input-group-text bg-dark">Data</div>
                                <input class="form-control date_time" name="date"
                                       value="{{$marathon->date->format('d/m/Y H:i')}}"
                                       placeholder="00/00/0000 00:00">
                            </div>
                            @if ($errors->has('date'))
                                <span class="text-danger">{{ $errors->first('date') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="input-group card-c mb-3 mt-5">
                        <div class="input-group-text bg-dark">Descrição</div>
                        <textarea class="form-control" name="description"
                                  placeholder="">{{$marathon->description}}</textarea>
                        <div class="input-group-text bg-dark">
                            <button class="btn btn-success text-uppercase font-weight-bold" type="submit">
                                Atualizar
                            </button>
                        </div>
                    </div>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </form>
            </div>
        </div>

        <div class="card card-b mt-5">
            <div class="card-body p-1">
                <div class="row">
                    <div class="col-auto">
                        <button id="remove" class="btn btn-outline-danger" style="display: inline-block"
                                onclick="document.getElementById('cancel').style.display='inline-block';document.getElementById('confirm').style.display='inline-block';">
                            Remover
                        </button>
                    </div>
                    <div class="col-auto">
                        <button id="cancel" class="btn" style="display: none;"
                                onclick="document.getElementById('confirm').style.display='none';this.style.display='none';">
                            Não!
                        </button>
                    </div>
                    <div class="col-auto">
                        <button id="confirm" class="btn btn-outline-warning" style="display: none;"
                                onclick="document.getElementById('delete').submit();">
                            Sim, tenho certeza!
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Formulário para remover recurso--}}
    <form id="delete" method="post" action="{{route('marathon.destroy', $marathon->id)}}">
        @csrf @method('delete')
        <input type="hidden" name="id" value="{{$marathon->id}}"/>
    </form>
@endsection