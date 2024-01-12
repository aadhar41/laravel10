<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\Comment;
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

    /**
     * The function tests whether a blog post with no comments is displayed correctly on the '/posts'
     * page.
     */
    public function test_see_one_blog_post_when_there_is_one_with_no_comments(): void
    {
        $this->createDummyBlogPost();

        // Act
        $response = $this->get('/posts');

        // Assert
        $response->assertSeeText('New title');
        $response->assertSeeText('No comments yet!');

        $this->assertDatabaseHas('blog_posts', [
            'title' => 'New title',
        ]);
    }

    /**
     * The function tests whether a blog post with comments is displayed correctly with the correct
     * number of comments.
     */
    public function test_see_one_blog_post_when_there_is_one_with_comments(): void
    {
        // Arrange
        $user = $this->user();
        $post = $this->createDummyBlogPost();

        Comment::factory()->count(4)->create(
            [
                'commentable_id' => $post->id,
                'commentable_type' => BlogPost::class,
                // 'user_id' => $user->id,
            ]
        );

        // Act
        $response = $this->get('/posts');

        // Assert
        $response->assertSeeText('4 comments');
    }

    /**
     * The function tests if valid data can be stored in a blog post.
     */
    public function test_store_valid_data(): void
    {
        $params = [
            'title' => 'Valid title',
            'content' => 'At least 10 characters',
        ];

        $this->actingAs($this->user())->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'The blog post created!');
    }

    /**
     * The function tests the failure case of storing a post by checking if the title and content
     * fields have the minimum required characters.
     */
    public function test_store_fail(): void
    {
        $params = [
            'title' => 'x',
            'content' => 'x',
        ];

        $this->actingAs($this->user())->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');

        $messages = session('errors')->getMessages();

        $this->assertEquals($messages['title'][0], 'The title field must be at least 5 characters.');
        $this->assertEquals($messages['content'][0], 'The content field must be at least 10 characters.');
    }

    /**
     * The function tests the update functionality of a blog post by changing its title and content and
     * asserting that the changes are reflected in the database.
     */
    public function test_update_valid_post(): void
    {
        $user = $this->user();
        $post = $this->createDummyBlogPost($user->id);

        $this->assertDatabaseHas('blog_posts', $post->toArray());

        $params = [
            'title' => 'A new named title.',
            'content' => 'Content was changed.',
        ];

        $this->actingAs($user)
            ->put("/posts/{$post->id}", $params)
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

    /**
     * The function tests the deletion of a blog post by asserting that the post exists in the
     * database, performing a delete request, asserting the response status and session status, and
     * finally asserting that the post has been soft deleted.
     */
    public function test_delete(): void
    {
        $user = $this->user();
        $post = $this->createDummyBlogPost($user->id);

        $this->assertDatabaseHas('blog_posts', $post->toArray());

        $this->actingAs($user)
            ->delete("/posts/{$post->id}")
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog post deleted!');
        // $this->assertDatabaseMissing('blog_posts', $post->toArray());
        // $this->assertSoftDeleted('blog_posts', $post->toArray());
        $this->assertSoftDeleted('blog_posts', [
            'id' => $post->id,
        ]);
    }


    /**
     * The function creates a dummy blog post with a new title and content, and assigns it to a user if
     * provided, otherwise it assigns it to the current user.
     *
     * @param userId The `userId` parameter is an optional parameter that specifies the user ID for the
     * blog post. If a `userId` is provided, it will be used as the user ID for the blog post. If no
     * `userId` is provided, it will default to the ID of the currently authenticated user.
     *
     * @return BlogPost a newly created instance of the BlogPost model.
     */
    public function createDummyBlogPost($userId = null): BlogPost
    {
        // Arrange
        // $post = new BlogPost();
        // $post->title = 'New title';
        // $post->content = 'Content of the blog post.';
        // $post->save();

        return BlogPost::factory()->newTitle()->create(
            [
                'user_id' => $userId ?? $this->user()->id,
            ]
        );

        // return $post;
    }
}
