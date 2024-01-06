@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mx-2 my-3">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                    id="email" aria-describedby="emailHelpId" placeholder="{{ __('Email Address') }}"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label for="email">{{ __('Email Address') }}</label>
                                @error('email')
                                    <small id="emailHelpId" class="form-text invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password" aria-describedby="passwordHelpId"
                                    placeholder="{{ __('Password') }}" value="{{ old('password') }}" required
                                    autocomplete="password" autofocus>
                                <label for="password">{{ __('Password') }}</label>
                                @error('password')
                                    <small id="passwordHelpId" class="form-text invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 ms-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0 mx-1 my-1">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
