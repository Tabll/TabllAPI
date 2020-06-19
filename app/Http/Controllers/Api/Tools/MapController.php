<?php

namespace App\Http\Controllers\Api\Tools;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tools\GetConvertMapRequest;
use App\Services\Tools\MapService;

class MapController extends Controller
{
    /**
     * @api 转换百度经纬度坐标至高德经纬度坐标
     *
     * @param GetConvertMapRequest $request
     * @param MapService $mapService
     *
     * @return mixed
     */
    public function convert(GetConvertMapRequest $request, MapService $mapService)
    {
        $type = $request->input('type');
        if ($type == "bd-to-gd") {
            $result = $mapService->bdToGd($request->input('lon'), $request->input('lat'));
        } else {
            $result = $mapService->gdToBd($request->input('lon'), $request->input('lat'));
        }

        return response()->success($result);
    }
}
