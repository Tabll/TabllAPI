<?php

namespace App\Admin\Controllers;

use App\Admin\Metrics\Render\HotNewsHistoryRender;
use App\Admin\Repositories\HotNewsHistory;
use App\Models\HotNews\HotNewsLabels;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class HotNewsHistoryController extends AdminController
{
    public function index(Content $content)
    {
        return $content
            ->header('热搜历史')
            ->description('Hot News Histories')
            ->body($this->grid());
    }

    protected function grid()
    {
        return Grid::make(new HotNewsHistory('labels'), function (Grid $grid) {
            $grid->setActionClass(Grid\Displayers\ContextMenuActions ::class);
            $grid->quickSearch('content')->auto(false);
            $grid->disableDeleteButton();
            $grid->disableViewButton();
            $grid->disableEditButton();
            $grid->showQuickEditButton();
            $grid->disableBatchDelete();
            $grid->export();

            $grid->id->hide();
            $grid->uuid->label('primary');
            $grid->column('connecter', '相关')
                ->label('primary')
                ->expand(HotNewsHistoryRender::make(['class' => \App\Models\HotNews\HotNewsHistory::class]));
            $grid->content;
            $grid->heat->sortable();
            $grid->labels->pluck('label')->label();
            $grid->source->filter(
                Grid\Column\Filter\In::make(HotNewsLabels::$source)
            )->using(HotNewsLabels::$source)->label(HotNewsLabels::$sourceColor);
            $grid->calculate_time->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->like('content');
            });
        });
    }

    protected function detail($id)
    {
        return Show::make($id, new HotNewsHistory(), function (Show $show) {
            $show->id;
            $show->uuid;
            $show->content;
            $show->heat;
            $show->source;
            $show->calculate_time;
        });
    }

    protected function form()
    {
        return Form::make(new HotNewsHistory('labels'), function (Form $form) {
            $form->display('id');
            $form->display('uuid');
            $form->display('content');
            $form->display('heat');
            $form->display('source');
            $form->display('calculate_time');
            $form->hasMany('labels', '标签', function (Form\NestedForm $form) {
                $form->select('label', '标签')->options(HotNewsLabels::$labels);
            })->useTable();
        });
    }
}
