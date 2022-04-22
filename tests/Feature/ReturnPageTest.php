<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReturnPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_return_page_loads()
    {
        $response = $this->get('/return');

        $response->assertStatus(200);
    }
}
