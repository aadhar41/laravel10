@extends('layouts.app')
@section('title', $posts->title)

@section('content')
    <main class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="card-group mb-2">
                    <div class="card">

                        <div class="card-body">
                            <h4 class="card-title"><strong>{{ $posts->title }}</strong>
                                <x-badge type='warning' :show="now()->diffInMinutes($posts->created_at) < 20">
                                    New !
                                </x-badge>
                            </h4>
                            <p class="card-text">{{ $posts->content }}</p>
                            <p class="card-text">
                                <img src="{{ $posts->image->url() }}" class="img-fluid img-thumbnail rounded-top"
                                    alt="Image" />
                            </p>
                        </div>
                        @isset($posts->tags)
                            <div class="card-footer">
                                <x-tags :tags="$posts->tags"></x-tags>
                            </div>
                        @endisset
                        <div class="card-footer">
                            <small class="text-body-secondary">
                                <x-updated :name="$posts->user->name" :date="$posts->created_at">
                                    Added
                                </x-updated>
                            </small>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">
                                <x-updated :date="$posts->updated_at">
                                    Updated
                                </x-updated>
                            </small>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">
                                <p class="my-1 text-bold">Currently read by {{ $counter }} peoples.</p>
                            </small>
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
                                @include('comments._form')
                            </p>

                            <p class="card-text">
                                @forelse ($posts->comments as $comment)
                                    <blockquote class="blockquote">
                                        <p class="mb-3">
                                            {{ $comment->content }}
                                        </p>
                                        <footer class="blockquote-footer">
                                            <x-updated :date="$comment->created_at" :name="$comment->user->name">
                                                Added
                                            </x-updated>
                                        </footer>
                                    </blockquote>
                                @empty
                                    <p>No Comments Yet!</p>
                                @endforelse
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Right Side Bar --}}
            <div class="col-md-4">
                @include('posts.partials._activity')
            </div>
        </div>
    </main>

@endsection
