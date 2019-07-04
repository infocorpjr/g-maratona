@extends('layouts.auth')

@section('content')
    <div class="h-100 d-flex flex-column flex-md-row flex-lg-row flex-xl-row align-items-center justify-content-center">
        <svg class="m" viewBox="363 45.8 1163.5 1331.6" xmlns="http://www.w3.org/2000/svg">
            <linearGradient id="aaa" x1="1659.6" x2="1328.4" y1="691.7" y2="953.14"
                            gradientTransform="matrix(1 0 0 1 -349 -447)" gradientUnits="userSpaceOnUse">
                <stop stop-color="#FB2046" offset="0"/>
                <stop stop-color="#FB5502" offset="1"/>
            </linearGradient>
            <linearGradient id="bbb" x1="1671" x2="1013.7" y1="586.63" y2="768.75"
                            gradientTransform="translate(0 -112.26)" gradientUnits="userSpaceOnUse">
                <stop stop-color="#FB2046" offset="0"/>
                <stop stop-color="#E32581" offset="1"/>
            </linearGradient>
            <linearGradient id="ccc" x1="1977.1" x2="1007.8" y1="-422.99" y2="789.63"
                            gradientTransform="translate(0 -112.26)" gradientUnits="userSpaceOnUse">
                <stop stop-color="#5E2495" offset="0"/>
                <stop stop-color="#E32581" offset="1"/>
            </linearGradient>
            <linearGradient id="ddd" x1="377.78" x2="2655.5" y1="577.44" y2="-94.535"
                            gradientTransform="translate(0 -112.26)" gradientUnits="userSpaceOnUse">
                <stop stop-color="#5E2495" offset="0"/>
                <stop stop-color="#E32581" offset="1"/>
            </linearGradient>
            <g transform="matrix(.66116 -.84625 1.0394 .81208 -212.31 1288.2)">
                <path d="m1200.8 809.3 406.11-344.55c24.066-20.314 60.547-17.355 80.783 6.6144 21.169 24.916 16.528 62.162-10.168 81.217l-423.68 322.7c-17.912 12.765-42.87 10.081-57.415-6.3686-15.645-17.614-13.582-44.365 4.3702-59.614z"
                      fill="url(#aaa)"/>
                <path d="m1044.7 563.5 600.2-114c23.4-4.4 46.5 9.2 53.8 31.9 8.1 25-5.9 51.9-31 59.6l-583.6 180.7c-45.8 14.2-105.9-14-116-60.9-9.6-44.8 31.6-88.8 76.6-97.3z"
                      fill="url(#bbb)"/>
                <path d="m986 571.3 255.6-414.7c37-48.5 243.2-123.9 291.4-86.5 51 39.6 57.1 114.4 13.1 161.7l-433.4 466c-28.5 30.7-88.1 33.7-120.3 6.9-32.4-27-41.1-84.8-6.4-133.4z"
                      fill="url(#ccc)"/>
                <path d="m373.4 477.2c32.5 90 131.6 136.9 221.8 105l907.2-321.6c57.6-20.4 87.5-84 66.5-141.4l-0.5-1.3c-18.8-51.4-72.5-81.1-126-69.7l-941.5 199.8c-103.2 21.9-163.3 129.9-127.5 229.2z"
                      fill="url(#ddd)"/>
            </g>
        </svg>
        <div class="card">
            <div class="card-body p-0 p-md-5 p-lg-5 p-xl-5">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <b>register() {</b>
                    <div class="form-group row align-items-center mb-0 ml-4">
                        <label for="name" class="col-auto col-form-label">
                            <b class="text-danger">var</b> name =
                        </label>
                        <div class="col">
                            <input id="name" type="text"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}  p-1 border-0"
                                   name="name"
                                   value="{{ old('name') }}" required autocomplete="name" autofocus>
                        </div>
                        <div class="col-12">
                            @if ($errors->has('name'))
                                <small class="text-danger" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row align-items-center mb-0 ml-4">
                        <label for="email" class="col-auto col-form-label">
                            <b class="text-danger">var</b> email =
                        </label>
                        <div class="col">
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}  p-0 pl-1 border-0"
                                   name="email"
                                   value="{{ old('email') }}" required autocomplete="email">
                        </div>
                        <div class="col-12">
                            @if ($errors->has('email'))
                                <small class="text-danger" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row align-items-center mb-0 ml-4">
                        <label for="password" class="col-auto col-form-label">
                            <b class="text-danger">var</b> password =
                        </label>
                        <div class="col">
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} p-1 border-0"
                                   name="password" required autocomplete="new-password">
                        </div>
                        <div class="col-12">
                            @if ($errors->has('password'))
                                <small class="text-danger" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row align-items-center mb-0 ml-4">
                        <label for="password-confirm"
                               class="col-auto col-form-label">
                            <b class="text-danger">var</b> confirm =
                        </label>
                        <div class="col">
                            <input id="password-confirm" type="password" class="form-control  p-1 border-0"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <b>}</b>

                    <div class="form-group row mb-0">
                        <div class="col"></div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-link text-white">Registrar</button>
                            @if (Route::has('login'))
                                <a class="btn btn-link text-white" href="{{ route('login') }}">
                                    /* Já possui conta? */
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
