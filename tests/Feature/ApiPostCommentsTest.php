<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiPostCommentsTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_blog_post_does_not_have_comments()
    {
        BlogPost::factory()->count(1)->create([
            'user_id' => $this->user()->id,
        ]);

        $response = $this->getJson('/api/v1/posts/1/comments');
        $response
            ->assertStatus(200)
            ->assertJsonStructure(['data', 'links', 'meta'])
            ->assertJsonCount(0, 'data');
    }


    public function test_blog_post_has_10_comments()
    {
        BlogPost::factory()->count(1)->create([
            'user_id' => $this->user()->id,
        ])
            ->each(function (BlogPost $post) {
                $post->comments()->saveMany(
                    Comment::factory($post)->count(10)->make([
                        'commentable_id' => $post->id,
                        'commentable_type' => get_class($post),   //BlogPost::class
                        'user_id' => $this->user()->id,
                    ])
                );
            });

        $blogPost = BlogPost::find(2);
        $this->assertEquals(10, $blogPost->comments->count());
        $response = $this->getJson("/api/v1/posts/{$blogPost->id}/comments");
        $response
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'content',
                        'created_at',
                        'updated_at',
                        'user' => [
                            'id',
                            'name',
                        ],
                    ]
                ],
                'links',
                'meta'
            ])
            ->assertJsonCount(10, 'data');

        // $response = $this->getJson('/api/v1/posts/2/comments');
        // $response
        //     ->assertStatus(200)
        //     ->assertJsonStructure(['data', 'links', 'meta'])
        //     ->assertJsonCount(10, 'data');
    }
}
