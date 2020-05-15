<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // TODO: change gh config
        $this->markTestSkipped('Missing DB on GitHub Actions');

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
