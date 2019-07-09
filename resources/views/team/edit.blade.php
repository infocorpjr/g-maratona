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