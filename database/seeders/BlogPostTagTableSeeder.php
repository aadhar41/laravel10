<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogPostTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tagCount = Tag::all()->count();

        if ($tagCount === 0) {
            $this->command->info('No tags found, skipping assigning tags to blog posts.');
            return;
        }

        $howManyMin = max((int) $this->command->ask('Minimum tags on blog posts?', 0), 0);
        $howManyMax = min((int) $this->command->ask('Maximum tags on blog posts?', $tagCount), $tagCount);

        BlogPost::all()->each(function (BlogPost $post) use ($howManyMin, $howManyMax) {
            $take = random_int($howManyMin, $howManyMax);
            $tags = Tag::inRandomOrder()->take($take)->get()->pluck('id');
            $post->tags()->sync($tags);
        });
    }
}
