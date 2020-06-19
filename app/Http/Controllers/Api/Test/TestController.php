<?php


namespace App\Http\Controllers\Api\Test;

use App\Http\Controllers\Controller;
use App\Http\Requests\Test\GetPasswordRequest;
use App\Http\Requests\Test\GetStringLengthRequest;
use App\Resources\Tools\InfoResource;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function sendTestMail()
    {

    }
}
