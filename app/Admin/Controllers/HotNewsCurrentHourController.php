<?php

namespace App\Admin\Controllers;

use App\Admin\Metrics\Render\HotNewsHistoryRender;
use App\Admin\Repositories\HotNewsCurrentHour;
use App\Models\HotNews\HotNewsLabels;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class HotNewsCurrentHourController extends AdminController
{

    public function index(Content $content)
    {
        return $content
            ->header('热搜小时')
            ->description('Hot News Recent Hours Info')
            ->body($this->grid());
    }

    protected function grid()
    {
        return Grid::make(new HotNewsCurrentHour('labels'), function (Grid $grid) {
            $grid->setActionClass(Grid\Displayers\ContextMenuActions ::class);
            $grid->quickSearch('content')->auto(false);
            $grid->disableDeleteButton();
            $grid->disableEditButton();
            $grid->disableViewButton();
            $grid->showQuickEditButton();
            $grid->disableBatchDelete();
            $grid->export();

            $grid->id->hide();
            $grid->uuid->label('primary');
            $grid->column('connecter', '相关')->label('primary')
                ->expand(HotNewsHistoryRender::make(['class' => \App\Models\HotNews\HotNewsCurrentHour::class]));
            $grid->rank;
            $grid->content;
            $grid->labels->pluck('label')->label();
            $grid->source->filter(
                Grid\Column\Filter\In::make(HotNewsLabels::$source)
            )->using(HotNewsLabels::$source)->label(HotNewsLabels::$sourceColor);
            $grid->heat;
            $grid->update_time->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->like('content');
            });
        });
    }

    protected function detail($id)
    {
        return Show::make($id, new HotNewsCurrentHour(), function (Show $show) {
            $show->id;
            $show->rank;
            $show->content;
            $show->source;
            $show->heat;
            $show->uuid;
            $show->update_time;
        });
    }

    protected function form()
    {
        return Form::make(new HotNewsCurrentHour('labels'), function (Form $form) {
            $form->display('id');
            $form->display('rank');
            $form->display('content');
            $form->display('source');
            $form->display('heat');
            $form->display('uuid');
            $form->display('update_time');
            $form->hasMany('labels', '标签', function (Form\NestedForm $form) {
                $form->select('label', '标签')->options(HotNewsLabels::$labels);
            })->useTable();
        });
    }
}
