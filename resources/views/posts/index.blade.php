@extends('layouts.app')
@section('title', 'Blog Post')

@section('content')

    {{-- @foreach ($posts as $key => $post)
        <p>{{ $key }} - {{ $post['title'] }}</p>
    @endforeach --}}

    {{-- @each('posts.partials.post', $posts, 'post', 'view.empty') --}}
    {{-- @each('posts.partials.post', $posts, 'post') --}}

    @forelse ($posts as $key => $post)
        @includeIf('posts.partials.post', ['post' => $post])
    @empty
        <p>No Blog Post.</p>
    @endforelse

@endsection
