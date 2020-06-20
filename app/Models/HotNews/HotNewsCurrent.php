<?php

namespace App\Models\HotNews;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class HotNewsCurrent extends Model
{
    use HasDateTimeFormatter;

    protected $table = 'hot_news_current';
    public $timestamps = false;

    public function labels()
    {
        return $this->hasMany(HotNewsLabels::class, 'uuid', 'uuid');
    }
}
