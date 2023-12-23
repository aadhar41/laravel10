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
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Title"
                value="{{ old('title') }}" aria-describedby="helpId">
            <small id="helpId" class="text-muted">
                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </small>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" rows="4">{{ old('content') }}</textarea>
            <small id="content" class="text-muted">
                @error('content')
                    <p class="error">{{ $message }}</p>
                @enderror
            </small>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
