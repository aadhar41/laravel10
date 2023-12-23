@if ($loop->even)
    <p>{{ $key }} - {{ $post->title }}</p>
@else
    <p class="lead">
        {{ $key }} - {{ $post->title }}
    </p>
@endif

<div>
    <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete!</button>
    </form>
</div>
