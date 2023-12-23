<div class="form-group mb-3">
    <label class="text-muted" for="title"><strong>Title</strong></label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Title"
        value="{{ old('title', optional($post ?? null)->title) }}" aria-describedby="helpId">
    <small id="helpId" class="text-muted">
        @error('title')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </small>
</div>

<div class="form-group mb-3">
    <label class="text-muted" for="content"><strong>Content</strong></label>
    <textarea class="form-control" name="content" id="content" rows="5">{{ old('content', optional($post ?? null)->content) }}</textarea>
    <small id="content" class="text-muted">
        @error('content')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </small>
</div>
