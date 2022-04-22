<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TermsPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_term_page_loads()
    {
        $response = $this->get('/terms');

        $response->assertStatus(200);
    }
}
