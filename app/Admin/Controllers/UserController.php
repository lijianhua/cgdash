<?php

namespace App\Admin\Controllers;

use App\User;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class UserController extends Controller
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

            $content->header('用户');
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
        return Admin::grid(User::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('name');
            $grid->column('email');
            $grid->created_at();
            $grid->updated_at();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(User::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->text('name', '用户名')->rules('required');
            $form->email('email', '邮箱')->rules('required');
            $form->password('password', '密码')->default('123456');
            $form->number('ad_led', '广告屏幕数')->default(0)->rules('required');
            $form->number('now_money', '余额')->default(0)->rules('required');
            $form->number('input_money', '投入总金额')->default(0)->rules('required');
            $form->number('income_money', '收益总金额')->default(0)->rules('required');
            $form->number('sold_ad', '年度已售广告位')->default(0)->rules('required');
            $form->number('unsold_ad', '年度未售广告位')->default(0)->rules('required');

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }


    public static function getUser()
    {
        $users = User::getUser();
        $userArray = [];
        foreach ($users as $user){
            $userArray[] = ['id' => $user['id'], 'text' => $user['name']];
        }
        return $userArray;

    }

}
