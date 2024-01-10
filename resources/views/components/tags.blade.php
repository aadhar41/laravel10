<strong class="d-inline-block mb-2 text-primary-emphasis my-1">
    @foreach ($tags as $tag)
        <a href="javascript:void(0);">
            <span class="badge rounded-pill bg-success">{{ $tag->name }}</span>
        </a>
    @endforeach
</strong>
