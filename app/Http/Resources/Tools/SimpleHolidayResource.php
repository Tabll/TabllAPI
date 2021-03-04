<?php

/** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Resources\Tools;

use App;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 日历
 *
 * Class SimpleHolidayResource
 *
 * @package App\Http\Resources\Tools
 */
class SimpleHolidayResource extends JsonResource
{
    public function toArray($request): string
    {
        return $this->date;
    }
}
