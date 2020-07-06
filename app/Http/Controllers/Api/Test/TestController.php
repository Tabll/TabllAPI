<?php


namespace App\Http\Controllers\Api\Test;

use App\Http\Controllers\Controller;
use App\Http\Requests\Test\GetPasswordRequest;
use App\Http\Requests\Test\GetStringLengthRequest;
use App\Http\Requests\Test\SendTestEmailRequest;
use App\Resources\Tools\InfoResource;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;

class TestController extends Controller
{
    public function sendSMS(Request $request)
    {
        return new InfoResource('');
    }

    /**
     * @api 随机生成密码
     *
     * @param  GetPasswordRequest  $request
     *
     * @return mixed
     */
    public function getPassword(GetPasswordRequest $request)
    {
        $length = $request->input('length', 10);

        return response()->success(Str::random($length));
    }

    /**
     * @api 截取字符串长度
     *
     * @param  GetStringLengthRequest  $request
     *
     * @return mixed
     */
    public function getStringLength(GetStringLengthRequest $request)
    {
        $string = $request->input('string', '');
        $maxLength = $request->input('length', 200);
        $endString = $request->input('end', '...');

        $length = mb_strlen($string);
        $maxLengthString = Str::limit($string, $maxLength, $endString);

        return response()->success([
            'length' => $length,
            'max_string' => $maxLengthString
        ]);
    }

    /**
     * @api 发送测试邮件
     *
     * @param  SendTestEmailRequest  $request
     *
     * @return mixed
     */
    public function sendTestMail(SendTestEmailRequest $request)
    {
        $address = $request->input('address');
        $name = $request->input('name', $address);
        try {
            Mail::send('emails.test', ['name' => $name], function ($message) use ($address) {
                $to = $address;
                $message->to($to)->subject('邮件测试');
            });
        } catch (\Exception $exception) {
            return response()->error();
        }

        return response()->success();
    }
}
