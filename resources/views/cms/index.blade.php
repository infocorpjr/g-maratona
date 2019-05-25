@extends('cms.layouts.default')

@section('content')
    {{-- TODO:Trocar Rotas para seus constrollers --}}
    <div class="container cms-index">
        <div class="columns">
            <div class="column col-3">
                <a href="{{ route('admin.index') }}">
                    <div class="cms-index--cards">
                        <div class="empty-icon">
                            <i class="icon icon-photo cms-index--icon cms-index--icon"></i>
                        </div>
                        <p class="empty-title h5">Mudar Capa</p>
                    </div>
                </a>
            </div>
            <div class="column col-3">
                <a href="{{ route('admin.index') }}">
                    <div class="cms-index--cards">
                        <div class="empty-icon">
                            <i class="icon icon-photo cms-index--icon"></i>
                        </div>
                        <p class="empty-title h5">Adicionar fotos ao slide inicial</p>
                    </div>
                </a>
            </div>
            <div class="column col-3">
                <a href="{{ route('admin.index') }}">
                    <div class="cms-index--cards">
                        <div class="empty-icon">
                            <i class="icon icon-plus cms-index--icon"></i>
                        </div>
                        <p class="empty-title h5">Adicionar evento</p>
                    </div>
                </a>
            </div>
            <div class="column col-3">
                <a href="{{ route('admin.index') }}">
                    <div class="cms-index--cards">
                        <div class="empty-icon">
                            <i class="icon icon-upload cms-index--icon"></i>
                        </div>
                        <p class="empty-title h5">Carregar arquivo</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection