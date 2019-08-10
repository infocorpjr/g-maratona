@include('message.store')

<div class="mt-0">
    <div class="{{ $errors->all() ? 'show' : '' }}">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{route('role.change')}}">
                    @csrf
                    @method('put')
                    <h1>Escolha seu de usuário</h1>
                    {{-- TODO: Colocar um style decente nesses de role --}}
                    @if ($message = Session::get('update_unsuccessful'))
                        <span class="p-1 btn btn-warning text-uppercase">{{ $message }}</span>
                        <br>
                        <br>
                    @endif
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="is_participant"
                               value="is_participant" {{ $roles->is_participant ? "checked" : "" }}>
                        <label class="form-check-label" for="is_participant">
                            <h4>Participante</h4>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="is_voluntary"
                               value="is_voluntary" {{ $roles->is_voluntary ? "checked" : "" }}>
                        <label class="form-check-label" for="is_voluntary">
                            <h4>Voluntário</h4>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="is_technician"
                               value="is_technician" {{ $roles->is_technician ? "checked" : "" }}>
                        <label class="form-check-label" for="is_technician">
                            <h4>Técnico</h4>
                        </label>
                    </div>
                    <p class="mt-4">*Obs: Voluntários e técnicos depois de aprovados, não podem mudar de usuário</p>
                    <div class="input-group card-c mb-3" style="justify-content: flex-end">
                        <div class="input-group-text bg-dark">
                            <button class="btn btn-success text-uppercase font-weight-bold" type="submit">
                                Salvar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="mt-4">
    <div class="{{ $errors->all() ? 'show' : '' }}">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{route('role.update', $user->id)}}">
                    @csrf
                    @method('put')
                    {{-- TODO: Adicionar OLD --}}
                    {{-- PARTICIPANTE --}}
                    @if($roles->is_participant)
                        @if ($message = Session::get('update_unsuccessful'))
                            <span class="p-1 btn btn-warning text-uppercase">{{ $message }}</span>
                            <br>
                            <br>
                        @endif
                        {{-- NOME COMPLETO --}}
                        <div class="input-group card-c mb-3 mt-5">
                            <div class="input-group-text bg-dark">Nome Completo</div>
                            <input class="form-control" name="name" placeholder="...." value="{{$roleData->name}}"/>
                        </div>
                        @if ($errors->has('name'))
                            <p class="text-danger blink-1">{{ $errors->first('name') }}</p>
                        @endif
                        <div class="input-group card-c mb-3 mt-5">
                            <div class="input-group-text bg-dark">Curso</div>
                            <input class="form-control" name="course" placeholder="Ex: Ciência da computação"
                                   value="{{$roleData->course}}"/>
                        </div>
                        @if ($errors->has('course'))
                            <p class="text-danger blink-1">{{ $errors->first('course') }}</p>
                        @endif
                        <div class="input-group card-c mb-3 mt-5">
                            <div class="input-group-text bg-dark">RGA</div>
                            <input class="form-control rga_format" name="rga" placeholder="...."
                                   value="{{$roleData->rga}}"/>
                        </div>
                        @if ($errors->has('rga'))
                            <p class="text-danger blink-1">{{ $errors->first('rga') }}</p>
                        @endif
                        <div class="input-group card-c mb-3 mt-5">
                            <div class="input-group-text bg-dark">Data de Nascimento</div>
                            <input class="form-control date_date" name="birthday" placeholder="Ex: 27-05-2000"
                                   value="{{(new DateTime($roleData->birthday))->format("d-m-Y")}}">
                        </div>
                        @if ($errors->has('birthday'))
                            <p class="text-danger blink-1">{{ $errors->first('birthday') }}</p>
                        @endif
                        <div class="input-group card-c mb-3">
                            <div class="input-group card-c mb-3">
                                <div class="input-group-text bg-dark">Tamanho da camisa</div>
                                <div class="pl-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="shirt_size" id="PP"
                                               value="PP" {{ $roleData->shirt_size == "PP" ? "checked" : "" }}>
                                        <label class="form-check-label" for="PP">
                                            <h4>PP</h4>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="shirt_size" id="P"
                                               value="P" {{ $roleData->shirt_size == "P" ? "checked" : "" }}>
                                        <label class="form-check-label" for="P">
                                            <h4>P</h4>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="shirt_size" id="M"
                                               value="M" {{ $roleData->shirt_size == "M" ? "checked" : "" }}>
                                        <label class="form-check-label" for="M">
                                            <h4>M</h4>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="shirt_size" id="G"
                                               value="G" {{ $roleData->shirt_size == "G" ? "checked" : "" }}>
                                        <label class="form-check-label" for="G">
                                            <h4>G</h4>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="shirt_size" id="GG"
                                               value="GG" {{ $roleData->shirt_size == "GG" ? "checked" : "" }}>
                                        <label class="form-check-label" for="GG">
                                            <h4>GG</h4>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('shirt_size'))
                            <p class="text-danger blink-1">{{ $errors->first('shirt_size') }}</p>
                        @endif
                        <br>
                        <div class="input-group-text bg-dark" style="justify-content: flex-end">
                            <button class="btn btn-success text-uppercase font-weight-bold" type="submit">
                                Atualizar
                            </button>
                        </div>
                    @endif

                    @if($roles->is_voluntary)
                        Voluntario
                    @endif

                    @if($roles->is_technician)
                        Tecnico
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>