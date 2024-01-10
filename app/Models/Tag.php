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
     * The function returns a many-to-many relationship between the current model and the BlogPost
     * model in PHP.
     *
     * @return Object BelongsToMany a BelongsToMany relationship between the current model and the BlogPost
     * model.
     */
    public function blogPosts(): BelongsToMany
    {
        return $this->belongsToMany(BlogPost::class)->withTimestamps()->withCount('comments');
    }
}
