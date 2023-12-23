@extends('layouts.app')
@section('title', $posts->title)

@section('content')
    <div class="card">
        <div class="card-header">
            Post
            @if (now()->diffInMinutes($posts->created_at) < 5)
                <span class="badge rounded-pill bg-primary mx-2">New !</span>
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
@endsection
