<?php

namespace App\Admin\Controllers;

use App\Admin\Metrics\Render\HotNewsHistoryRender;
use App\Admin\Repositories\HotNewsCurrentHour;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class HotNewsCurrentHourController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new HotNewsCurrentHour(), function (Grid $grid) {
            $grid->quickSearch('content')->auto(false);
            $grid->export();

            $grid->disableActions();

            $grid->id->hide();
            $grid->uuid->label('primary');
            $grid->connecter->responsive()
                ->label('primary')
                ->expand(HotNewsHistoryRender::make(['class' => \App\Models\HotNews\HotNewsCurrentHour::class]));
            $grid->rank;
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
            $grid->heat;
            $grid->update_time->sortable();

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

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new HotNewsCurrentHour(), function (Form $form) {
            $form->display('id');
            $form->text('rank');
            $form->text('content');
            $form->text('source');
            $form->text('heat');
            $form->text('uuid');
            $form->text('update_time');
        });
    }
}
