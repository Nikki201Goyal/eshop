<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FAQsPageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_faq_page_loads()
    {
        $response = $this->get('/faq');

        $response->assertStatus(200);
    }
}
