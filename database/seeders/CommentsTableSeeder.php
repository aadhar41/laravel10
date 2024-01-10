<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = BlogPost::all();
        $users = User::all();

        if ($posts->count() === 0) {
            $this->command->info('There are no blog posts, so no comments will be added');
            return;
        }

        $commentsCount = max((int) $this->command->ask('How many comments would you like to add?', 150), 1);

        Comment::factory($commentsCount)->make()->each(function ($comment) use ($posts, $users) {
            $comment->blog_post_id = $posts->random()->id;
            $comment->user_id = $users->random()->id;
            $comment->save();
        });
    }
}
