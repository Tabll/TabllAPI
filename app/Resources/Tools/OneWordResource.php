<?php


namespace App\Resources\Tools;

use App;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OneWordResource extends JsonResource
{
    use App\Resources\Json\JsonResult;

    public function toArray($request)
    {
        return [
            'word' => $this->word,
            'from' => $this->from,
            'type' => $this->type,
        ];
    }
}
