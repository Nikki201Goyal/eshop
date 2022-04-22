<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AboutPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_about_page_loads()
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }
}
