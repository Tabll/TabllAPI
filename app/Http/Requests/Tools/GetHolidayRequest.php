<?php

namespace App\Http\Requests\Tools;

use App\Http\Requests\BaseRequest;

class GetHolidayRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'type' => 'nullable|integer|in:1',
            'region' => 'nullable|string|in:CN',
            'year' => 'nullable|integer|in:2020',
            'month' => 'nullable|integer',
            'group_by' => 'nullable|string|in:name,date'
        ];
    }

    public function messages()
    {
        return [
            'type.in' => '不支持的类型',
            'region.in' => '不支持的区域',
            'year.in' => '不支持的年份',
            'month.in' => '不支持的月份',
            'group_by.in' => '不支持的分组类型',
        ];
    }
}
