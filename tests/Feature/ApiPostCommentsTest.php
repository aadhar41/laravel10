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
}
