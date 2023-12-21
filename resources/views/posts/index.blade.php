@extends('layouts.app')
@section('title', 'Blog Post')

@section('content')

    {{-- @foreach ($posts as $key => $post)
        <p>{{ $key }} - {{ $post['title'] }}</p>
    @endforeach --}}

    @forelse ($posts as $key => $post)
        @includeIf('posts.partials.post', ['post' => $post])
    @empty
        <p>No Blog Post.</p>
    @endforelse

@endsection
