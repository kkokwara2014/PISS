{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                        ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection --}}


<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>PISS</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" type="image/svg+xml" sizes="263x78"
            href="{{ asset('bootstrap_assets/assets/img/piss_logo.svg') }}">
        <link rel="icon" type="image/svg+xml" sizes="263x78"
            href="{{ asset('bootstrap_assets/assets/img/piss_logo.svg') }}">
        <link rel="icon" type="image/svg+xml" sizes="263x78"
            href="{{ asset('bootstrap_assets/assets/img/piss_logo.svg') }}">
        <link rel="icon" type="image/svg+xml" sizes="263x78"
            href="{{ asset('bootstrap_assets/assets/img/piss_logo.svg') }}">
        <link rel="icon" type="image/svg+xml" sizes="263x78"
            href="{{ asset('bootstrap_assets/assets/img/piss_logo.svg') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap_assets/assets/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="{{ asset('bootstrap_assets/assets/fonts/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap_assets/assets/css/styles.css') }}">
    </head>

    <body
        style="background-image: url({{asset('bootstrap_assets/assets/img/pharmacy_drug_store.jpg')}});background-position: center;background-size: cover;background-repeat: no-repeat;font-size: 12px;font-family: Raleway, sans-serif;background-attachment: fixed;">
        <div class="container-fluid" style="padding: 0px;">
            <div class="row justify-content-center"
                style="padding-top: 100px;background-color: rgba(0,166,226,0);margin: 0px;">
                <div class="col-12 col-sm-10 col-md-7 col-lg-6 col-xl-4 align-self-center">

                   @include('admin.messages.success')
                   @include('admin.messages.deleted')
                  
                    <div class="border rounded shadow">
                        <div class="shadow-none" style="padding: 40px;background-color: #ffffff;padding-bottom: 40px;">
                           @if ($curentdate<$expirydate)
                            <form method="POST" action="{{ route('login') }}" class="text-center" id="form">
                                @csrf
                                <img class="img-fluid" src="{{ asset('bootstrap_assets/assets/img/piss_logo.svg') }}"
                                    style="color: rgb(25, 74, 94);" width="200px">
                                <div class="form-group" style="margin-top: 50px;">
                                    <div class="form-row input-row" style="background-color: #f5f5f5;">
                                        <div class="col-1 text-center align-self-center" style="padding: 0px;"><i
                                                class="fas fa-user" style="color: rgb(177,177,177);"></i></div>
                                        <div class="col-11" style="padding: 0px;">
                                            <input class="form-control @error('email') is-invalid @enderror"
                                                type="email"
                                                style="width: 100%;background-color: rgba(255,255,255,0);font-size: 12px;padding: 10px;padding-top: 25px;padding-bottom: 25px;font-family: Raleway, sans-serif;"
                                                name="email" placeholder="USERNAME" value="{{ old('email') }}" required
                                                autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 10px;">
                                    <div class="form-row input-row" style="background-color: #f5f5f5;">
                                        <div class="col-1 text-center align-self-center" style="padding: 0px;"><i
                                                class="fas fa-lock" style="color: rgb(177,177,177);"></i></div>
                                        <div class="col-11" style="padding: 0px;">
                                            <input class="form-control @error('password') is-invalid @enderror"
                                                type="password"
                                                style="width: 100%;background-color: rgb(245,245,245);font-size: 12px;padding: 10px;padding-top: 25px;padding-bottom: 25px;font-family: Raleway, sans-serif;"
                                                placeholder="PASSWORD" name="password" required
                                                autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <p class="text-left" style="margin-bottom: 5px;"><a href="#"
                                        style="color: rgb(0,166,226);">Forgot password?</a></p>
                                <div class="form-group" style="margin-bottom: 24px;">
                                    <div class="form-row submit-row">
                                        <div class="col-12" style="padding: 0px;">
                                            <div class="form-check text-left">
                                                <input class="form-check-input" type="checkbox" id="formCheck-1"
                                                    name="remember" id="remember" {{ old('remember') ? 'checked' : ''
                                                    }}>
                                                <label class="form-check-label" for="formCheck-1"
                                                    style="color: rgb(177,177,177);font-size: 13px;">Remember
                                                    me?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row submit-row">
                                        <div class="col-12" style="padding: 0px;">
                                            <button class="btn btn-primary btn-block" type="submit"
                                                style="font-size: 14px;padding-top: 20px;padding-bottom: 20px;background-color: rgb(0,166,226);font-family: Raleway, sans-serif;">SIGN
                                                IN
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                           @else
                               <div style="text-align: center">
                                   <h3 style="color: red">Contact Developer</h3>
                                   
                                   <h4>Subscription expired!</h4>

                                   <h6 style="color: green">
                                   Call Done-Right Systems - <strong>08038883919</strong>
                                   </h6>
                               </div>
                           @endif

                        </div>
                        <div style="background-color: #f5f5f5;padding-top: 20px;padding-bottom: 20px;">
                            <p class="text-center" style="margin: 0px;color: rgb(177,177,177);">PISS © copyright 2021
                            </p>
                            <p class="text-center" style="margin: 0px;color: rgb(177,177,177);">Powered by Done-Right
                                Systems</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('bootstrap_assets/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('bootstrap_assets/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    </body>

</html>