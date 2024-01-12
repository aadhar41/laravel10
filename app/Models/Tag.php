<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    use HasFactory;


    /**
     * The function returns a collection of blog posts that are associated with a specific taggable
     * model.
     *
     * @return a morphedByMany relationship with the BlogPost model. This means that the current model
     * has a many-to-many relationship with the BlogPost model, using a polymorphic relationship. The
     * relationship is defined by the 'taggable' morphable type and the 'tagged' morphable alias. The
     * relationship also includes timestamps.
     */
    public function blogPosts()
    {
        return $this->morphedByMany(BlogPost::class, 'taggable')->withTimestamps()->as('tagged');
    }


    public function comments()
    {
        return $this->morphedByMany(Comment::class, 'taggable')->withTimestamps()->as('tagged');
    }
}
