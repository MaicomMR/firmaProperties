@extends('layouts.app')





@section('content')
    <div class="container">
        <div class="login-screen">
            <div class="login-dark-bar">
                <img class="logo-img" src="{{asset('images/logo_full.png')}}" alt="">
            </div>
            <div class="form-box">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                        <input id="email" type="email" class="login-input text-center @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror



                        <input id="password" type="password"
                               class="login-input text-center @error('password') is-invalid @enderror" name="password" required
                               autocomplete="current-password"  placeholder="senha">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                        @enderror



                    <button type="submit" class="login-button">
                        {{ __('Login') }}
                    </button>



                    @if (Route::has('password.request'))
                        <a class="login-button" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

                </form>


            </div>
        </div>
@endsection
