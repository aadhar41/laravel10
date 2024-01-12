<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['blog_post_id', 'path'];

    /**
     * The function returns a BelongsTo relationship for a blog post.
     *
     * @return BelongsTo a BelongsTo relationship.
     */
    public function imageable(): MorphTo
    {
        return $this->morphTo(BlogPost::class);
    }

    public function url()
    {
        return Storage::url($this->path);
    }
}
