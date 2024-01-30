<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\User;
use App\Policies\BlogPostPolicy;
use App\Policies\CommentPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        BlogPost::class => BlogPostPolicy::class,
        User::class => UserPolicy::class,
        Comment::class => CommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('home.secret', function ($user) {
            return $user->is_admin;
        });

        //
        // Gate::define('update-post', function ($user, $post) {
        //     return $user->id === $post->user_id;
        // });

        // Gate::define('delete-post', function ($user, $post) {
        //     return $user->id === $post->user_id;
        // });

        Gate::before(function ($user, $ability) {
            if ($user->is_admin && in_array($ability, ['update', 'delete'])) {
                return true;
            }
        });

        // Gate::after(function ($user, $ability, $result) {
        //     if ($user->is_admin && in_array($ability, ['update-post'])) {
        //         return true;
        //     }
        // });
    }
}
