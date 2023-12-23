@if ($loop->even)
    <p>{{ $key }} - {{ $post->title }}</p>
@else
    <p style="background-color: rgba(0,0,0,0.4); padding: 5px 0; color:white;">{{ $key }} - {{ $post->title }}
    </p>
@endif

<div>
    <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete!</button>
    </form>
</div>
