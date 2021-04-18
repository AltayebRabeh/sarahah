@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center text-black-100 font-weight-bold">{{ __('Sarahah') }}</h1>
    <span class="mb-4 text-center d-block">{{ __('auth.Login') }}</span>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input id="identy" type="text" class="form-control btn-lg @error('identy') is-invalid @enderror" name="identy" value="{{ old('email') }}" placeholder="{{__('auth.Email or username')}}" required autocomplete="identy" autofocus>
                @error('identy')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="password" type="password" class="form-control btn-lg mt-5 @error('password') is-invalid @enderror" name="password" placeholder="{{ __('auth.Password') }}" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="form-check mt-5">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('auth.Remember Me') }}
                    </label>
                </div>

                <button type="submit" class="btn btn-primary btn-lg w-100 mt-5">
                    {{ __('auth.Login') }}
                </button>

                <div class="text-center ml-auto mr-auto mt-5">
                    @if (Route::has('password.request'))
                        <a class="btn-link" href="{{ route('password.request') }}">
                            {{ __('auth.Forgot Your Password?') }}
                        </a> |
                        <a class="btn-link" href="{{ route('register') }}">
                            {{ __('auth.Register') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
