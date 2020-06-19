<?php

namespace App\Http\Requests\Tools;

use App\Http\Requests\BaseRequest;

class GetConvertMapRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'type' => 'required|string|in:bd-to-gd,gd-to-bd',
            'lon' => 'required|numeric|min:-180|max:180',
            'lat' => 'required|numeric|min:-90|max:90',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => '转换类型必填',
            'type.in' => '不支持的转换类型',
            'lon.required' => '经度必填',
            'lon.numeric' => '经度必须为数字',
            'lon.min' => '经度不合法',
            'lon.max' => '经度不合法',
            'lat.required' => '纬度必填',
            'lat.numeric' => '纬度必须为数字',
            'lat.min' => '纬度不合法',
            'lat.max' => '纬度不合法',
        ];
    }
}
