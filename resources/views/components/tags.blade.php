<strong class="d-inline-block mb-2 text-primary-emphasis my-1">
    @foreach ($tags as $tag)
        <a href="{{ route('posts.tags.index', ['tag' => $tag->id]) }}">
            <span class="badge rounded-pill bg-success">{{ $tag->name }}</span>
        </a>
    @endforeach
</strong>
