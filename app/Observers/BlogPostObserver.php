<?php

namespace App\Observers;

use App\Models\BlogPost;
use Illuminate\Support\Facades\Cache;

class BlogPostObserver
{
    /**
     * Handle the BlogPost "updating" event.
     */
    public function updating(BlogPost $blogPost): void
    {
        Cache::tags(['blog-post'])->forget("blog-post-{$blogPost->id}");
    }

    /**
     * Handle the BlogPost "deleting" event.
     */
    public function deleting(BlogPost $blogPost): void
    {
        $blogPost->comments()->delete();
        Cache::tags(['blog-post'])->forget("blog-post-{$blogPost->id}");
    }

    /**
     * Handle the BlogPost "restoring" event.
     */
    public function restoring(BlogPost $blogPost): void
    {
        $blogPost->comments()->restore();
    }
}
