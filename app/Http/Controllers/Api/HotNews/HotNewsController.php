<?php

namespace App\Http\Controllers\Api\HotNews;

use App\Http\Controllers\Controller;
use App\Models\HotNews\HotNewsCurrent;
use Illuminate\Support\Facades\Request;

class HotNewsController extends Controller
{
    /**
     * @api 获取当前热搜
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        $hotNewsCurrent = HotNewsCurrent::get();

        return response()->success($hotNewsCurrent);
    }
}
