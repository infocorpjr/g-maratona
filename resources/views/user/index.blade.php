@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <i class="fa fa-2x fa-user-circle text-warning"></i>
                                    </div>
                                    <div class="col">
                                        {{$user->name}} <br>
                                        <small>{{$user->email}}</small>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-auto">
                                        <form class="form">
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="{{md5($user->id . 'a')}}" name="customRadioInline1"
                                                       class="custom-control-input">
                                                <label class="custom-control-label" for="{{md5($user->id . 'a')}}">
                                                    Toggle this custom radio
                                                </label>
                                            </div>
                                            <br>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="{{md5($user->id . 'b')}}" name="customRadioInline1"
                                                       class="custom-control-input">
                                                <label class="custom-control-label" for="{{md5($user->id . 'b')}}">Or toggle
                                                    this other custom radio</label>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa fa-2x fa-trash text-danger"></i>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th class="text-center text-warning" colspan="2">
                                Nenhum usuário encontrado ...
                            </th>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection