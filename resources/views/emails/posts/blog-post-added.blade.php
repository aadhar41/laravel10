<x-mail::message>
# Someone has posted a Blog Post.

Be sure to proof read it.

<x-mail::panel>
{{ Str::of($blogPost->title)->trim(); }}
</x-mail::panel>

Thanks,<br/>
{{ config('app.name') }}
</x-mail::message>
