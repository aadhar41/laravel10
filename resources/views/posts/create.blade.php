@extends('layouts.app')
@section('title', 'Create Post')

@section('content')
    @if ($errors->any())
        <ul class="list-group"
            style="background: rgba(150, 0, 0, 0.1); border:1px solid rgba(150, 0, 0, 0.7); color:rgba(150, 0, 0, 0.7); padding: 8px; border-radius: 3px; list-style-type: none;">
            @foreach ($errors->all() as $error)
                <li class="list-group-item active"><strong>{{ $error }}</strong></li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        @include('posts.partials.form')

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
