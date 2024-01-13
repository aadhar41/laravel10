<x-mail::message>
    # Comment was posted on your blog post.

    Hi, {{ $comment->commentable->user->name }}

    @php
        $url = route('posts.show', ['post' => $comment->commentable->id]);
    @endphp

    <x-mail::button :url="$url">
        View Blog Post
    </x-mail::button>

    @php
        $userUrl = route('users.show', ['user' => $comment->user->id]);
    @endphp

    <x-mail::button :url="$userUrl">
        Visit {{ $comment->user->name }} Profile
    </x-mail::button>

    <x-mail::panel>
        {{ $comment->content }}
    </x-mail::panel>

    Thanks,
    {{ config('app.name') }}
</x-mail::message>
