@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center text-black-100 font-weight-bold">{{ __('Sarahah') }}</h1>
    <span class="mb-4 text-center d-block">{{ __('auth.Register') }}</span>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <input id="name" type="text" placeholder="{{__('auth.Name')}}" class="form-control btn-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="username" type="text" placeholder="{{__('auth.Username')}}" class="form-control btn-lg mt-4 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                @error('username')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="email" type="email" placeholder="{{__('auth.Email')}}" class="form-control btn-lg mt-4 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <input id="password" type="password" placeholder="{{__('auth.Password')}}" class="form-control btn-lg mt-4 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror


                <input id="password-confirm" type="password" placeholder="{{__('auth.Password confirmation')}}" class="form-control btn-lg mt-4" name="password_confirmation" required autocomplete="new-password">

                <button type="submit" class="btn btn-primary btn-lg mt-4 w-100">
                    {{ __('auth.Register') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
