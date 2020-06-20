<?php

namespace App\Models\HotNews;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class HotNewsLabels extends Model
{
    protected $fillable = ['id', 'uuid', 'label'];

    protected $table = 'hot_news_labels';
    public $timestamps = false;
}
