<div class="card card-b">
    <h3 class="p-3">Adicionar time</h3>
    @include('message.store')
    <div class="card-body p-3">
        <form class="m-0" method="post" action="{{route('team.store')}}">
            @csrf
            <div class="input-group card-c mb-3">
                <div class="input-group-text bg-dark">Nome</div>
                <input class="form-control" name="name" value="{{old('name')}}"
                       placeholder="Ex: Time X">
            </div>
            @if ($errors->has('name'))
                <p class="text-danger blink-1">{{ $errors->first('name') }}</p>
            @endif
            <div class="input-group card-c mb-3 mt-5">
                <div class="input-group-text bg-dark">Descrição</div>
                <textarea class="form-control" name="description" placeholder="">{{old('description')}}</textarea>
                <div class="input-group-text bg-dark">
                    <button class="btn btn-primary text-uppercase font-weight-bold" type="submit">Salvar</button>
                </div>
            </div>
            @if ($errors->has('description'))
                <span class="text-danger blink-1">{{ $errors->first('description') }}</span>
            @endif
        </form>
    </div>
</div>
