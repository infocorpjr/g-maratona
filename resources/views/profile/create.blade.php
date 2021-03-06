<div class="card card-b">
    @include('message.store')
    <div class="card-body p-3">
        <form class="m-0" method="post" action="{{route('profile.update', $profile->id)}}"
              enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="input-group card-c mb-3">
                <div class="input-group-text bg-dark">Nome</div>
                <div class="mt-2 ml-2">
                    <h3>{{$profile->name}}</h3>
                </div>
            </div>
            @if ($errors->has('name'))
                <p class="text-danger blink-1">{{ $errors->first('name') }}</p>
            @endif

            <div class="input-group card-c mb-3">
                <div class="input-group-text bg-dark">RGA</div>
                <input id="rga_format" class="form-control rga_format" name="rga" value="{{$profile->rga}}"
                       placeholder="" >
            </div>
            @if ($errors->has('rga'))
                <p class="text-danger blink-1">{{ $errors->first('rga') }}</p>
            @endif

            <div class="input-group card-c mb-3">
                <div class="input-group-text bg-dark">CPF</div>
                <input id="cpf_format" class="form-control cpf_format" name="cpf" value="{{$profile->cpf}}"
                       placeholder="Ex: Time X"
                       v-mask="'###.###.###-##'">
            </div>
            @if ($errors->has('cpf'))
                <p class="text-danger blink-1">{{ $errors->first('cpf') }}</p>
            @endif
            <div class="input-group card-c mb-3">
                <div class="input-group-text bg-dark">Avatar</div>
            </div>
            <div class="input-group card-c mb-3">
                <div class="img_listras">
                    <img class="img-thumbnail" style="width: 50%" src="{{asset("/storage/".$profile->avatar_url)}}" alt="">
                </div>
            </div>
            <div class="input-group card-c mb-3">
                <label class="nput-group-text bg-dark upload_file" for="avatarImage">
                    Escolher Arquivo
                </label>
                <input class="form-control upload_file" name="avatarImage" type="file" id="avatarImage">
            </div>
            @if ($errors->has('avatar_url'))
                <p class="text-danger blink-1">{{ $errors->first('avatar_url') }}</p>
            @endif
            <div class="input-group card-c mb-3 mt-5" style="justify-content: flex-end;">
                <div class="input-group-text bg-dark">
                    <button class="btn btn-primary text-uppercase font-weight-bold" type="submit">Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>
