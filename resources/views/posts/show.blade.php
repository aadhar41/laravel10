@extends('layouts.app')
@section('title', $posts['title'])

@section('content')

    @isset($posts['has_comments'])
        <p>
            Post has some comments. Using isset
        </p>
    @endisset

    <br>
    @if ($posts['is_new'])
        <div>
            A new blog post! using if
        </div>
    @else
        <div>
            Blog post is old! using elseif
        </div>
    @endif
    <br>
    @unless ($posts['is_new'])
        <div>
            It is an old blog post...using unless.
        </div>
    @endunless
    <h1>{{ $posts['title'] }}</h1>
    <p>{{ $posts['content'] }}</p>
@endsection
