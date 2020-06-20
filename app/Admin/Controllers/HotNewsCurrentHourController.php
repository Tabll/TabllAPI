<?php

namespace App\Admin\Controllers;

use App\Admin\Metrics\Render\HotNewsHistoryRender;
use App\Admin\Repositories\HotNewsCurrentHour;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

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
            $grid->column('connecter', '相关')->responsive()
                ->label('primary')
                ->expand(HotNewsHistoryRender::make(['class' => \App\Models\HotNews\HotNewsCurrentHour::class]));
            $grid->rank;
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
        return Form::make(new HotNewsCurrentHour('labels'), function (Form $form) {
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
