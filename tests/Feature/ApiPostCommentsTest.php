<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ApiPostCommentsTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_blog_post_does_not_have_comments()
    {
        $this->blogPost();

        $response = $this->getJson('/api/v1/posts/1/comments');
        $response
            ->assertStatus(200)
            ->assertJsonStructure(['data', 'links', 'meta'])
            ->assertJsonCount(0, 'data');
    }


    public function test_blog_post_has_10_comments()
    {
        $this->blogPost()
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
    }


    function test_adding_comments_when_not_authenticated()
    {
        $this->blogPost();
        $response = $this->postJson('/api/v1/posts/55/comments', [
            'content' => 'Hello'
        ]);

        $response->assertStatus(401);
    }


    function test_adding_comments_when_authenticated()
    {
        $this->blogPost();
        $response = $this->actingAs($this->user(), 'sanctum')->postJson("/api/v1/posts/4/comments", [
            'content' => 'Hello'
        ]);

        $response->assertStatus(201);
    }


    function test_adding_comment_with_invalid_data()
    {
        $this->blogPost();
        $response = $this->actingAs($this->user(), 'sanctum')->postJson("/api/v1/posts/5/comments", []);

        $response
            ->assertStatus(422)
            ->assertJson([
                "message" => "The content field is required.",
                "errors" => [
                    "content" => ["The content field is required."]
                ]
            ]);
    }
}
