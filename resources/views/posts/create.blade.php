@extends('layouts.app')
@section('title', 'Create Post')

@section('content')
    <form action="{{route('posts.store')}}" method="POST">
        <div class="form-group">
            <label for=""></label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Title"
                aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
