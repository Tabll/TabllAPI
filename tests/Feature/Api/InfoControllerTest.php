<?php

namespace Tests\Feature\Api;

use App\Http\Middleware\ApiAuth;
use App\Models\Tools\ResponseJson;
use Tests\TestCase;

/**
 * Class ExampleTest
 *
 * @coversDefaultClass \App\Http\Controllers\Api\Info\InfoController
 * @package Tests\Api
 */
class InfoControllerTest extends TestCase
{
    /**
     * 测试 Info
     *
     * @covers ::index
     * @return void
     */
    public function testIndex()
    {
        $response = $this->withHeader('token', ApiAuth::API_KEY)
            ->get('api/info');

        $response->assertStatus(200)
            ->assertJson([
                'code' => ResponseJson::RESPONSE_CODE,
                'message' => ResponseJson::RESPONSE_MESSAGE,
            ]);
    }
}
