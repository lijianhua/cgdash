<?php

namespace App\Admin\Controllers;

use App\Relations;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class RelationsController extends Controller
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

            $content->header('组内用户');
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

            $content->header('组内用户');
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
        return Admin::grid(Relations::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->user()->name('用户');
            $grid->group()->group_name('组');
            $grid->column('group_with_ad', '组内广告位总数');
            $grid->column('group_with_led', '组内屏幕总数');
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
        return Admin::form(Relations::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->select('user_id', '用户')->options('/dashboard/getUser')->rules('required');
            $form->select('group_id', '组名')->options('/dashboard/getGroup')->rules('required');
            $form->number('group_with_ad', '组内广告位总数')->default(0)->rules('required');
            $form->number('group_with_led', '组内屏幕总数')->default(0)->rules('required');

            $form->display('created_at', '添加时间');
            // $form->display('updated_at', 'Updated At');
        });

    }
}
