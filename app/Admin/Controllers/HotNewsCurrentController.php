<?php

namespace App\Admin\Controllers;

use App\Admin\Metrics\Render\HotNewsHistoryRender;
use App\Admin\Repositories\HotNewsCurrent;
use App\Models\HotNews\HotNewsCurrentHour;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;
use Dcat\Admin\Widgets\Card;
use function Clue\StreamFilter\fun;

class HotNewsCurrentController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        Admin::style('.tab-content .da-box{margin-bottom:0}');
        return Grid::make(new HotNewsCurrent(), function (Grid $grid) {
            $grid->quickSearch('content')->auto(false);
            $grid->export();
            $grid->disableActions();
            $grid->model()->orderBy('rank');

            $grid->id->hide();
            $grid->uuid->responsive()->label('primary');
            $grid->connecter->responsive()
                ->label('primary')
                ->expand(HotNewsHistoryRender::make(['class' => \App\Models\HotNews\HotNewsCurrent::class]));
            $grid->rank->responsive()->sortable();
            $grid->content;
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
        return Form::make(new HotNewsCurrent(), function (Form $form) {
            $form->display('id');
            $form->text('rank');
            $form->text('content');
            $form->text('source');
            $form->text('heat');
            $form->text('uuid');
            $form->datetime('update_time');
        });
    }
}
