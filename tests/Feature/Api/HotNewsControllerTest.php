<?php

namespace Tests\Feature\Api;

use App\Models\Tools\ResponseJson;
use Tests\TestCase;

/**
 * Class HotNewsControllerTest
 *
 * @coversDefaultClass \App\Http\Controllers\Api\HotNews\HotNewsController
 * @package Tests\Api
 */
class HotNewsControllerTest extends TestCase
{
    /**
     * 测试获取当前热搜
     *
     * @covers ::index
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('api/hot-news/current');

        $response->assertStatus(200)
            ->assertJson([
                'code' => ResponseJson::RESPONSE_CODE,
                'message' => ResponseJson::RESPONSE_MESSAGE,
            ]);
    }
}
