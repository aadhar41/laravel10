<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" class="form-control" placeholder="Title"
        value="{{ old('title', optional($post ?? null)->title) }}" aria-describedby="helpId">
    <small id="helpId" class="text-muted">
        @error('title')
            <p class="error">{{ $message }}</p>
        @enderror
    </small>
</div>

<div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control" name="content" id="content" rows="4">{{ old('content', optional($post ?? null)->content) }}</textarea>
    <small id="content" class="text-muted">
        @error('content')
            <p class="error">{{ $message }}</p>
        @enderror
    </small>
</div>
