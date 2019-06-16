@extends('layouts.auth')

@section('content')
    <div class="box">
        <svg class="m" viewBox="363 45.8 1163.5 1331.6" xmlns="http://www.w3.org/2000/svg">
            <linearGradient id="appreciated_beam_SVGID_1_" x1="1659.6" x2="1328.4" y1="691.7" y2="953.14"
                            gradientTransform="matrix(1.2375 .076251 -.077618 1.2157 -349.91 -447.02)"
                            gradientUnits="userSpaceOnUse">
                <stop stop-color="#FB2046" offset="0"/>
                <stop stop-color="#FB5502" offset="1"/>
            </linearGradient>
            <linearGradient id="appreciated_beam_SVGID_2_" x1="1671" x2="1013.7" y1="586.63" y2="768.75"
                            gradientTransform="translate(0 -112.26)" gradientUnits="userSpaceOnUse">
                <stop stop-color="#FB2046" offset="0"/>
                <stop stop-color="#E32581" offset="1"/>
            </linearGradient>
            <linearGradient id="appreciated_beam_SVGID_3_" x1="1977.1" x2="1007.8" y1="-422.99" y2="789.63"
                            gradientTransform="translate(0 -112.26)" gradientUnits="userSpaceOnUse">
                <stop stop-color="#5E2495" offset="0"/>
                <stop stop-color="#E32581" offset="1"/>
            </linearGradient>
            <linearGradient id="appreciated_beam_SVGID_4_" x1="377.78" x2="2655.5" y1="577.44" y2="-94.535"
                            gradientTransform="translate(0 -112.26)" gradientUnits="userSpaceOnUse">
                <stop stop-color="#5E2495" offset="0"/>
                <stop stop-color="#E32581" offset="1"/>
            </linearGradient>
            <g transform="matrix(.66116 -.84625 1.0394 .81208 -212.31 1288.2)">
                <path d="m1200.8 809.3 406.11-344.55c24.066-20.314 60.547-17.355 80.783 6.6144 21.169 24.916 16.528 62.162-10.168 81.217l-423.68 322.7c-17.912 12.765-42.87 10.081-57.415-6.3686-15.645-17.614-13.582-44.365 4.3702-59.614z"
                      fill="url(#appreciated_beam_SVGID_1_)" stroke-width="1.229"/>
                <path d="m1044.7 563.5 600.2-114c23.4-4.4 46.5 9.2 53.8 31.9 8.1 25-5.9 51.9-31 59.6l-583.6 180.7c-45.8 14.2-105.9-14-116-60.9-9.6-44.8 31.6-88.8 76.6-97.3z"
                      fill="url(#appreciated_beam_SVGID_2_)"/>
                <path d="m986 571.3 255.6-414.7c37-48.5 243.2-123.9 291.4-86.5 51 39.6 57.1 114.4 13.1 161.7l-433.4 466c-28.5 30.7-88.1 33.7-120.3 6.9-32.4-27-41.1-84.8-6.4-133.4z"
                      fill="url(#appreciated_beam_SVGID_3_)"/>
                <path d="m373.4 477.2c32.5 90 131.6 136.9 221.8 105l907.2-321.6c57.6-20.4 87.5-84 66.5-141.4l-0.5-1.3c-18.8-51.4-72.5-81.1-126-69.7l-941.5 199.8c-103.2 21.9-163.3 129.9-127.5 229.2z"
                      fill="url(#appreciated_beam_SVGID_4_)"/>
            </g>
        </svg>

        <div class="card card-login">
            <div class="card-body">
                <form class="card-login-form" method="POST" action="{{ route('register') }}">
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

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row align-items-center mb-0 ml-4">
                        <label for="email" class="col-auto col-form-label">
                            <b class="text-danger">var</b> email =
                        </label>

                        <div class="col-md-6">
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}  p-1 border-0"
                                   name="email"
                                   value="{{ old('email') }}" required autocomplete="email">

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row align-items-center mb-0 ml-4">
                        <label for="password" class="col-auto col-form-label">
                            <b class="text-danger">var</b> password =
                        </label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} p-1 border-0"
                                   name="password" required autocomplete="new-password">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row align-items-center mb-0 ml-4">
                        <label for="password-confirm"
                               class="col-auto col-form-label">
                            <b class="text-danger">var</b> confirm =
                        </label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control  p-1 border-0"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                    <b>}</b>

                    <div class="form-group row mb-0">
                        <div class="col"></div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
