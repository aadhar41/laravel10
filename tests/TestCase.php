<?php

namespace Tests;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Console\View\Components\Factory;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * The function "user" creates and returns a new instance of the User model using a factory.
     *
     * @return object a newly created instance of the User model using the User factory.
     */
    protected function user()
    {
        return User::factory()->create();
    }

    protected function blogPost($title = 'My Blog Post')
    {
        return BlogPost::factory()->count(1)->create([
            'user_id' => $this->user()->id,
        ]);
    }

    /**
     * Assert that an attribute has a specific value.
     *
     * @param  mixed   $model      An Eloquent model.
     * @param  string  $attribute  The name of the attribute.
     * @param  mixed   $value      The expected value of the attribute.
     * @param  string  $message    The message to display on failure.
     */
    protected function assertAttributeEquals($model, $attribute, $value, $message = '')
    {
        $this->assertTrue($model->getAttribute($attribute) == $value, $message);
    }
}