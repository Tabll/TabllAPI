<?php

namespace Tests\Feature\Api;

use App\Models\Tools\ResponseJson;
use Tests\TestCase;

/**
 * Class CalendarControllerTest
 *
 * @coversDefaultClass \App\Http\Controllers\Api\Tools\CalenderController
 * @package Tests\Api
 */
class CalendarControllerTest extends TestCase
{
    /**
     * 测试获取节假日（简易）
     *
     * @covers ::getSimpleHoliday
     */
    public function testGetSimpleHoliday()
    {
        $response = $this->get('api/calender/simple');

        $response->assertStatus(200);
    }

    /**
     * 测试获取节假日
     *
     * @covers ::getHoliday
     */
    public function testGetHoliday()
    {
        $response = $this->get('api/calender');

        $response->assertStatus(200)
            ->assertJson([
                'code' => ResponseJson::RESPONSE_CODE,
                'message' => ResponseJson::RESPONSE_MESSAGE,
            ]);
    }
}
