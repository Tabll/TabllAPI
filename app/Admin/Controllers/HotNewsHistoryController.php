<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\HotNewsHistory;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class HotNewsHistoryController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new HotNewsHistory(), function (Grid $grid) {
            $grid->quickSearch('content')->auto(false);
            $grid->export();
            $grid->disableActions();

            $grid->id->hide();
            $grid->uuid->label('primary');
            $grid->content;
            $grid->heat->sortable();
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
            $grid->calculate_time->sortable();

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
        return Show::make($id, new HotNewsHistory(), function (Show $show) {
            $show->id;
            $show->uuid;
            $show->content;
            $show->heat;
            $show->source;
            $show->calculate_time;
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new HotNewsHistory(), function (Form $form) {
            $form->display('id');
            $form->text('uuid');
            $form->text('content');
            $form->text('heat');
            $form->text('source');
            $form->text('calculate_time');
        });
    }
}
