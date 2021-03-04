<?php

namespace App\Admin\Controllers;

use App\Admin\Cards\CalendarGoalCard;
use App\Admin\Cards\CalenderDonutCard;
use App\Admin\Repositories\Calendar;
use Carbon\Carbon;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class CalendarController extends AdminController
{
    public function index(Content $content)
    {
        return $content
            ->header('节假日')
            ->description('节假日与调休信息')
            ->body(function ($row) {
                $row->column(4, new CalenderDonutCard());
                $row->column(3, new CalendarGoalCard());
            })
            ->body($this->grid());
    }


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Calendar(), function (Grid $grid) {
            $grid->setActionClass(Grid\Displayers\ContextMenuActions::class);
            $grid->quickSearch('name')->auto(true);
            $grid->export();

            $grid->id->sortable();
            $grid->type->help('区分节假日和调休')->filter(
                Grid\Column\Filter\In::make([
                    1 => '节假日',
                    2 => '调休',
                ])
            )->using([1 => '节假日', 2 => '调休']);
            $grid->region->using(['CN' => '中国'])->help('暂时只支持中国');
            $grid->name->filter(
                Grid\Column\Filter\Equal::make()->valueFilter()
            );
            $grid->year->filter(
                Grid\Column\Filter\Equal::make()->valueFilter()
            );
            $grid->date->sortable()->filter(
                Grid\Column\Filter\Between::make()->date()
            );
            $grid->toolsWithOutline(false);
            $grid->showQuickEditButton();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->between('year', '年份')->year();
                $filter->between('date', '节假日时间')->date();
                $filter->like('name', '节日名称');
            });

            $grid->quickCreate(function (Grid\Tools\QuickCreate $create) {
                $create->select('type', '类型')->options([
                    1 => '节假日',
                    2 => '调休',
                ])->default(1)->required();
                $create->select('region', '地区')->options([
                    'CN' => '中国'
                ])->default('CN')->required();
                $create->text('name', '节日名称')->required();
                $create->text('year', '年份')->default(Carbon::now()->addYear()->year)->required();
                $create->date('date', '时间')->required();
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
        return Show::make($id, new Calendar(), function (Show $show) {
            $show->id;
            $show->type;
            $show->region;
            $show->name;
            $show->year;
            $show->date;
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Calendar(), function (Form $form) {
            $form->display('id');
            $form->radio('type')->required()->options([1 => '节假日', 2 => '调休'])->default(1);
            $form->select('region')->required()->options(['CN' => '中国'])->default('CN');
            $form->text('name')->required();
            $form->year('year')->required()->default(Carbon::now()->year);
            $form->date('date')->required();
        });
    }
}
