<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<p>Hi, {{ $comment->commentable->user->name }}</p>

<p>
    Someone has commented on your blog post.
    <a href="{{ route('posts.show', ['post' => $comment->commentable->id]) }}">
        {{ $comment->commentable->title }}
    </a>
</p>

<hr />

<p>
    <img src="{{ $message->embed($comment->user->image->url()) }}" alt="Image" />
    <a href="{{ route('users.show', ['user' => $comment->user->id]) }}">
        {{ $comment->user->name }}
    </a> said :
</p>

<p>
    "{{ $comment->content }}"
</p>

# {{ $title }}

$body

@if (count($attachments) > 0)
    ## Attachments
    @foreach ($attachments as $attachment)
        - [{{ $attachment['name'] }}]({{ $attachment['url'] }})
    @endforeach
@endif

Best Regards,

{{ config('app.name') }}
