<?php

namespace App\Services\Tools;

use App;

class MapService
{
    /**
     * 百度坐标转高德坐标
     * BD-09 坐标转换成 GCJ-02 坐标
     *
     * @param $bd_lon double
     * @param $bd_lat double
     *
     * @return mixed
     */
    public function bdToGd($bd_lon, $bd_lat)
    {
        $PI = 3.14159265358979324 * 3000.0 / 180.0;
        $x = $bd_lon - 0.0065;
        $y = $bd_lat - 0.006;
        $z = sqrt($x * $x + $y * $y) - 0.00002 * sin($y * $PI);
        $theta = atan2($y, $x) - 0.000003 * cos($x * $PI);
        $gd_lon = $z * cos($theta);
        $gd_lat = $z * sin($theta);
        $result['lon'] = round($gd_lon, 6);
        $result['lat'] = round($gd_lat, 6);

        return $result;
    }

    /**
     * 高德坐标转百度坐标
     * GCJ-02 坐标转换成 BD-09 坐标
     *
     * @param $gd_lon double
     * @param $gd_lat double
     *
     * @return mixed
     */
    public function gdToBd($gd_lon, $gd_lat)
    {
        $PI = 3.14159265358979324 * 3000.0 / 180.0;
        $x = $gd_lon;
        $y = $gd_lat;
        $z = sqrt($x * $x + $y * $y) - 0.00002 * sin($y * $PI);
        $theta = atan2($y, $x) - 0.000003 * cos($x * $PI);
        $bd_lon = $z * cos($theta) + 0.0065;
        $bd_lat = $z * sin($theta) + 0.006;
        $data['lon'] = round($bd_lon, 6);
        $data['lat'] = round($bd_lat, 6);

        return $data;
    }
}
