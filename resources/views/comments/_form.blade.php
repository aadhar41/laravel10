@auth
    <form action="{{ route('posts.comments.store', ['post' => $posts->id]) }}" method="POST" class="my-2">
        @csrf

        <div class="form-floating mb-3">
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content"
                placeholder="{{ __('Comment') }}" style="height: 100px">{{ old('content') }}</textarea>
            <label for="floatingTextarea2">{{ __('Comment') }}</label>
            <small id="content">
                @error('content')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </small>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Add content') }}</button>
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
