<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_blog_page_loads()
    {
        $response = $this->get('/blogs');

        $response->assertStatus(200);
    }
}

