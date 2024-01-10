@extends('layouts.app')
@section('title', 'Blog Post')

@section('content')
    <div class="row">
        <div class="col-md-8">
            {{--
            <h3 class="pb-4 mb-4 border-bottom">
                From the Firehose
            </h3>
            --}}


            @forelse ($posts as $key => $post)
                @includeIf('posts.partials.post', ['post' => $post])
            @empty
                <p>No Blog Post.</p>
            @endforelse

            <nav class="blog-pagination" aria-label="Pagination">
                <a class="btn btn-outline-primary rounded-pill" href="javascript:void(0)">Older</a>
                <a class="btn btn-outline-secondary rounded-pill disabled" aria-disabled="true">Newer</a>
            </nav>

        </div>

        {{-- Right Side Bar --}}
        <div class="col-md-4">
            @include('posts.partials._activity')
        </div>
    </div>

@endsection
