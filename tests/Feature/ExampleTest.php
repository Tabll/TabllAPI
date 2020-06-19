<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
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
//        $this->markTestSkipped('错误待解决');
        $response = $this->get('/');

        $response->assertStatus(200);
        //$this->assertTrue(true);
    }
}
