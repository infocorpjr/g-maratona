<div class="card card-b">
    <h3 class="p-3">Adicionar maratona</h3>
    @include('message.store')
    <div class="card-body p-3">
        <form class="m-0" method="post" action="{{route('marathon.store')}}">
            @csrf
            <div class="input-group card-c mb-3">
                <div class="input-group-text bg-dark">Título</div>
                <input class="form-control" name="title" value="{{old('title')}}"
                       placeholder="Ex: Maratona de programação {{date('Y')}}">
            </div>
            @if ($errors->has('title'))
                <p class="text-danger blink-1">{{ $errors->first('title') }}</p>
            @endif
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8 col-xl-8 pl-0">Período de inscrição</div>
            </div>
            <div class="row mb-2">
                <div class="col-12 col-md-4 col-lg-4 col-xl-4 pl-0 pr-0 pr-md-1 pr-lg-1 pr-xl-1">
                    <div class="input-group card-b">
                        <div class="input-group-text bg-dark">Início</div>
                        <input class="form-control date_time" name="starts" value="{{old('starts')}}"
                               placeholder="00/00/0000 00:00">
                    </div>
                    @if ($errors->has('starts'))
                        <p class="text-danger mt-3 blink-1">{{ $errors->first('starts') }}</p>
                    @endif
                </div>
                <div class="col-12 col-md-4 col-lg-4 col-xl-4 pl-0 pl-md-1 pl-xl-1 pl-xl-1 pr-0 pr-md-1 pr-lg-1 pr-xl-1">
                    <div class="input-group card-b">
                        <div class="input-group-text bg-dark">Término</div>
                        <input class="form-control date_time" name="ends" value="{{old('ends')}}"
                               placeholder="00/00/0000 00:00">
                    </div>
                    @if ($errors->has('ends'))
                        <p class="text-danger mt-3 blink-1">{{ $errors->first('ends') }}</p>
                    @endif
                </div>
                <div class="col-12 col-md-4 col-lg-4 col-xl-4 pl-0 pl-md-1 pl-xl-1 pl-xl-1 pr-0 pr-md-1 pr-lg-1 pr-xl-1">
                    <div class="input-group card-b">
                        <div class="input-group-text bg-dark">Data</div>
                        <input class="form-control date_time" name="date" value="{{old('date')}}"
                               placeholder="00/00/0000 00:00">
                    </div>
                    @if ($errors->has('date'))
                        <p class="text-danger mt-3 blink-1">{{ $errors->first('date') }}</p>
                    @endif
                </div>
            </div>
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
