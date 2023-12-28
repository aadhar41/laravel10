@extends('layouts.app')
@section('title', $posts->title)

@section('content')
    <div class="card">
        <div class="card-header">
            Post
            @if (now()->diffInMinutes($posts->created_at) < 5)
                <span class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill m-2">New
                    !
                </span>
                {{-- <span class="badge rounded-pill bg-primary mx-2">New !</span> --}}
            @endif
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ $posts->title }}</h4>
            <p class="card-text">{{ $posts->content }}</p>
        </div>
        <div class="card-footer text-muted">
            Added {{ $posts->created_at->diffForHumans() }}
        </div>
    </div>


    <div class="card text-muted bg-light mt-2">
        <div class="card-header">
            <h4 class="card-title">
                <h4>Comments</h4>
            </h4>
        </div>
        <div class="card-body">
            @forelse ($posts->comments as $comment)
                <blockquote class="blockquote">
                    <p class="mb-3">
                        {{ $comment->content }}
                    </p>
                    <footer class="blockquote-footer"> <cite title="Source Title">Added
                            {{ $comment->created_at->diffForHumans() }}</cite></footer>
                </blockquote>
            @empty
                <p>No Comments Yet!</p>
            @endforelse
        </div>
    </div>

@endsection
