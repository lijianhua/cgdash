<?php

namespace App\Admin\Controllers;

use App\Adpositionid;
use App\Group;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class AdpositionidController extends Controller
{
    use ModelForm;
    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Adpositionid::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('group_id', '所属组');
            $grid->column('province', '省');
            $grid->column('city', '市');
            $grid->column('area', '地区');
            $grid->column('area_led_count', '区域内广告屏数');
            $grid->column('area_ad_count', '区域内广告位数');
            $grid->created_at('添加时间');
            // $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Adpositionid::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->select('group_id', '所属组')->options('/admin/getGroup')->rules('required');
            $form->text('province', '省')->rules('required');
            $form->text('city', '市')->rules('required');
            $form->text('area', '地区')->rules('required');
            $form->text('address', '地址')->rules('required');
            $form->number('area_led_count', '区域内广告屏数')->default(0)->rules('required');
            $form->number('area_ad_count', '区域内广告位数')->default(0)->rules('required');

            // $form->display('created_at', '添加时间');
           // $form->display('updated_at', 'Updated At');
        });
    }
}
