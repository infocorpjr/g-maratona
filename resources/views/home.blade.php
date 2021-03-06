@extends('layouts.app')

@section('content')
    <div class="h-100 d-flex align-items-center">
        <div class="w-100">
            <div class="container">
                <h1 class="pl-2">Seja bem vindo!<br>{{ Auth::user()->name }}</h1>
                <div class="row">
                    @can('index', \App\User::class)
                        <div class="col-12 col-md-6 col-lg-3 col-xl-3">
                            <a href="{{route('user.index')}}">
                                <div class="card card-box card-a">
                                    <div class="card-body">
                                        <i class="fa fa-5x fa-user-friends text-white-50"></i>
                                        <h5 class="text-center text-white">Usuário</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 col-xl-3">
                            <a href="{{route('marathon.index')}}">
                                <div class="card card-box card-b">
                                    <div class="card-body">
                                        <i class="fa fa-5x fa-laptop-code text-white-50"></i>
                                        <h5 class="text-center text-white">Maratona</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3 col-xl-3">
                            <a href="{{route('user.index')}}">
                                <div class="card card-box card-c">
                                    <div class="card-body">
                                        <i class="fa fa-5x fa-file-invoice text-white-50"></i>
                                        <h5 class="text-center text-white">Artigo</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endcan
                    <div class="col-12 col-md-6 col-lg-3 col-xl-3">
                        <a href="{{route('team.index')}}">
                            <div class="card card-box card-b">
                                <div class="card-body">
                                    <i class="fa fa-5x fa-users text-white-50"></i>
                                    <h5 class="text-center text-white">Meus times</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 col-xl-3">
                        <a href="{{route('profile.index')}}">
                            <div class="card card-box card-b">
                                <div class="card-body">
                                    <i class="fa fa-5x fa-id-card text-white-50"></i>
                                    <h5 class="text-center text-white">Perfil</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-8"></div>
                    <div class="col-auto"></div>
                    <div class="col"></div>
                </div>
                <h3 class="pl-2 text-uppercase">Para seu próximo evento</h3>
                @if($next)
                    <div class="row">
                        <!-- Participantes -->
                        <div class="col-12 col-md-auto col-lg-auto col-xl-auto">
                            <div class="card card-box card-a">
                                <div class="card-body pt-4 pb-0">
                                    <span class="card-body-number text-white mb-0">{{$next->teams->count()}}</span>
                                    <div class="row align-items-center">
                                        <div class="col col-md-auto col-lg-auto col-xl-auto">
                                            <h4 class="text-left text-white">Times<br>cadastrados</h4>
                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="80"
                                                 viewBox="0 0 100 93">
                                                <g transform="translate(0 -17.101)">
                                                    <g transform="translate(0 17.101)">
                                                        <g transform="translate(0 0)">
                                                            <path class="a"
                                                                  d="M100,85.473V55.41a6.584,6.584,0,0,0-6.576-6.576H52.234v-.772a4.217,4.217,0,0,0-.955-2.676,4.226,4.226,0,0,0,.883-1.893,5.526,5.526,0,0,0,2.05-7.457,5.511,5.511,0,0,0,.694-2.672A5.569,5.569,0,0,0,52.2,28.6a5.438,5.438,0,0,0,.031-.584,5.583,5.583,0,0,0-4.81-5.522,5.564,5.564,0,0,0-4.773-2.724,5.111,5.111,0,0,0-.768.059,6.224,6.224,0,0,0-3.909-1.395c-.19,0-.38.01-.573.029a6.849,6.849,0,0,0-8.206,0c-.193-.019-.384-.029-.573-.029A6.192,6.192,0,0,0,24.734,19.8a5.57,5.57,0,0,0-4.225,2.7A5.582,5.582,0,0,0,15.7,28.02a5.441,5.441,0,0,0,.031.584,5.569,5.569,0,0,0-2.7,4.761,5.509,5.509,0,0,0,.694,2.672,5.526,5.526,0,0,0,2.05,7.457,4.2,4.2,0,0,0,.38,1.116,4.232,4.232,0,0,0-1.788,3.452v2.672A4.243,4.243,0,0,0,18.6,54.972h.7l.114.711a6.909,6.909,0,0,0,2.4,4.217l.57.475v4.419a1.1,1.1,0,0,1-.781,1.057l-11.711,3.6a6.876,6.876,0,0,0-4.878,6.6V95.494A8.2,8.2,0,0,0,6.8,100.609H3.236A3.24,3.24,0,0,0,0,103.845v3.34a3.24,3.24,0,0,0,3.236,3.236H96.764A3.24,3.24,0,0,0,100,107.185v-3.34a3.24,3.24,0,0,0-3.236-3.236h-17l-1.141-8.56h14.8A6.584,6.584,0,0,0,100,85.473ZM18.6,51.84a1.108,1.108,0,0,1-1.106-1.106V48.062a1.1,1.1,0,0,1,.545-.948L18.8,51.84Zm.231-9.077c.006-.047.012-.095.016-.143A1.566,1.566,0,0,0,17.8,41a2.438,2.438,0,0,1-1.646-2.292,2.408,2.408,0,0,1,.638-1.624,1.566,1.566,0,0,0,0-2.1,2.407,2.407,0,0,1-.638-1.624,2.439,2.439,0,0,1,1.809-2.343,1.566,1.566,0,0,0,1.044-2.095,2.421,2.421,0,0,1-.181-.907,2.446,2.446,0,0,1,2.386-2.442c.067.009.134.016.2.021a1.566,1.566,0,0,0,1.572-1.048,2.439,2.439,0,0,1,2.241-1.645l.091,0a1.569,1.569,0,0,0,1.124-.448,3.04,3.04,0,0,1,2.86-.81,1.567,1.567,0,0,0,1.415-.386,3.73,3.73,0,0,1,5.154,0,1.566,1.566,0,0,0,1.415.386,3.016,3.016,0,0,1,2.977.949,1.566,1.566,0,0,0,1.66.432,2.249,2.249,0,0,1,.724-.128,2.438,2.438,0,0,1,2.292,1.646A1.565,1.565,0,0,0,46.515,25.6c.064,0,.127-.011.2-.021a2.43,2.43,0,0,1,2.205,3.349,1.566,1.566,0,0,0,1.044,2.1,2.44,2.44,0,0,1,1.809,2.343,2.408,2.408,0,0,1-.638,1.624,1.566,1.566,0,0,0,0,2.1,2.407,2.407,0,0,1,.638,1.624A2.437,2.437,0,0,1,50.129,41a1.566,1.566,0,0,0-1.044,1.62c0,.048.01.1.017.143a1.1,1.1,0,0,1-.824,1.013c-.05.013-1.548.047-1.548.047l-.9-5.4a1.567,1.567,0,0,0-1.661-1.3c-.073.005-.144.014-.215.024h-.009a2.439,2.439,0,0,1-1.992-1.1,1.566,1.566,0,0,0-2.61,0,2.437,2.437,0,0,1-4.071,0,1.566,1.566,0,0,0-2.61,0,2.437,2.437,0,0,1-4.071,0,1.566,1.566,0,0,0-2.61,0,2.44,2.44,0,0,1-1.992,1.1h-.009c-.071-.01-.143-.019-.215-.024a1.566,1.566,0,0,0-1.661,1.3l-.9,5.4s-1.5-.034-1.547-.047A1.1,1.1,0,0,1,18.832,42.764Zm30.27,5.3v.772h-.82l.275-1.721A1.1,1.1,0,0,1,49.1,48.062ZM21.186,46.955H21.4A2.893,2.893,0,0,0,24.26,44.53l.725-4.353a5.549,5.549,0,0,0,2.3-1.016,5.568,5.568,0,0,0,6.68,0,5.568,5.568,0,0,0,6.68,0,5.548,5.548,0,0,0,2.3,1.016l.725,4.354a2.891,2.891,0,0,0,1.772,2.212l-.335,2.092H43.319a6.584,6.584,0,0,0-6.576,6.576v6.949a2.445,2.445,0,0,1-.888.17H30.741a2.446,2.446,0,0,1-1.564-.566l-5.363-4.469A3.778,3.778,0,0,1,22.5,55.188ZM22.52,68.844a4.217,4.217,0,0,0,2.992-4.051V62.984l1.661,1.385a5.584,5.584,0,0,0,3.569,1.292h5.114a5.526,5.526,0,0,0,.888-.073V75.663a17.149,17.149,0,0,1-16.182-6.216ZM8.142,76.059a3.76,3.76,0,0,1,2.667-3.612l6.572-2.022a20.271,20.271,0,0,0,19.362,8.4v6.644a6.584,6.584,0,0,0,6.576,6.576H50.1V100.5c0,.035,0,.07.005.1H41.545V98.834a6.584,6.584,0,0,0-6.576-6.576h-16.7a.1.1,0,0,1-.1-.1V82.132a1.566,1.566,0,0,0-3.132,0V92.153a3.24,3.24,0,0,0,3.236,3.236H28.392v5.219H13.257a5.121,5.121,0,0,1-5.115-5.115ZM38.413,98.834v1.775H31.524V95.389h3.445A3.448,3.448,0,0,1,38.413,98.834Zm58.351,4.906a.1.1,0,0,1,.1.1v3.34a.1.1,0,0,1-.1.1H3.236a.1.1,0,0,1-.1-.1v-3.34a.1.1,0,0,1,.1-.1Zm-43.533-3.131c0-.035.005-.069.005-.1V92.049h4.885l-1.141,8.56H53.231Zm6.908,0,2.717-20.381a1.78,1.78,0,0,1,1.759-1.54h7.512a1.78,1.78,0,0,1,1.759,1.54L76.6,100.609ZM78.393,88.918a1.591,1.591,0,0,0-.187.012l-1.215-9.116a4.921,4.921,0,0,0-4.863-4.258H64.616a4.922,4.922,0,0,0-4.863,4.258L58.537,88.93a1.586,1.586,0,0,0-.187-.012H43.319a3.449,3.449,0,0,1-3.445-3.445V55.41a3.449,3.449,0,0,1,3.445-3.445h50.1a3.449,3.449,0,0,1,3.445,3.445V85.473a3.449,3.449,0,0,1-3.445,3.445Z"
                                                                  transform="translate(0 -17.101)"
                                                                  fill="#854290"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Voluntários -->
                        <div class="col-12 col-md-auto col-lg-auto col-xl-auto">
                            <div class="card card-box card-a">
                                <div class="card-body pt-4 pb-0">
                                    <span class="card-body-number text-white mb-0">{{$next->voluntaries->count()}}</span>
                                    <div class="row align-items-center">
                                        <div class="col col-md-auto col-lg-auto col-xl-auto">
                                            <h4 class="text-left text-white">Voluntários<br>cadastrados</h4>
                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="80"
                                                 viewBox="0 0 100 100">
                                                <g transform="translate(-0.5)">
                                                    <path
                                                            d="M421.247,294.31a16.148,16.148,0,0,0-11.6,15.472V324.3a1.613,1.613,0,0,0,1.612,1.613h29.034A1.613,1.613,0,0,0,441.9,324.3V309.782a16.15,16.15,0,0,0-11.6-15.472,11.291,11.291,0,1,0-9.056,0Zm17.432,15.472v12.9H412.871v-12.9a12.9,12.9,0,1,1,25.808,0Zm-12.9-33.873a8.065,8.065,0,1,1-8.065,8.065A8.065,8.065,0,0,1,425.775,275.909Zm0,0"
                                                            transform="translate(-375.272 -250.101)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M158.935,168.1l-.058.136.672.284a6.3,6.3,0,0,0,1.59.67l.711.3.058-.139a5.877,5.877,0,0,0,4.181-.82l5.716,5.716,2.281-2.281-5.717-5.716a6.394,6.394,0,0,0,.911-3.26,6.31,6.31,0,0,0-.091-.92l.139-.059-.3-.711a6.262,6.262,0,0,0-.669-1.591l-.284-.671-.136.058a6.275,6.275,0,0,0-9.673-.668,6.452,6.452,0,0,0,0,9.123A6.552,6.552,0,0,0,158.935,168.1Zm1.613-7.392a3.226,3.226,0,1,1,4.561,4.562,3.3,3.3,0,0,1-4.561,0A3.225,3.225,0,0,1,160.549,160.707Zm0,0"
                                                            transform="translate(-142.973 -143.632)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M853.816,844.322l.06-.143-.9-.38a6.238,6.238,0,0,0-.989-.419l-1.08-.454-.081.191a6.675,6.675,0,0,0-4.146.781l-5.729-5.73-2.281,2.281,5.717,5.717a6.389,6.389,0,0,0-.912,3.26,6.5,6.5,0,0,0,.091.921l-.139.059.3.71a6.305,6.305,0,0,0,.669,1.59l.284.672.136-.058a6.447,6.447,0,1,0,9.674-8.456A5.943,5.943,0,0,0,853.816,844.322Zm-1.614,7.385a3.3,3.3,0,0,1-4.561,0,3.226,3.226,0,1,1,4.561,0Zm0,0"
                                                            transform="translate(-768.776 -768.776)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M969.685,524.789a6.3,6.3,0,0,0-.925.093l-.087-.206-1.408.6c-.061.026-.122.049-.183.078l-1.388.585.088.2a6.437,6.437,0,0,0-2.32,3.487h-8.293v3.226h8.293a6.434,6.434,0,0,0,2.326,3.494l-.088.205,1.389.585c.059.028.121.052.182.078l1.4.59.087-.207a6.439,6.439,0,1,0,.925-12.81Zm0,9.677a3.226,3.226,0,1,1,3.226-3.226A3.226,3.226,0,0,1,969.685,534.466Zm0,0"
                                                            transform="translate(-875.63 -481.238)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M843.425,162.008l.139.059a6.488,6.488,0,0,0-.091.92,6.389,6.389,0,0,0,.912,3.26l-5.717,5.716,2.281,2.281,5.716-5.716a5.876,5.876,0,0,0,4.181.82l.059.139.711-.3a6.3,6.3,0,0,0,1.588-.67l.672-.284-.057-.136a6.667,6.667,0,0,0,.668-.55,6.454,6.454,0,0,0,0-9.123,6.6,6.6,0,0,0-9.123,0,6.357,6.357,0,0,0-.55.668l-.136-.058-.284.672a6.3,6.3,0,0,0-.669,1.59Zm4.22-1.3a3.226,3.226,0,1,1,4.561,4.562,3.3,3.3,0,0,1-4.561,0A3.226,3.226,0,0,1,847.645,160.707Zm0,0"
                                                            transform="translate(-768.776 -143.632)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M765.715,134.553l1.252-2.971,2.689,1.133-1.252,2.971Zm0,0"
                                                            transform="translate(-701.862 -120.688)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M701.129,106.816l1.254-2.972,2.691,1.135-1.254,2.972Zm0,0"
                                                            transform="translate(-642.623 -95.247)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M830.664,161.978l1.252-2.97,2.688,1.133-1.251,2.97Zm0,0"
                                                            transform="translate(-761.434 -145.844)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M1054.97,703.323l1.135-2.69,2.972,1.255-1.134,2.689Zm0,0"
                                                            transform="translate(-967.17 -642.627)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M1000.18,833.3l1.135-2.692,2.972,1.254-1.136,2.691Zm0,0"
                                                            transform="translate(-916.916 -761.839)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M1027.56,768.326l1.135-2.689,2.972,1.253-1.134,2.69Zm0,0"
                                                            transform="translate(-942.029 -702.249)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M394.5,1029.791l1.251-2.971,2.689,1.133-1.251,2.97Zm0,0"
                                                            transform="translate(-361.38 -941.809)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M459.434,1057.222l1.252-2.972,2.688,1.134-1.251,2.97Zm0,0"
                                                            transform="translate(-420.939 -966.968)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M330.156,1002.645l1.254-2.973,2.692,1.135-1.254,2.973Zm0,0"
                                                            transform="translate(-302.364 -916.909)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M168.43,850.4l-.139-.059a6.32,6.32,0,0,0,.091-.921,6.393,6.393,0,0,0-.911-3.26l5.717-5.717-2.281-2.281-5.729,5.73a6.673,6.673,0,0,0-4.145-.781l-.081-.191-1.08.456a6.062,6.062,0,0,0-.99.417l-.9.38.061.143a5.911,5.911,0,0,0-.671.542,6.453,6.453,0,1,0,9.124,9.124,6.732,6.732,0,0,0,.549-.667l.136.058.284-.671a6.263,6.263,0,0,0,.669-1.591Zm-4.219,1.3a3.3,3.3,0,0,1-4.561,0,3.226,3.226,0,1,1,4.561,0Zm0,0"
                                                            transform="translate(-142.074 -768.776)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M131.742,397.357l1.135-2.689,2.973,1.254-1.135,2.69Zm0,0"
                                                            transform="translate(-120.376 -361.993)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M104.348,462.355l1.135-2.691,2.973,1.254-1.136,2.691Zm0,0"
                                                            transform="translate(-95.25 -421.608)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M159.156,332.384l1.134-2.689,2.973,1.254-1.135,2.69Zm0,0"
                                                            transform="translate(-145.521 -302.399)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M104.34,701.867l2.972-1.254,1.136,2.691-2.973,1.254Zm0,0"
                                                            transform="translate(-95.243 -642.609)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M159.156,831.878l2.972-1.253,1.135,2.689-2.973,1.254Zm0,0"
                                                            transform="translate(-145.521 -761.857)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M131.766,766.871l2.972-1.254,1.134,2.69-2.972,1.254Zm0,0"
                                                            transform="translate(-120.398 -702.231)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M9.372,537.209c.062-.026.122-.05.182-.078l1.389-.585-.088-.2a6.429,6.429,0,0,0,2.32-3.488H21.47v-3.226H13.175a6.435,6.435,0,0,0-2.326-3.494l.087-.2-1.388-.585c-.06-.028-.122-.052-.182-.077l-1.4-.591-.087.206a6.282,6.282,0,0,0-.924-.093,6.452,6.452,0,1,0,0,12.9,6.359,6.359,0,0,0,.924-.094l.087.207Zm-5.645-5.968a3.226,3.226,0,1,1,3.226,3.226A3.226,3.226,0,0,1,3.727,531.241Zm0,0"
                                                            transform="translate(0 -481.238)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M831.129,1000.794l2.69-1.134,1.254,2.971-2.691,1.136Zm0,0"
                                                            transform="translate(-761.861 -916.897)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M701.117,1055.616l2.691-1.136,1.254,2.972-2.691,1.137Zm0,0"
                                                            transform="translate(-642.613 -967.179)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M766.117,1028.2l2.69-1.134,1.255,2.973-2.691,1.134Zm0,0"
                                                            transform="translate(-702.231 -942.038)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M537.7,966.754c-.025-.061-.049-.122-.078-.182l-.585-1.389-.2.088a6.432,6.432,0,0,0-3.487-2.32v-8.294h-3.227v8.294a6.437,6.437,0,0,0-3.493,2.326l-.205-.087-.586,1.389c-.026.06-.051.12-.077.182l-.592,1.4.208.087a6.452,6.452,0,1,0,12.716,0l.206-.087ZM531.73,972.4a3.226,3.226,0,1,1,3.226-3.226A3.225,3.225,0,0,1,531.73,972.4Zm0,0"
                                                            transform="translate(-481.227 -875.619)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M1000.16,330.915l2.971-1.255,1.136,2.692-2.972,1.253Zm0,0"
                                                            transform="translate(-916.897 -302.367)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M1054.96,460.918l2.973-1.254,1.134,2.69-2.972,1.254Zm0,0"
                                                            transform="translate(-967.161 -421.608)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M1027.57,395.914l2.973-1.254,1.133,2.689L1028.7,398.6Zm0,0"
                                                            transform="translate(-942.038 -361.986)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M525.762,8.871c.026.062.05.123.077.182l.585,1.39.205-.087a6.432,6.432,0,0,0,3.487,2.319v8.294h3.227V12.674a6.425,6.425,0,0,0,3.493-2.326l.205.088.585-1.39c.027-.059.051-.12.078-.181l.59-1.4-.206-.087a6.48,6.48,0,0,0,.093-.925,6.452,6.452,0,0,0-12.9,0,6.463,6.463,0,0,0,.094.925l-.208.087Zm5.968-5.645A3.226,3.226,0,1,1,528.5,6.452,3.226,3.226,0,0,1,531.73,3.226Zm0,0"
                                                            transform="translate(-481.227)"
                                                            fill="#d24c83"/>
                                                    <path
                                                            d="M330.172,159.776l2.69-1.135,1.254,2.973-2.689,1.134Zm0,0"
                                                            transform="translate(-302.378 -145.507)"
                                                            fill="#d24c83"/>
                                                    <path d="M460.168,105l2.689-1.134,1.254,2.972-2.69,1.135Zm0,0"
                                                          transform="translate(-421.612 -95.271)"
                                                          fill="#d24c83"/>
                                                    <path
                                                            d="M395.184,132.4l2.69-1.134,1.254,2.971-2.69,1.135Zm0,0"
                                                            transform="translate(-362.008 -120.398)"
                                                            fill="#d24c83"/>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Técnicos -->
                        <div class="col-12 col-md-auto col-lg-auto col-xl-auto">
                            <div class="card card-box card-a">
                                <div class="card-body pt-4 pb-0">
                                    <span class="card-body-number text-white mb-0">{{$next->technicians->count()}}</span>
                                    <div class="row align-items-center">
                                        <div class="col col-md-auto col-lg-auto col-xl-auto">
                                            <h4 class="text-left text-white">Técnicos<br>cadastrados</h4>
                                        </div>
                                        <div class="col-auto">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="80"
                                                 viewBox="0 0 100 100">
                                                <g transform="translate(0 -0.001)">
                                                    <g transform="translate(0 0.001)">
                                                        <g transform="translate(0 0)">
                                                            <path
                                                                    d="M96.523,42.85l-5.882-.532a41.216,41.216,0,0,0-1.484-5.65l4.853-3.358a3.8,3.8,0,0,0,1.152-5.025l-3.3-5.822a3.8,3.8,0,0,0-4.9-1.6L81.579,23.3a41.728,41.728,0,0,0-3.786-3.921l2.624-5.3a3.8,3.8,0,0,0-1.427-4.954l-5.7-3.5a3.8,3.8,0,0,0-5.062.974L64.7,11.336a41.133,41.133,0,0,0-7.016-1.977l-.532-5.881A3.8,3.8,0,0,0,53.345,0h-6.69a3.8,3.8,0,0,0-3.806,3.477l-.532,5.881a41.223,41.223,0,0,0-5.651,1.484L33.308,5.99a3.8,3.8,0,0,0-5.025-1.151l-5.822,3.3a3.8,3.8,0,0,0-1.6,4.9L23.3,18.422a41.753,41.753,0,0,0-3.921,3.785l-5.3-2.624A3.8,3.8,0,0,0,9.125,21.01l-3.5,5.7A3.8,3.8,0,0,0,6.6,31.775L11.335,35.3a41.159,41.159,0,0,0-1.977,7.016l-5.882.532A3.8,3.8,0,0,0,0,46.656v6.69a3.8,3.8,0,0,0,3.477,3.806l5.881.532a41.226,41.226,0,0,0,1.484,5.651L5.99,66.692a3.8,3.8,0,0,0-1.151,5.025l3.3,5.822a3.8,3.8,0,0,0,4.9,1.6L18.421,76.7a41.73,41.73,0,0,0,3.786,3.921l-2.624,5.3a3.8,3.8,0,0,0,1.427,4.954l5.7,3.5a3.8,3.8,0,0,0,5.062-.974L35.3,88.665a41.161,41.161,0,0,0,7.016,1.977l.532,5.881A3.8,3.8,0,0,0,46.655,100h6.69a3.8,3.8,0,0,0,3.806-3.477l.532-5.881a41.274,41.274,0,0,0,5.651-1.484l3.358,4.853a3.8,3.8,0,0,0,5.025,1.152l5.822-3.3a3.8,3.8,0,0,0,1.6-4.9L76.7,81.58a41.73,41.73,0,0,0,3.921-3.786l5.3,2.624a3.8,3.8,0,0,0,4.954-1.427l3.5-5.7a3.8,3.8,0,0,0-.975-5.062L88.665,64.7a41.156,41.156,0,0,0,1.977-7.016l5.882-.532A3.8,3.8,0,0,0,100,53.346v-6.69A3.8,3.8,0,0,0,96.523,42.85Zm.513,10.5h0a.853.853,0,0,1-.78.854l-7.014.635a1.482,1.482,0,0,0-1.33,1.243A38.182,38.182,0,0,1,85.5,64.644a1.482,1.482,0,0,0,.484,1.754L91.626,70.6a.854.854,0,0,1,.219,1.136l-3.5,5.7a.854.854,0,0,1-1.112.32l-6.315-3.128A1.482,1.482,0,0,0,79.139,75a38.745,38.745,0,0,1-5.181,5,1.482,1.482,0,0,0-.425,1.768l2.9,6.421a.853.853,0,0,1-.359,1.1l-5.822,3.3a.853.853,0,0,1-1.127-.258l-4-5.787a1.482,1.482,0,0,0-1.736-.546,38.212,38.212,0,0,1-7.313,1.921,1.482,1.482,0,0,0-1.243,1.33L54.2,96.256a.853.853,0,0,1-.854.78h-6.69a.853.853,0,0,1-.854-.78l-.635-7.013a1.482,1.482,0,0,0-1.243-1.33A38.172,38.172,0,0,1,35.356,85.5a1.482,1.482,0,0,0-1.754.484L29.4,91.627a.853.853,0,0,1-1.136.219l-5.7-3.5a.853.853,0,0,1-.32-1.111l3.128-6.315A1.482,1.482,0,0,0,25,79.14a38.711,38.711,0,0,1-5-5.181,1.483,1.483,0,0,0-1.768-.425l-6.421,2.9a.853.853,0,0,1-1.1-.359L7.418,70.257a.853.853,0,0,1,.258-1.127l5.787-4a1.482,1.482,0,0,0,.546-1.736,38.23,38.23,0,0,1-1.921-7.313,1.482,1.482,0,0,0-1.33-1.243L3.745,54.2a.853.853,0,0,1-.78-.854v-6.69a.853.853,0,0,1,.78-.854l7.014-.635a1.482,1.482,0,0,0,1.33-1.243A38.179,38.179,0,0,1,14.5,35.358a1.482,1.482,0,0,0-.484-1.754L8.374,29.4a.853.853,0,0,1-.219-1.136l3.5-5.7a.853.853,0,0,1,1.111-.32l6.315,3.128A1.482,1.482,0,0,0,20.861,25a38.733,38.733,0,0,1,5.181-5,1.482,1.482,0,0,0,.425-1.768l-2.9-6.421a.853.853,0,0,1,.359-1.1l5.822-3.3a.853.853,0,0,1,1.127.258l4,5.787a1.482,1.482,0,0,0,1.736.546,38.193,38.193,0,0,1,7.313-1.921,1.482,1.482,0,0,0,1.243-1.33L45.8,3.745a.853.853,0,0,1,.854-.78h6.69a.853.853,0,0,1,.854.78l.635,7.013a1.482,1.482,0,0,0,1.243,1.33A38.163,38.163,0,0,1,64.643,14.5a1.481,1.481,0,0,0,1.754-.484L70.6,8.375a.853.853,0,0,1,1.136-.219l5.7,3.5a.853.853,0,0,1,.32,1.111L74.633,19.08A1.482,1.482,0,0,0,75,20.862a38.71,38.71,0,0,1,5,5.181,1.483,1.483,0,0,0,1.768.425l6.421-2.9a.853.853,0,0,1,1.1.359l3.3,5.822a.853.853,0,0,1-.258,1.127l-5.787,4a1.482,1.482,0,0,0-.546,1.736,38.217,38.217,0,0,1,1.921,7.313,1.482,1.482,0,0,0,1.33,1.243l7.014.635a.853.853,0,0,1,.78.854v6.69Z"
                                                                    transform="translate(0 -0.001)"
                                                                    fill="#f34423"/>
                                                        </g>
                                                    </g>
                                                    <g transform="translate(17.724 17.411)">
                                                        <path
                                                                d="M123.334,89.143a32.594,32.594,0,0,0-14.962,61.548,1.482,1.482,0,1,0,1.362-2.632,29.815,29.815,0,0,1-6.947-4.972,9.807,9.807,0,0,1,3.8-1.594l5.792-1.134a7.991,7.991,0,0,0,1.967-.655,14.455,14.455,0,0,0,17.338,0,7.983,7.983,0,0,0,1.967.655l5.792,1.134a9.791,9.791,0,0,1,4.136,1.841,29.516,29.516,0,0,1-20.251,8.024,29.874,29.874,0,0,1-5.9-.587,1.482,1.482,0,0,0-.587,2.905,32.849,32.849,0,0,0,6.486.646,32.492,32.492,0,0,0,23.306-9.835c.028-.022.056-.044.083-.068a1.478,1.478,0,0,0,.209-.232,32.573,32.573,0,0,0-23.6-55.043Zm-10.8,23.758.049-.025a17,17,0,0,0,2.759-1.895,19.707,19.707,0,0,0,17.715,3.225v7.344c0,1.006-.844,5.722-3.437,8.3-2.036,2.03-5.8,1.958-6.824,1.958a10.273,10.273,0,0,1-10.261-10.262V112.9Zm-1.354-2.637c-.164.088-.332.171-.5.252a1.478,1.478,0,0,0-.462.208c-.081.035-.161.073-.243.106a12.221,12.221,0,0,1,.865-4.053,25.693,25.693,0,0,0,2.164,2.282A13.5,13.5,0,0,1,111.181,110.265Zm11.84,29.363a11.5,11.5,0,0,1-6.253-1.849,5.739,5.739,0,0,0,1.254-3.56v-.337a13.19,13.19,0,0,0,10-.182v.519a5.739,5.739,0,0,0,1.254,3.56A11.5,11.5,0,0,1,123.021,139.627Zm22.629,1.568a12.707,12.707,0,0,0-5.631-2.611l-5.792-1.134c-1.879-.368-3.243-1.727-3.243-3.231v-2.292a13.336,13.336,0,0,0,2.1-2.072,5.481,5.481,0,0,0,5.243-5.125,3.626,3.626,0,0,0,2.326-3.379v-6.366a3.626,3.626,0,0,0-1.929-3.2,1.481,1.481,0,0,0,.47-1.513,22.49,22.49,0,0,0-5.762-10.524,1.482,1.482,0,0,0-2.061,2.13,19.605,19.605,0,0,1,4.961,9.166,1.471,1.471,0,0,0,.132.318H135.9a1.479,1.479,0,0,0-2.145-.666l-.028.016c-1.3.853-4.419,1.377-6.083,1.377a18.2,18.2,0,0,1-11.375-4.127l-3.82-4.118a13.7,13.7,0,0,1,2.407-2.712,13.427,13.427,0,0,1,8.432-3.12,11.054,11.054,0,0,1,4.348,1.168,1.482,1.482,0,1,0,1.315-2.657,14,14,0,0,0-5.509-1.472,16.212,16.212,0,0,0-10.506,3.822,17.235,17.235,0,0,0-3.606,4.349l0,0-.009.015-.009.015,0,0a15.259,15.259,0,0,0-2.3,8.458,3.625,3.625,0,0,0-2.065,3.266v6.366a3.628,3.628,0,0,0,3.623,3.623h1.456a13.263,13.263,0,0,0,5.035,7.293v1.952c0,1.5-1.364,2.863-3.243,3.231l-5.792,1.134a12.668,12.668,0,0,0-5.281,2.33,29.643,29.643,0,1,1,44.908.281Zm-9.628-19.186v-7.684h1a.66.66,0,0,1,.659.659v6.366a.66.66,0,0,1-.659.659Zm-26.451-7.684v7.684h-1a.66.66,0,0,1-.659-.659v-6.366a.66.66,0,0,1,.659-.659Z"
                                                                transform="translate(-90.745 -89.143)"
                                                                fill="#f34423"/>
                                                    </g>
                                                    <g transform="translate(43.817 43.498)">
                                                        <circle cx="1.302" cy="1.302" r="1.302" fill="#f34423"/>
                                                    </g>
                                                    <g transform="translate(52.669 43.498)">
                                                        <circle cx="1.302" cy="1.302" r="1.302" fill="#f34423"/>
                                                    </g>
                                                    <g transform="translate(45.722 50.805)">
                                                        <path
                                                                d="M241.313,260.546a1.465,1.465,0,0,0-2.072,0,1.871,1.871,0,0,1-2.644,0,1.465,1.465,0,1,0-2.071,2.072,4.8,4.8,0,0,0,6.787,0A1.465,1.465,0,0,0,241.313,260.546Z"
                                                                transform="translate(-234.097 -260.117)"
                                                                fill="#f34423"/>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col">
                            <div class="card card-b">
                                <div class="card-body">
                                    <i class="fa fa-2x fa-sad-cry mr-5"></i> <b>Ops!</b> Não há próximo evento
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
