<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public const LOCALE = [
        'en' => 'English',
        'es' => 'Espanol',
        'de' => 'Deutsche',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email',
        'email_verified_at',
        'created_at',
        'updated_at',
        'is_admin',
        'locale',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    /**
     * The function returns a relationship where a user has many blog posts.
     *
     * @return HasMany a HasMany relationship.
     */
    public function blogPosts(): HasMany
    {
        return $this->hasMany(BlogPost::class);
    }

    /**
     * The function returns a collection of comments associated with a specific model.
     *
     * @return HasMany a HasMany relationship.
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function commentsOn(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable')->latest();
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function scopeWithMostBlogPosts(EloquentBuilder $query): EloquentBuilder
    {
        return $query->withCount('blogPosts')->orderBy('blog_posts_count', 'desc');
    }

    public function scopeWithMostBlogPostsLastMonth(EloquentBuilder $query): EloquentBuilder
    {
        return $query->withCount(['blogPosts' => function (EloquentBuilder $query) {
            return $query->where(static::CREATED_AT, '>=', Carbon::now()->subMonth(1));
        }])
            ->has('blogPosts', '>=', 4)
            ->orderBy('blog_posts_count', 'desc');
    }

    public function scopeThatHasCommentedOnPost(EloquentBuilder $query, BlogPost $post)
    {
        return $query->whereHas('comments', function ($query) use ($post) {
            $query->where('commentable_id', $post->getKey())
                ->where('commentable_type', get_class($post));
        });
    }


    public function scopeThatIsAnAdmin(EloquentBuilder $query)
    {
        // This is just for testing purposes. In a real application you might want to add some kind
        // of authorization check here.
        return $query->where('is_admin', true);
    }
}
