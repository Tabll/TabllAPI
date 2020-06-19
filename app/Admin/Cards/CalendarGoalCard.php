<?php

namespace App\Admin\Cards;

use Carbon\Carbon;
use Dcat\Admin\Widgets\Metrics\SingleRound;

class CalendarGoalCard extends SingleRound
{
    /**
     * 初始化卡片内容
     */
    protected function init()
    {
        parent::init();

        $this->title('当年进度');
        $this->subTitle('统计');

        $this->contentWidth(0, 12);
    }

    /**
     * 渲染模板
     *
     * @return string
     */
    public function render()
    {
        $this->fill();

        return parent::render();
    }

    /**
     * 写入数据.
     *
     * @return void
     */
    public function fill()
    {
        // 图表数据
        $this->withChart();
    }

    /**
     * 设置图表数据.
     *
     * @return $this
     */
    public function withChart()
    {
        return $this->chart([
            'series' => [
                bcdiv((Carbon::now()->diffInDays(Carbon::now()->startOfYear()) /
                Carbon::now()->startOfYear()->diffInDays(Carbon::now()->endOfYear())) * 100, 1, 2)
            ]
        ]);
    }
}
