<?php

namespace Tests;

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
}