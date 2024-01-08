@extends('layouts.app')
@section('title', $posts->title)

@section('content')
    <main class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card-group mb-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $posts->title }}
                                @if (now()->diffInMinutes($posts->created_at) < 5)
                                    <span class="ribbon">NEW</span>
                                    {{-- <span class="badge rounded-pill bg-primary mx-2">New !</span> --}}
                                @endif
                            </h5>
                            <p class="card-text">{{ $posts->content }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">Added {{ $posts->created_at->diffForHumans() }} by
                                {{ $posts->user->name }}</small>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="card-header bg-transparent">
                                <h4>Comments</h4>
                            </div>

                            <p class="card-text">
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
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

@endsection
