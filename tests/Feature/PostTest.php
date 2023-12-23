<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_no_blog_posts_when_nothing_in_the_database(): void
    {
        $response = $this->get('/posts');

        $response->assertSeeText('No Blog Post.');
    }

    public function test_see_one_blog_post_when_there_is_one(): void
    {
        // Arrange
        $post = new BlogPost();
        $post->title = 'New title';
        $post->content = 'Content of the blog post.';
        $post->save();

        // Act
        $response = $this->get('/posts');

        // Assert
        $response->assertSeeText('New title');

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'New title',
        ]);
    }

    public function test_store_valid_data(): void
    {
        $params = [
            'title' => 'Valid title',
            'content' => 'At least 10 characters',
        ];

        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'The blog post created!');
    }
}
