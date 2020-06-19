<?php


namespace App\Resources\Tools;

use App;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class InfoResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function toResponse($request)
    {
        $dbVersion = DB::select('SELECT VERSION() as version')[0]->version;
        $redis = app('redis.connection');
        $redisInfo = $redis->info();
        $redisVersion = $redisInfo["Server"]["redis_version"];
        return [
            'code' => 1,
            'message' => 'success',
            'time' => Carbon::now()->toDateTimeString(),
            'environment' => App::environment(),
            'version' => config('tabll.version'),
            'info_version' => App::version(),
            'db_version' => $dbVersion,
            'redis_version' => $redisVersion,
        ];
    }
}
