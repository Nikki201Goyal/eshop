<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class searchPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_search_page_loads()
    {
        $response = $this->get('/search');

        $response->assertStatus(200);
    }
}
