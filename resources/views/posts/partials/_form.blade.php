<div class="form-floating mb-3">
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
        placeholder="{{ __('Title') }}" value="{{ old('title', optional($post ?? null)->title) }}" />
    <label for="title">{{ __('Title') }}</label>
    <small id="helpId">
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </small>
</div>

<div class="form-floating mb-3">
    <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content"
        placeholder="{{ __('Content') }}" style="height: 250px">{{ old('content', optional($post ?? null)->content) }}</textarea>
    <label for="floatingTextarea2">{{ __('Content') }}</label>
    <small id="content">
        @error('content')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </small>
</div>
