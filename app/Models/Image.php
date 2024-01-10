<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
    public function blogPost(): BelongsTo
    {
        return $this->belongsTo(BlogPost::class);
    }

    public function url()
    {
        return Storage::url($this->path);
    }
}