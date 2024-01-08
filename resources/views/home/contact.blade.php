@extends('layouts.app')
@section('title', 'Contact Page')

@section('content')

    <div class="jumbotron">
        <h1 class="display-3 mx-2">Contact Page</h1>
        <p class="mx-3">This is the content of the contact page.</p>
        @can('home.secret')
            <div class="alert alert-primary" role="alert">
                <a href="{{ route('secret') }}" class="alert-link">Special Contact Details</a>
            </div>
        @endcan
        <div class="container text-muted">
            <div class="wrap-contact2">
                <form action="" method="post">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="{{ __('Name') }}" value="{{ old('name') }}" autocomplete="off" />
                        <label for="name">{{ __('Name') }}</label>
                    </div>


                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="email" id="email"
                            placeholder="{{ __('E-mail') }}" value="{{ old('email') }}" autocomplete="off" />
                        <label for="email">{{ __('E-mail') }}</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="{{ __('Comments') }}" name="comments" id="comments" style="height: 250px"
                            autocomplete="off">{{ old('comments') }}</textarea>
                        <label for="comments">{{ __('Comments') }}</label>
                    </div>

                    <div class="row px-2 my-3">
                        <button type="submit" class="btn btn-block btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
