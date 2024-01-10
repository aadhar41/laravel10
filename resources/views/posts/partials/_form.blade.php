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
        placeholder="{{ __('Content') }}" style="height: 150px">{{ old('content', optional($post ?? null)->content) }}</textarea>
    <label for="floatingTextarea2">{{ __('Content') }}</label>
    <small id="content">
        @error('content')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </small>
</div>

<div class="mb-3">
    <label for="" class="form-label">Thumbnail</label>
    <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" id="thumbnail"
        placeholder="{{ __('Thumbnail') }}" aria-describedby="fileHelpId" />
    <div id="fileHelpId" class="form-text">The content field must be a file of type: jpg, jpeg, png, gif, svg.</div>
    <small id="thumbnail">
        @error('thumbnail')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </small>
</div>
