@extends('layouts.website')

<link href="{{ asset('css/events.css') }}" rel="stylesheet">

@section('title', 'Eventos')

@section('content')
    <div class="Corpo">
        <div class="Topo">
            <div class="LogoTopo">    
                <div class="TopoEsq">
                    <img src="images/maratona_logoo.png" border="0" width="85.7px" height="60px">
                </div>
                <div class="TopoDir">
                    <div class="Botao"><a href="">Login</a></div>
                </div>
            </div>
            <div class="TextoTopo">
                <div class="TextoEsq">
                    <div class="TextoEvento">
                            <div class="NomeEvento"><strong>Nome<br> do Evento</strong></div>
                            <div class="DataEvento">Sexta - feira, <strong>23.06.2018 as 18hrs <br> <br> Nome do local do evento Endereço</strong></div>
                    </div>
                </div>
                <div class="TextoDir">
                    <div class="MenuTopo">
                        <div class="MenuEsq">
                            <a href="">Home</a>
                        </div>
                        <div class="MenuDir">
                            <img src="assets/Imagens/Elipse 106.png" border="0" height="14px" width="14px">
                            <img class="Imagem" src="assets/Imagens/Elipse 107.png" border="0" height="8px" widht="8px">
                            <img src="assets/Imagens/Elipse 107.png" border="0" height="8px" widht="8px">
                            <img src="assets/Imagens/Elipse 107.png" border="0" height="8px" widht="8px">
                            <img src="assets/Imagens/Elipse 107.png" border="0" height="8px" widht="8px"> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="Inscrever">
                <a href="">Inscreva-se</a>
            </div>
        </div>
        <div class="Conteudo">
            <div class="TextoConteudo">
                <div class="LoremConteudo">
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. <br><br> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                </div>
            </div>
            <div class="Texto2Conteudo">
                <div class="TextoConteudoEsq">
                    <img src="assets/Imagens/Grupo de máscara 4.png" border="0 " width="668px"
                        height="409.46px">
                </div>
                <div class="TextoConteudoDir">
                    <div class="TextoConteudoDirTexto">
                        <div class="TituloConteudoDir"> Local <br> do Evento</div>
                        <div class="Cor">
                            <div class="CorAzul"></div>
                        </div>
                        <div class="NomeLocalConteudoDir"> <strong>Nome do local do evento</strong><br><br>Endereço </div>
                    </div>
                </div>
            </div>
            <div class="Patrocinadores">
                <div class="PatrocinadoresTitulo">Patrocinadores</div>
                <div class="CorLaranja"></div>
            </div>
            <div class="PatrocinadoresBanners">
                <div class="Banners">
                    <div class="SBC">
                        <img src="assets/Imagens/NoPath - Copia (25).png" border="0" width="97.01px"
                        height="145.01px">
                    </div>
                    <div class="Agenda">
                            <img src="assets/Imagens/NoPath - Copia (2).png" border="0" width="260.65px"
                            height="112.75px">
                    </div>
                    <div class="Icpc">
                            <img src="assets/Imagens/NoPath - Copia (26).png" border="0" width="164.14px"
                            height="76.76px">
                    </div>
                </div>
            </div>
            
        </div>
        <div class="Vaga">
            <div class="VagaEsq">
                <div class="VagaEsqTexto">Não deixe de garantir <br> a sua vaga</div>
                <div class="VagaEsqTudo">
                    
                    <div class="ColorAzulEscuro"></div>
                </div>
                </div>
            <div class="VagaDir">
                    <div class="VagaDirBotao"><a  class="aa" href="">Inscreva-se</a></div>
            </div>  
        </div>
        <div class="Footer">

        </div>
    </div>
@endsection