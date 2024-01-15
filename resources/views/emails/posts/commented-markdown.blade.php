<x-mail::message>
# Comment was posted on your blog post.
Hi, {{ $comment->commentable->user->name }}
<x-mail::panel>
{{ Str::of($comment->content)->trim(); }}
</x-mail::panel>
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

Thanks,<br/>
{{ config('app.name') }}
</x-mail::message>
