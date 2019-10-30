<?php


namespace App\Resources\Tools;

use App;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class InfoResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function toResponse($request)
    {
        return [
            'code' => 1,
            'message' => 'success',
            'time' => Carbon::now(),
            'environment' => App::environment(),
            'version' => config('tabll.version'),
            'info_version' => App::version(),
        ];
    }
}
