<?php

namespace Tests\Feature\Api;

use App\Models\Tools\ResponseJson;
use Mail;
use Tests\TestCase;

/**
 * Class ExampleTest
 *
 * @coversDefaultClass \App\Http\Controllers\Api\Test\TestController
 * @package Tests\Api
 */
class TestControllerTest extends TestCase
{
    /**
     * 测试
     *
     * @return void
     */
    public function testBasicTest()
    {
//        $this->markTestSkipped('错误待解决');
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * 测试密码生成
     *
     * @covers ::getPassword
     * @return void
     */
    public function testGetPasswordTest()
    {
        $response = $this->get('api/test/password');

        $response->assertStatus(200);
    }

    /**
     * 测试字符串长度截取
     *
     * @covers ::getStringLength
     * @return void
     */
    public function testGetStringLength()
    {
        $response = $this->get('api/test/string/length');

        $response->assertStatus(200)
            ->assertJson([
                'code' => ResponseJson::RESPONSE_CODE,
                'message' => ResponseJson::RESPONSE_MESSAGE,
            ]);
    }

    /**
     * 测试邮件发送
     *
     * @covers ::sendTestMail
     * @return void
     */
    public function testSendTestEmail()
    {
        Mail::fake();

        $response = $this->json('GET', 'api/test/send/mail', [
            'address' => '905153840@qq.com'
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'code' => ResponseJson::RESPONSE_CODE,
                'message' => ResponseJson::RESPONSE_MESSAGE,
            ]);
    }

    /**
     * 测试短信发送
     *
     * @covers ::sendSMS
     * @return void
     */
    public function testSendSMS()
    {
        $response = $this->json('GET', 'api/test/send/sms');

        $response->assertStatus(200)
            ->assertJson([
                'code' => ResponseJson::RESPONSE_CODE,
                'message' => ResponseJson::RESPONSE_MESSAGE,
            ]);
    }
}
