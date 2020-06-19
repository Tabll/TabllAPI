<?php

namespace App\Admin\Cards;

use App\Models\Tools\Calendar;
use App\Services\Tools\ColorService;
use Carbon\Carbon;
use Dcat\Admin\Widgets\Metrics\Donut;

class CalenderDonutCard extends Donut
{
    protected $labels = [];
    protected $data = [];
    protected $calendar = [];
    protected $colors = [];

    /**
     * 初始化卡片内容
     */
    protected function init()
    {
        parent::init();

        $this->title('节假日分布');
        $this->subTitle('类别统计');

        $this->calendar = Calendar::selectRaw('COUNT(id) as total, name')
            ->where('year', Carbon::now()->year)
            ->where('type', Calendar::TYPE_HOLIDAY)
            ->groupBy('name')->get();
        $this->labels = $this->calendar->pluck('name')->toArray();
        $this->data = $this->calendar->pluck('total')->toArray();

        $this->chartLabels($this->labels);

        $this->colors = app(ColorService::class)->getRandomColors($this->calendar->count() + 1);
        // 设置图表颜色
        $this->chartColors($this->colors);
        $this->contentWidth(6, 6);
        $this->chartHeight(150);
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
    protected function fill()
    {
        $this->withContent();

        // 图表数据
        $this->withChart($this->calendar->pluck('total')->toArray());
    }

    /**
     * 设置图表数据.
     *
     * @param array $data
     *
     * @return $this
     */
    protected function withChart(array $data)
    {
        return $this->chart([
            'series' => $data
        ]);
    }

    /**
     * 设置卡片头部内容.
     *
     * @return $this
     */
    protected function withContent()
    {
        $style = 'margin-bottom: 0px';

        $content = "";
        $tempCounter = 0;

        foreach ($this->calendar as $calendar) {
            $content .= "
<div class=\"d-flex pl-1 pr-1 pt-1\" style=\"{$style}\">
<div style=\"width: 100%\">
<i class=\"fa fa-circle\" style=\"color: {$this->colors[$tempCounter]}\"></i> {$calendar->name}
</div>
<div style=\"width: 100%\">{$calendar->total} 天</div>
</div>";
            $tempCounter += 1;
        }

        return $this->content($content);
    }
}
