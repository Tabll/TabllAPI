<?php

namespace Tests\Feature\Service;

use App\Services\Tools\MapService;
use Tests\TestCase;

/**
 * Class MapServiceTest
 *
 * @coversDefaultClass \App\Services\Tools\MapService
 * @package Tests\Service
 */
class MapServiceTest extends TestCase
{
    protected $service;

    public function setUp(): void
    {
        parent::setUp();

        $this->service = new MapService();
    }

    /**
     * 测试获取随机颜色数组
     *
     * @covers ::bdToGd
     */
    public function testBdToGd()
    {
        $data = $this->service->bdToGd(120.28020857502526, 30.177595995901246);

        $this->assertTrue($data['lon'] == 120.273683);
        $this->assertTrue($data['lat'] == 30.171664);
    }

    /**
     * 测试获取随机颜色数组
     *
     * @covers ::gdToBd
     */
    public function testGdToBd()
    {
        $data = $this->service->gdToBd(120.273683, 30.171664);

        $this->assertTrue($data['lon'] == 120.280157);
        $this->assertTrue($data['lat'] == 30.177731);
    }
}
