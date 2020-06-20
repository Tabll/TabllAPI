<?php

namespace App\Admin\Controllers;

use App\Admin\Cards\CalendarGoalCard;
use App\Admin\Cards\CalenderDonutCard;
use App\Admin\Metrics\Render\HotNewsHistoryRender;
use App\Admin\Repositories\HotNewsCurrent;
use App\Models\HotNews\HotNewsCurrentHour;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Widgets\Card;
use function Clue\StreamFilter\fun;

class HotNewsCurrentController extends AdminController
{

    public function index(Content $content)
    {
        return $content
            ->header('当前热搜')
            ->description('Current Hot News')
            ->body($this->grid());
    }

    protected function grid()
    {
        Admin::style('.tab-content .da-box{margin-bottom:0}');
        return Grid::make(new HotNewsCurrent('labels'), function (Grid $grid) {
            $grid->setActionClass(Grid\Displayers\ContextMenuActions ::class);
            $grid->quickSearch('content')->auto(false);
            $grid->disableDeleteButton();
            $grid->disableEditButton();
            $grid->disableViewButton();
            $grid->showQuickEditButton();
            $grid->disableBatchDelete();
            $grid->export();

            $grid->model()->orderBy('rank');
            $grid->id->hide();
            $grid->uuid->responsive()->label('primary');
            $grid->column('connecter', '相关')->responsive()
                ->label('primary')
                ->expand(HotNewsHistoryRender::make(['class' => \App\Models\HotNews\HotNewsCurrent::class]));
            $grid->rank->responsive()->sortable();
            $grid->content;
            $grid->labels->pluck('label')->label();
            $grid->source->responsive()->filter(
                Grid\Column\Filter\In::make([
                    'w' => '微博',
                    'z' => '知乎',
                ])
            )->using(['w' => '微博', 'z' => '知乎', 'default' => '未知'])->label([
                'w' => 'danger',
                'z' => 'success',
                'default' => 'primary',
            ]);
            $grid->heat->responsive();
            $grid->update_time->responsive();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->like('content');
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new HotNewsCurrent(), function (Show $show) {
            $show->id;
            $show->rank;
            $show->content;
            $show->source;
            $show->heat;
            $show->uuid;
            $show->update_time;
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new HotNewsCurrent('labels'), function (Form $form) {
            $form->display('id');
            $form->display('rank');
            $form->display('content');
            $form->display('source');
            $form->display('heat');
            $form->display('uuid');
            $form->display('update_time');

            $form->hasMany('labels', '标签', function (Form\NestedForm $form) {
                $form->select('label', '标签')->options([
                    '测试' => '测试',
                    '综艺' => '综艺',
                ]);
            })->useTable();
        });
    }
}
