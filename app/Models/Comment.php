<?php

namespace App\Models;

use App\Scopes\LatestScope;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['blog_post_id', 'content', 'user_id'];

    public function blogPost(): BelongsTo
    {
        return $this->belongsTo(BlogPost::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeLatest(EloquentBuilder $query): EloquentBuilder
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::creating(function (Comment $comment) {
            Cache::tags(['blog-post'])->forget("blog-post-{$comment->blog_post_id}");
            Cache::tags(['blog-post'])->forget("blog-post-most-commented");
        });
        // static::addGlobalScope(new LatestScope);
    }
}
