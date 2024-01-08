@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="mx-2 my-2">
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf

                            <div class="form-floating mb-2">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="name" aria-describedby="helpId" placeholder="{{ __('Name') }}"
                                    value="{{ old('name') }}" autocomplete="off">
                                <label for="name">{{ __('Name') }}</label>
                                @error('name')
                                    <small id="helpId" class="form-text invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-floating mb-2">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" aria-describedby="emailHelpId"
                                    placeholder="{{ __('E-mail') }}" value="{{ old('email') }}" autocomplete="off">
                                <label for="email">{{ __('E-mail') }}</label>
                                @error('email')
                                    <small id="emailHelpId" class="form-text invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-floating mb-2">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password" placeholder="{{ __('Password') }}" autocomplete="off" />
                                <label for="pasword">{{ __('Password') }}</label>
                                @error('password')
                                    <small id="emailHelpId" class="form-text invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-floating mb-2">
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" id="password_confirmation"
                                    placeholder="{{ __('Confirm Password') }}" autocomplete="off" />
                                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                                @error('password_confirmation')
                                    <small id="emailHelpId" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="row p-2">
                                <button type="submit" class="btn btn-block btn-primary">{{ __('Register') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
