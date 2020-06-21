<?php

namespace App\Models\HotNews;

use Illuminate\Database\Eloquent\Model;

class HotNewsLabels extends Model
{
    protected $fillable = ['id', 'uuid', 'label'];

    protected $table = 'hot_news_labels';
    public $timestamps = false;

    public static $labels = [
        '政治' => '政治',
        '经济' => '经济',
        '数码' => '数码',
        '科技' => '科技',
        '新闻' => '新闻',
        '生活' => '生活',
        '娱乐' => '娱乐',
        '其它' => '其它',
    ];

    public static $source = [
        'w' => '微博',
        'z' => '知乎',
        'default' => '未知',
    ];

    public static $sourceColor = [
        'w' => 'danger',
        'z' => 'success',
        'default' => 'primary',
    ];
}
