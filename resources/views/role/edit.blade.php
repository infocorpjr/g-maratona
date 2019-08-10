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

                    @if($roles->is_participant)
                        <div class="input-group card-c mb-3">
                            <div class="input-group-text bg-dark">Nome</div>
                            <input class="form-control" name="name" value=""
                                   placeholder="Ex: Time X">
                        </div>
                        @if ($errors->has('name'))
                            <p class="text-danger blink-1">{{ $errors->first('name') }}</p>
                        @endif
                        <div class="input-group card-c mb-3 mt-5">
                            <div class="input-group-text bg-dark">Descrição</div>
                            <textarea class="form-control" name="description" placeholder=""></textarea>
                            <div class="input-group-text bg-dark">
                                <button class="btn btn-success text-uppercase font-weight-bold" type="submit">
                                    Atualizar
                                </button>
                            </div>
                        </div>
                        @if ($errors->has('description'))
                            <span class="text-danger blink-1">{{ $errors->first('description') }}</span>
                        @endif
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