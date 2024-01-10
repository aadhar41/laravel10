<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        if ($this->command->confirm('Do you want to refresh the database?')) {
            $this->command->call('migrate:refresh');
            $this->command->info('Database was refreshed.');
        }

        Cache::tags(['blog-post'])->flush();

        $this->call(
            [
                UsersTableSeeder::class,
                BlogPostsTableSeeder::class,
                CommentsTableSeeder::class,
                TagsTableSeeder::class,
                BlogPostTagTableSeeder::class,
            ]
        );
    }
}
