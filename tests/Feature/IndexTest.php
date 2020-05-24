<?php
declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that everyone can view the homepage.
     */
    public function testShow()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
