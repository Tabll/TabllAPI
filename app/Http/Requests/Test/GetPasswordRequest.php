<?php

namespace App\Http\Requests\Test;

use App\Http\Requests\BaseRequest;

class GetPasswordRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'length' => 'nullable|integer|max:128|min:1',
        ];
    }

    public function messages()
    {
        return [
            'length.max' => '超出最大长度限制',
            'length.min' => '超出最小长度限制',
        ];
    }
}
