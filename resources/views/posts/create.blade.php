@extends('layouts.app')
@section('title', 'Create Post')

@section('content')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        @include('posts.partials.form')

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
