@include('message.store')

<form method="post" action="{{route('team.update', $team->id)}}">
    @csrf
    @method('put')
    <div class="input-group card-c mb-3">
        <div class="input-group-text bg-dark">Nome</div>
        <input class="form-control" name="name" value="{{$team->name}}"
               placeholder="Ex: Time X">
    </div>
    @if ($errors->has('name'))
        <p class="text-danger blink-1">{{ $errors->first('name') }}</p>
    @endif
    <div class="input-group card-c mb-3 mt-5">
        <div class="input-group-text bg-dark">Descrição</div>
        <textarea class="form-control" name="description" placeholder="">{{$team->description}}</textarea>
        <div class="input-group-text bg-dark">
            <button class="btn btn-success text-uppercase font-weight-bold" type="submit">Atualizar</button>
        </div>
    </div>
    @if ($errors->has('description'))
        <span class="text-danger blink-1">{{ $errors->first('description') }}</span>
    @endif
</form>

<div class="row">
    <div class="col-auto">
        <button id="remove" class="btn btn-outline-danger" style="display: inline-block"
                onclick="document.getElementById('cancel').style.display='inline-block';document.getElementById('confirm').style.display='inline-block';">
            Remover
        </button>
    </div>
    <div class="col-auto">
        <button id="cancel" class="btn btn-outline-light vibrate-3" style="display: none;"
                onclick="document.getElementById('confirm').style.display='none';this.style.display='none';">
            Não!
        </button>
    </div>
    <div class="col-auto">
        <button id="confirm" class="btn btn-outline-warning vibrate-3"
                style="display: none;animation-delay: 100ms"
                onclick="document.getElementById('delete').submit();">
            Sim, tenho certeza!
        </button>
    </div>
</div>

{{--Formulário para remover recurso--}}
<form id="delete" method="post" action="{{route('team.destroy', $team->id)}}">
    @csrf @method('delete')
    <input type="hidden" name="id" value="{{$team->id}}"/>
</form>