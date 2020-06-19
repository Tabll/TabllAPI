<?php


namespace App\Models\Tools;

use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    const YUN_URL = "https://sms.yunpian.com";

    /**
     * 发送短信
     *
     * @param $mobile string 手机号
     * @param $content string 短信内容
     *
     * @return bool
     */
    public function sendSMS($mobile, $content)
    {
        return true;
    }
}
