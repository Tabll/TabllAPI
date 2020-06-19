<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\OneWord;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class OneWordController extends AdminController
{

    public function index(Content $content)
    {
        return $content
            ->header('一言')
            ->description('one word')
            ->body($this->grid());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new OneWord(), function (Grid $grid) {
            $grid->setActionClass(Grid\Displayers\Actions::class);
            $grid->quickSearch('word')->auto(true);
            $grid->export();

            $grid->id->sortable()->responsive();
            $grid->word->responsive();
            $grid->from->responsive()->filter(
                Grid\Column\Filter\Equal::make()->valueFilter()
            );
            $grid->type->responsive()->using([1 => '通常']);
            $grid->created_at->sortable()->responsive();
            $grid->updated_at->sortable()->responsive();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->like('word');
                $filter->like('from');
                $filter->between('created_at')->datetime();
                $filter->between('updated_at')->datetime();
            });

            $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
                $create->select('type', '类型')->options([
                    1 => '通常',
                ])->default(1)->required();
                $create->text('word', '一言')->maxLength(300)->required();
                $create->text('from', '作者')->default('匿名')->maxLength(20)->required();
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
        return Show::make($id, new OneWord(), function (Show $show) {
            $show->id;
            $show->word;
            $show->from;
            $show->type;
            $show->created_at;
            $show->updated_at;
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new OneWord(), function (Form $form) {
            $form->display('id');
            $form->text('word');
            $form->text('from');
            $form->radio('type')->required()->options([1 => '通常'])->default(1);
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
