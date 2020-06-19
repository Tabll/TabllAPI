<?php

namespace App\Http\Controllers\Api\Monitor;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class PublicMonitorController extends Controller
{
    /**
     * @api 腾讯数据库-上海监控
     *
     * @param  Request  $request
     *
     * @return Mixed
     */
    public function databaseStatusTXSH(Request $request)
    {
        return 'running';
    }

    /**
     * @api Redis 腾讯-上海
     * @param  Request  $request
     *
     * @return string
     */
    public function redisStatusTXSH(Request $request)
    {
        return 'running';
    }
    /**
     * @api Redis 服务器-本地
     *
     * @param  Request  $request
     *
     * @return string
     */
    public function redisStatusTXLO(Request $request)
    {
        return 'running';
    }
}
