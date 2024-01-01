<?php

namespace Tests;

use App\Models\User;
use Illuminate\Console\View\Components\Factory;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function user()
    {
        return User::factory()->create();
    }
}