<?php

namespace Tests\Feature\Service;

use App\Services\Tools\AppService;
use Tests\TestCase;

/**
 * Class AppServiceTest
 *
 * @coversDefaultClass \App\Services\Tools\AppService
 * @package Tests\Service
 */
class AppServiceTest extends TestCase
{
    protected $service;

    public function setUp(): void
    {
        parent::setUp();

        $this->service = new AppService();
    }

    /**
     * 测试获取环境名称
     *
     * @covers ::getEnvName
     */
    public function testGetEnvName()
    {
        $data = $this->service->getEnvName();

        $this->assertTrue(!is_null($data));
    }
}
