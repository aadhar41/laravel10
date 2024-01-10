@extends('layouts.app')
@section('title', $posts->title)

@section('content')
    <main class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        @if ($posts->image)
                            <div
                                style="background-image: url('{{ $posts->image->url() }}'); min-height: 350px; color: white; text-align: center; background-attachment: fixed;">
                                <h1 style="padding-top: 100px; text-shadow: 1px 2px #000">
                                @else
                                    <h1>
                        @endif
                        <h3 class="my-0">
                            <strong>{{ $posts->title }}</strong>
                            <x-badge type='warning' :show="now()->diffInMinutes($posts->created_at) < 20">
                                New !
                            </x-badge>
                        </h3>
                        @if ($posts->image)
                            </h1>
                    </div>
                @else
                    </h1>
                    @endif
                    @isset($posts->tags)
                        <strong class="d-inline-block mb-1 text-primary-emphasis">
                            <x-tags :tags="$posts->tags"></x-tags>
                        </strong>
                    @endisset
                    <div class="mb-1 text-body-secondary">
                        <small class="text-body-secondary">
                            <x-updated :name="$posts->user->name" :date="$posts->created_at">
                                Added
                            </x-updated>
                        </small>
                    </div>
                    <div class="mb-1 text-body-secondary">
                        <small class="text-body-secondary">
                            <x-updated :date="$posts->updated_at">
                                Updated
                            </x-updated>
                        </small>
                    </div>
                    <div class="mb-1 text-body-secondary">
                        <small class="text-body-secondary">
                            <p class="my-1 text-bold">Currently read by {{ $counter }} peoples.</p>
                        </small>
                    </div>
                    <p class="card-text mb-auto">{{ $posts->content }}</p>

                </div>



            </div>
            {{-- <div class="card-group mb-2">

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><strong>{{ $posts->title }}</strong>
                                <x-badge type='warning' :show="now()->diffInMinutes($posts->created_at) < 20">
                                    New !
                                </x-badge>
                            </h4>
                            <p class="card-text">{{ $posts->content }}</p>
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
                </div> --}}

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
