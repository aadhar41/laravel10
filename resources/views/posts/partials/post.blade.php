<div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
    <div class="col p-4 d-flex flex-column position-static">
        <strong class="d-inline-block mb-2 text-primary-emphasis">World</strong>
        <h3 class="mb-0">
            {{ $post->title }}
            @if (now()->diffInMinutes($post->created_at) < 5)
                <span class="ribbon">NEW</span>
            @endif
        </h3>
        <div class="mb-1 text-body-secondary">{{ $post->created_at->diffForHumans() }}</div>
        <div class="mb-1 text-body-secondary">
            @if ($post->comments_count)
                {{ $post->comments_count }} comments
            @else
                No comments yet!
            @endif
        </div>
        <p class="card-text mb-2">
            @can('update', $post)
                <a name="" id="" class="btn btn-primary"
                    href="{{ route('posts.edit', ['post' => $post->id]) }}" role="button"><i
                        class="fas fa-edit"></i>Edit</a>
            @endcan


            @can('delete', $post)
            <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" class="d-inline" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete!</button>
            </form>
        @endcan
        </p>

        <a href="{{ route('posts.show', ['post' => $post->id]) }}"
            class="icon-link gap-1 icon-link-hover stretched-link">
            Continue reading
            <svg class="bi">
                <use xlink:href="#chevron-right" />
            </svg>
        </a>
    </div>
</div>
