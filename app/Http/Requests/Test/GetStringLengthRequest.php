<?php

namespace App\Http\Requests\Test;

use App\Http\Requests\BaseRequest;

class GetStringLengthRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'string' => 'nullable|string|max:10000',
            'length' => 'nullable|integer|min:1',
            'end' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'string.max' => '超出最大长度限制',
            'length.min' => '超出最小长度限制',
        ];
    }
}
