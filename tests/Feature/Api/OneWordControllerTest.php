<?php

namespace Tests\Feature\Api;

use App\Http\Middleware\ApiAuth;
use App\Models\Tools\ResponseJson;
use Tests\TestCase;

/**
 * Class OneWordControllerTest
 *
 * @coversDefaultClass \App\Http\Controllers\Api\Tools\OneWordController
 * @package Tests\Api
 */
class OneWordControllerTest extends TestCase
{
    /**
     * 测试获取一言
     *
     * @covers ::getOneWord
     * @return void
     */
    public function testGetOneWord()
    {
        $response = $this->get('api/one-word');

        $response->assertStatus(200)
            ->assertJson([
                'code' => ResponseJson::RESPONSE_CODE,
                'message' => ResponseJson::RESPONSE_MESSAGE,
            ]);
    }
}
