<?php

namespace App\Http\Controllers\Api\Tools;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tools\GetHolidayRequest;
use App\Http\Requests\Tools\GetSimpleHolidayRequest;
use App\Http\Resources\Tools\SimpleHolidayResource;
use App\Models\Tools\Calendar;
use Carbon\Carbon;
use DB;

class CalenderController extends Controller
{
    /**
     * @api 获取节假日数组
     *
     * @param  GetSimpleHolidayRequest  $request
     *
     * @return mixed
     */
    public function getSimpleHoliday(GetSimpleHolidayRequest $request)
    {
        $type = $request->input('type', Calendar::TYPE_HOLIDAY);
        $region = $request->input('region', Calendar::REGION_CHINA);
        $year = $request->input('year', Carbon::now()->year);
        $month = $request->input('month');
        $calendar = Calendar::where('type', '=', $type)
            ->whereRegion($region)
            ->where('year', '=', $year)
            ->when($month, function ($query) use ($month) {
                $query->where(DB::raw('MONTH(date)'), '=', $month);
            })
            ->get();

        return SimpleHolidayResource::collection($calendar);
    }

    /**
     * @api 获取节假日数组
     *
     * @param  GetHolidayRequest  $request
     *
     * @return mixed
     */
    public function getHoliday(GetHolidayRequest $request)
    {
        $type = $request->input('type', Calendar::TYPE_HOLIDAY);
        $region = $request->input('region', Calendar::REGION_CHINA);
        $year = $request->input('year', Carbon::now()->year);
        $month = $request->input('month');
        $groupBy = $request->input('group_by');
        $calendar = Calendar::select('date', 'name')
            ->where('type', '=', $type)
            ->where('region', '=', $region)
            ->where('year', '=', $year)
            ->when($month, function ($query) use ($month) {
                $query->where(DB::raw('MONTH(date)'), '=', $month);
            })
            ->get();

        if ($groupBy) {
            $calendar = $calendar->groupBy($groupBy);
        }

        return response()->success($calendar);
    }
}
