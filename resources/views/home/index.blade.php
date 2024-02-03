@extends('layouts.app')
@section('title', 'Home Page')

@section('content')

    <div class="jumbotron">
        <h1 class="display-3">{{ __('messages.welcome') }}</h1>
        <h2 class="display-3">Using JSON {{ __('Welcome to my blog') }}</h2>
        <p class="display-2">Using name : {{ __('Hello :name', ['name' => 'Aadhar']) }}</p>
        <p>{{ __('messages.example_with_value', ['name' => 'Aadhar']) }}</p>
        <p>{{ trans_choice('messages.plural', 0, ['a' => 1]) }}</p>
        <p>{{ trans_choice('messages.plural', 1, ['a' => 1]) }}</p>
        <p>{{ trans_choice('messages.plural', 2, ['a' => 1]) }}</p>
        <p class="lead">@lang('messages.home page') Lorem, ipsum dolor sit amet
            consectetur
            adipisicing elit.
            Esse
            sequi sunt recusandae eveniet
            perspiciatis, perferendis corporis eius, commodi velit architecto accusamus illum tenetur
            praesentium. Optio
            obcaecati autem distinctio molestiae quas!
            Home Page
            This is the content of the home page.
        </p>
        <hr class="my-2">
        <p>More info</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">load more..</a>
        </p>
    </div>

@endsection
