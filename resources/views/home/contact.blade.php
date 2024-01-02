@extends('layouts.app')
@section('title', 'Contact Page')

@section('content')
    <div class="jumbotron">
        <h1 class="display-3">Contact Page</h1>
        <p>This is the content of the contact page.</p>
        @can('home.secret')
            <div class="alert alert-primary" role="alert">
                <a href="{{ route('secret') }}" class="alert-link">Special Contact Details</a>
            </div>
        @endcan
        <div class="container text-muted">
            <div class="wrap-contact2">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                            placeholder="">
                        <small id="helpId" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="form-group">
                        <label for="">E-Mail</label>
                        <input type="email" class="form-control" name="" id=""
                            aria-describedby="emailHelpId" placeholder="">
                        <small id="emailHelpId" class="form-text text-muted">Help text</small>
                    </div>

                    <div class="form-group">
                        <label for="">Message</label>
                        <textarea class="form-control" name="" id="" rows="5"></textarea>
                    </div>

                    <div class="row px-2 my-3">
                        <button type="submit" class="btn btn-block btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
