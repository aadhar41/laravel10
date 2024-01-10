@extends('layouts.app')
@section('title', 'Edit Post')

@section('content')
    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('posts.partials._form')
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-block"> Update</button>
        </div>
    </form>
@endsection
