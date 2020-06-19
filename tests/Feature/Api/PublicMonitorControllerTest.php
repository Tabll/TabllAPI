<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

/**
 * Class PublicMonitorControllerTest
 *
 * @coversDefaultClass \App\Http\Controllers\Api\Monitor\PublicMonitorController
 * @package Tests\Api
 */
class PublicMonitorControllerTest extends TestCase
{
    /**
     * 测试 databaseStatusTXSH
     *
     * @covers ::databaseStatusTXSH
     * @return void
     */
    public function testDatabaseStatusTXSH()
    {
        $response = $this->get('api/monitor/database-sh');

        $response->assertStatus(200);
    }

    /**
     * 测试 redisStatusTXSH
     *
     * @covers ::redisStatusTXSH
     * @return void
     */
    public function testRedisStatusTXSH()
    {
        $response = $this->get('api/monitor/redis-sh');

        $response->assertStatus(200);
    }

    /**
     * 测试 databaseStatusTXSH
     *
     * @covers ::redisStatusTXLO
     * @return void
     */
    public function testRedisStatusTXLO()
    {
        $response = $this->get('api/monitor/redis-lo');

        $response->assertStatus(200);
    }
}
