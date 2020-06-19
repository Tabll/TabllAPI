<?php

namespace App\Models\Tools;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasDateTimeFormatter;

    public $timestamps = false; // 无时间戳

    const TYPE_HOLIDAY = 1;
    const TYPE_WORKDAY = 2;
    const REGION_CHINA = 'CN';
}
