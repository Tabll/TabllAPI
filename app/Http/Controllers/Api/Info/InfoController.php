<?php


namespace App\Http\Controllers\Api\Info;

use App\Http\Controllers\Controller;
use App\Resources\Tools\InfoResource;
use Illuminate\Support\Facades\Request;

class InfoController extends Controller
{
    public function index(Request $request)
    {
        return new InfoResource('');
    }
}
