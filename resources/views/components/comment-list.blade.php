@forelse ($comments as $comment)
    <blockquote class="blockquote h-100 p-4 bg-light bg-gradient border rounded-1">
        <p class="mb-3">
            {{ $comment->content }}
        </p>
        <footer class="blockquote-footer">
            @php
                $userId = $comment->user->id;
            @endphp
            <x-updated :date="$comment->created_at" :name="$comment->user->name" :userId="$userId">
                Added
            </x-updated>
        </footer>
    </blockquote>
@empty
    <p>No Comments Yet!</p>
@endforelse
