<?php

namespace App\Models;

use App\Models\Scopes\DeletedAdminScope;
use App\Traits\Taggable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class BlogPost extends Model
{
    use HasFactory, SoftDeletes, Taggable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog_posts';

    /* The line `protected  = ['title', 'content', 'user_id'];` is defining an array of
    attributes that are allowed to be mass assigned. In Laravel, mass assignment is a convenient way
    to insert or update multiple attributes of a model at once. By specifying the ``
    property, you are indicating which attributes can be set using the `create` or `update` methods
    on the model. In this case, the `title`, `content`, and `user_id` attributes can be mass
    assigned. Any other attributes not listed in the `` array will be ignored during mass
    assignment for security reasons. */
    protected $fillable = ['title', 'content', 'user_id'];

    // For test error datetime format was not matching.
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * The function returns a collection of comments associated with a specific model.
     *
     * @return MorphMany a MorphMany relationship.
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable')->latest();
    }

    /**
     * The function returns a BelongsTo relationship with the User model.
     *
     * @return BelongsTo a BelongsTo relationship.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * The function "scopeLatest" orders the query results in descending order based on the
     * "created_at" column.
     *
     * @param EloquentBuilder query The `` parameter is an instance of the `EloquentBuilder`
     * class, which represents a query builder for the Eloquent ORM. It allows you to build and execute
     * database queries using a fluent interface.
     *
     * @return EloquentBuilder an EloquentBuilder instance.
     */
    public function scopeLatest(EloquentBuilder $query): EloquentBuilder
    {
        return $query->orderBy(static::CREATED_AT, 'desc');
    }

    /**
     * The function "scopeMostCommented" is used to retrieve records from the database in descending
     * order based on the number of comments associated with each record.
     *
     * @param EloquentBuilder query The `` parameter is an instance of the `EloquentBuilder`
     * class, which represents a query builder for an Eloquent model. It allows you to build and
     * execute database queries for the model.
     *
     * @return EloquentBuilder an EloquentBuilder instance.
     */
    public function scopeMostCommented(EloquentBuilder $query): EloquentBuilder
    {
        // comments_count
        return $query->withCount('comments')->orderBy('comments_count', 'desc');
    }

    function scopeLatestWithRelations(EloquentBuilder $query): EloquentBuilder
    {
        return $query
            ->latest()
            ->with(['user', 'tags'])
            ->withCount('comments')
            ->orderBy('comments_count', 'desc');
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new DeletedAdminScope);
    }
}
