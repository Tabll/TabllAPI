<?php


namespace App\Models\Tools;

use App\Models\Common\CommonValue;
use Illuminate\Database\Eloquent\Model;

class SMS extends Model
{
    const YUN_URL = "https://sms.yunpian.com";
    const SINGLE_SEND_URL = "https://sms.yunpian.com/v2/sms/single_send.json";

    private $apiKey;

    /**
     * SMS constructor.
     */
    public function __construct()
    {
        $this->apiKey = env('YUN_SMS_API_KEY');

        parent::__construct();
    }

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
        $url = self::SINGLE_SEND_URL;
        $encoded_text = urlencode("$content");
        $mobile = urlencode($mobile);
        $post_string = "apikey=" . $this->apiKey .
            "&text=" . $encoded_text . "&mobile=" . $mobile;

        if (env('APP_ENV') == CommonValue::TEST_ENV) {
            return true;
        }

        return $this->sockPost($url, $post_string);
    }

    /**
     * 发送 POST 请求
     *
     * @param $url
     * @param $query
     *
     * @return string
     */
    private static function sockPost($url, $query)
    {
        $data = "";
        $info = parse_url($url);
        $fp = fsockopen($info["host"], 80, $err_no, $err_str, 30);
        if (!$fp) {
            return $data;
        }
        $head = "POST " . $info['path'] . " HTTP/1.0\r\n";
        $head .= "Host: " . $info['host'] . "\r\n";
        $head .= "Referer: http://" . $info['host'] . $info['path'] . "\r\n";
        $head .= "Content-type: application/x-www-form-urlencoded\r\n";
        $head .= "Content-Length: " . strlen(trim($query)) . "\r\n";
        $head .= "\r\n";
        $head .= trim($query);
        fputs($fp, $head);
        $header = "";
        while ($str = trim(fgets($fp, 4096))) {
            $header .= $str;
        }
        while (!feof($fp)) {
            $data .= fgets($fp, 4096);
        }

        return $data;
    }
}
