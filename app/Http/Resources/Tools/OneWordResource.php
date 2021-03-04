<?php


namespace App\Http\Resources\Tools;

use App;
use Illuminate\Http\Resources\Json\JsonResource;

class OneWordResource extends JsonResource
{
    use App\Http\Resources\Json\JsonResult;

    public function toArray($request)
    {
        return [
            'word' => $this->word,
            'from' => $this->from,
            'type' => $this->type,
        ];
    }
}
