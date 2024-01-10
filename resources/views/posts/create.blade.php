@extends('layouts.app')
@section('title', 'Create Post')

@section('content')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        @include('posts.partials._form')

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-block">Create</button>
        </div>
    </form>
@endsection
