<div class="card mb-2">
    <div class="card-title">
        <p>
        <h4>
            <a name="" id="" class="badge text-muted"
                href="{{ route('posts.show', ['post' => $post->id]) }}" role="button">
                <h3>
                    {{ $post->title }}
                    @if (now()->diffInMinutes($post->created_at) < 5)
                        <span class="badge rounded-pill bg-primary mx-2">New !</span>
                    @endif

                </h3>
            </a>
        </h4>
        <p class="m-2">
            @if ($post->comments_count)
                {{ $post->comments_count }} comments
            @else
                No comments yet!
            @endif
        </p>
        <div class="m-2">
            <a name="" id="" class="btn btn-primary"
                href="{{ route('posts.edit', ['post' => $post->id]) }}" role="button"><i
                    class="fas fa-edit"></i>Edit</a>
            <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" class="d-inline" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete!</button>
            </form>
        </div>
    </div>
</div>
