<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * A basic feature home page.
     */
    public function test_home_page_is_working_correctly(): void
    {
        $response = $this->get('/');
        $response->assertSeeText('Home Page', true);
        $response->assertSeeText('This is the content of the home page.', true);
    }

    /**
     * A basic feature contact page.
     */
    public function test_contact_page_is_working_correctly(): void
    {
        $response = $this->get('/contact');
        $response->assertSeeText('Contact Page', true);
        $response->assertSeeText('This is the content of the contact page.', true);
    }
}
