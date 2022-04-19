<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PrivacyPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_privacy_page_loads()
    {
        $response = $this->get('/privacy');

        $response->assertStatus(200);
    }
}
