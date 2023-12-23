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
        $this->createDummyBlogPost();

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

    public function test_store_fail(): void
    {
        $params = [
            'title' => 'x',
            'content' => 'x',
        ];

        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');

        $messages = session('errors')->getMessages();

        $this->assertEquals($messages['title'][0], 'The title field must be at least 5 characters.');
        $this->assertEquals($messages['content'][0], 'The content field must be at least 10 characters.');
    }

    public function test_update_valid_post(): void
    {
        $post = $this->createDummyBlogPost();

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'New title',
        ]);

        $params = [
            'title' => 'A new named title.',
            'content' => 'Content was changed.',
        ];

        $this->put("/posts/{$post->id}", $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'The blog post updated!');

        $this->assertDatabaseMissing('blog_posts', [
            'title' => 'New title',
        ]);

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'A new named title.',
        ]);
    }

    public function test_delete(): void
    {
        $post = $this->createDummyBlogPost();

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'New title',
        ]);

        $this->delete("/posts/{$post->id}")
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog post deleted!');

        $this->assertDatabaseMissing('blog_posts', [
            'title' => 'New title',
        ]);
    }

    public function createDummyBlogPost(): BlogPost
    {
        // Arrange
        $post = new BlogPost();
        $post->title = 'New title';
        $post->content = 'Content of the blog post.';
        $post->save();
        return $post;
    }
}
