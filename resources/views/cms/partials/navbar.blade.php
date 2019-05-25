<header class="navbar cms-navbar">
    <section class="navbar-section">
        <a href="{{ route('admin.') }}" class="btn btn-link"><h5>{{ env('APP_NAME') }}</h5></a>
        <a href="#" class="btn btn-link">Notícias</a>
        <a href="#" class="btn btn-link">Eventos</a>
        <a href="#" class="btn btn-link">Galerias</a>
        <a href="#" class="btn btn-link">Arquivos</a>
        {{-- TODO:Implementar contado de mensagens --}}
        <a href="#" class="btn btn-link badge" data-badge="">Mensagens</a>
    </section>
    <section class="navbar-center">
        <!-- centered logo or brand -->
    </section>
    <section class="navbar-section">
        <a href="#" class="btn btn-link">{{ Auth::user()->name }}</a>
        <a href="#" class="btn btn-error">Sair</a>
    </section>
</header>
<hr>