<div class="row g-0 border rounded flex-md-row mb-4 shadow-sm h-md-250 position-relative">
    <div class="col p-4 d-flex flex-column position-static">

        <h3 class="mb-0">
            @if ($post->trashed())
                <del>
            @endif
            <p class="{{ $post->trashed() ? 'text-muted' : '' }}">
                {{ $post->title }}
                @if (now()->diffInMinutes($post->created_at) < 2000)
                    <x-badge type='warning' :show="now()->diffInMinutes($post->created_at) < 20">
                        New !
                    </x-badge>
                @endif
            </p>
            <div class="col-12 text-truncate my-1">
                {{ $post->content }}
            </div>

            @if ($post->trashed())
                </del>
            @endif
        </h3>
        <x-tags :tags="$post->tags">

        </x-tags>
        <div class="mb-1 text-body-secondary">
            <x-updated :name="$post->user->name" :date="$post->created_at" :userId="$post->user->id">
                Added
            </x-updated>
        </div>
        <div class="mb-1 text-body-secondary">
            @if ($post->comments_count)
                {{ $post->comments_count }} comments
            @else
                No comments yet!
            @endif
        </div>

        <div class="btn-group col-lg-2 my-2" role="group" aria-label="Button group name">
            @auth
                @can('update', $post)
                    <a name="" id="" class="btn btn-primary"
                        href="{{ route('posts.edit', ['post' => $post->id]) }}" role="button"><i
                            class="fas fa-edit"></i>Edit</a>
                @endcan
            @endauth


            @auth
                @if (!$post->trashed())
                    @can('delete', $post)
                        <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" class="ms-1 bg-danger"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete!</button>
                        </form>
                    @endcan
                @endif
            @endauth

        </div>


        <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="icon-link gap-1 icon-link-hover mt-2">
            Continue reading
            <svg class="bi">
                <use xlink:href="#chevron-right" />
            </svg>
        </a>
    </div>
</div>
