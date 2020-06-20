<?php

namespace App\Admin\Metrics\Render;

use App\Models\HotNews\HotNewsCurrent;
use App\Models\HotNews\HotNewsCurrentHour;
use App\Models\HotNews\HotNewsHistory;
use Dcat\Admin\Support\LazyRenderable;
use Dcat\Admin\Widgets\Table;

class HotNewsHistoryRender extends LazyRenderable
{
    public function render()
    {
        $id = $this->key;
        $class = $this->class;

        if ($class == HotNewsCurrent::class) {
            $uuid = HotNewsCurrent::select('uuid')->where('id', '=', $id)->first()->uuid;
        } elseif ($class == HotNewsCurrentHour::class) {
            $uuid = HotNewsCurrentHour::select('uuid')->where('id', '=', $id)->first()->uuid;
        } else {
            $uuid = HotNewsHistory::select('uuid')->where('id', '=', $id)->first()->uuid;
        }

        $data = HotNewsHistory::select('uuid', 'content', 'heat', 'source', 'calculate_time')
            ->whereUuid($uuid)
            ->orderBy('calculate_time')
            ->get()
            ->toArray();

        if (empty($data)) {
            $data = [['无', '无', '无', '无', '无']];
        }

        $titles = [
            'UUID',
            '内容',
            '热度',
            '来源',
            '计算时间',
        ];

        return Table::make($titles, $data);
    }
}
