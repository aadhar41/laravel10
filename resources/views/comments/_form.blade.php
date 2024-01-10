@auth
    <form action="{{ route('posts.store') }}" method="POST" class="my-2">
        @csrf

        <div class="form-floating mb-3">
            <textarea class="form-control @error('comment') is-invalid @enderror" name="comment" id="comment"
                placeholder="{{ __('Comment') }}" style="height: 150px">{{ old('comment', optional($post ?? null)->comment) }}</textarea>
            <label for="floatingTextarea2">{{ __('Comment') }}</label>
            <small id="comment">
                @error('comment')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </small>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Add Comment') }}</button>
        </div>
    </form>
@else
    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
        <strong>
            <a href="{{ route('login') }}">
                Sign-in
            </a>
        </strong> to post comments.
    </div>
@endauth
<hr />
