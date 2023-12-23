@extends('layouts.app')
@section('title', 'Create Post')

@section('content')
    @if ($errors->any())
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item active">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Title"
                aria-describedby="helpId">
            <small id="helpId" class="text-muted">
                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </small>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" rows="4"></textarea>
            <small id="content" class="text-muted">
                @error('content')
                    <p class="error">{{ $message }}</p>
                @enderror
            </small>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
