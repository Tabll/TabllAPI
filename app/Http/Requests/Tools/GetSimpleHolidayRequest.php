<?php

namespace App\Http\Requests\Tools;

use App\Http\Requests\BaseRequest;

class GetSimpleHolidayRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'type' => 'nullable|integer|in:1',
            'region' => 'nullable|string|in:CN',
            'year' => 'nullable|integer|in:2020',
            'month' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return [
            'type.in' => '不支持的类型',
            'region.in' => '不支持的区域',
            'year.in' => '不支持的年份',
            'month.in' => '不支持的月份',
        ];
    }
}
