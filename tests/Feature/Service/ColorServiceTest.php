<?php

namespace Tests\Feature\Service;

use App\Services\Tools\ColorService;
use Tests\TestCase;

/**
 * Class ColorServiceTest
 *
 * @coversDefaultClass \App\Services\Tools\ColorService
 * @package Tests\Service
 */
class ColorServiceTest extends TestCase
{
    protected $service;

    public function setUp(): void
    {
        parent::setUp();

        $this->service = new ColorService();
    }

    /**
     * 测试获取随机颜色数组
     *
     * @covers ::getRandomColors
     */
    public function testGetRandomColors()
    {
        $data = $this->service->getRandomColors(100);

        $this->assertTrue(count($data) == 100);
    }

    /**
     * 测试获取随机颜色
     *
     * @covers ::getRandomColor
     */
    public function testGetRandomColor()
    {
        $data = $this->service->getRandomColor();

        $this->assertTrue(!is_null($data));
    }
}
