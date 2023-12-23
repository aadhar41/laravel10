<a name="" id="" class="badge text-muted" href="{{ route('posts.show', ['post' => $post->id]) }}"
    role="button">
    <h3> {{ $post->title }}</h3>
</a>

<div class="mb-3">
    <a name="" id="" class="btn btn-primary" href="{{ route('posts.edit', ['post' => $post->id]) }}"
        role="button"><i class="fas fa-edit"></i>Edit</a>
    <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" class="d-inline" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete!</button>
    </form>
</div>
