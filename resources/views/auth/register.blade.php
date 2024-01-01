@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>
                    <div class="card-body">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf

                            <div class="form-group mb-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" aria-describedby="helpId" placeholder="Name"
                                    value="{{ old('name') }}" autocomplete="off">
                                @error('name')
                                    <small id="helpId" class="form-text invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" aria-describedby="emailHelpId" placeholder="E-Mail"
                                    value="{{ old('email') }}" autocomplete="off">
                                @error('email')
                                    <small id="emailHelpId" class="form-text invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="pasword">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password" placeholder="Password" autocomplete="off" />
                                @error('password')
                                    <small id="emailHelpId" class="form-text invalid-feedback">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" id="password_confirmation"
                                    placeholder="Password Confirmation" autocomplete="off" />
                                @error('password_confirmation')
                                    <small id="emailHelpId" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="row p-2">
                                <button type="submit" class="btn btn-block btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
