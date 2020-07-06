<?php

namespace App\Http\Requests\Test;

use App\Http\Requests\BaseRequest;

class SendTestEmailRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'address' => 'required|email',
            'name' => 'nullable|string|max:10',
        ];
    }

    public function messages()
    {
        return [
            'address.required' => '邮件地址必填',
            'address.email' => '邮件地址不合法',
            'name.string' => '名称不合法',
            'name.max' => '名称超过最大长度',
        ];
    }
}
