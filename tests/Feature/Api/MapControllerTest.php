<?php

namespace Tests\Feature\Api;

use App\Models\Tools\ResponseJson;
use Tests\TestCase;

/**
 * Class MapControllerTest
 *
 * @coversDefaultClass \App\Http\Controllers\Api\Tools\MapController
 * @package Tests\Api
 */
class MapControllerTest extends TestCase
{
    /**
     * @return \array[][]
     */
    public function mapConvertProvider()
    {
        $caseOne = [
            [
                'type' => 'bd-to-gd',
                'lon' => 120.28020857502526,
                'lat' => 30.177595995901246,
            ]
        ];

        $caseTwo = [
            [
                'type' => 'gd-to-bd',
                'lon' => 120.273683,
                'lat' => 30.171664,
            ]
        ];

        return [
            $caseOne, $caseTwo
        ];
    }

    /**
     * 地图坐标转换测试
     *
     * @covers ::convert
     * @dataProvider mapConvertProvider
     * @param $parameters
     * @return void
     */
    public function testConvert($parameters)
    {
        $response = $this->JSON('GET', 'api/tool/map/convert', $parameters);

        $response->assertStatus(200)
            ->assertJson([
                'code' => ResponseJson::RESPONSE_CODE,
                'message' => ResponseJson::RESPONSE_MESSAGE,
            ]);
    }
}
