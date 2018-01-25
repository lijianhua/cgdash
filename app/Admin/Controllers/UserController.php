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

            $content->header('用户');
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

            $grid->column('name', '用户名');
            $grid->column('openid', '微信id');
            // $grid->column('email');
            $grid->userRelation('广告屏幕数')->display(function ($relations) {
                $ledCount = 0;
                foreach ($relations as $relation) {
                    $ledCount += $relation['group_with_led'];
                }
                return "<span class='label label-success'>{$ledCount}</span>";
            });
            $grid->column('now_money', '余额');
            $grid->column('input_money', '投入总金额');
            $grid->column('income_money', '收益总金额');
            $states = [
                    'on'  => ['value' => 1, 'text' => '通过', 'color' => 'primary'],
                    'off' => ['value' => 0, 'text' => '未通过', 'color' => 'default'],

            ];
            $grid->column('audit', '审核')->switch($states);
            // $grid->column('sold_ad', '年度已售广告位');
            // $grid->column('unsold_ad', '年度未售广告位');
            // $grid->created_at();
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
        return Admin::form(User::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->text('name', '用户名')->rules('required');
            $form->display('openid', 'openiD');
            $form->text('userName', '真实姓名')->rules('required');
            $form->text('telPhone', '手机号')->rules('required');
            $form->text('address', '地址')->rules('required');
            $form->text('bankName', '开户行')->rules('required');
            $form->text('referrer', '推荐人')->rules('required');
            $form->text('bankAccount', '账号')->rules('required');
            $form->email('email', '邮箱')->rules('required');
            $form->password('password', '密码')->default('123456');
            $form->number('ad_led', '广告屏幕数')->default(0)->rules('required');
            $form->currency('now_money', '余额')->symbol('￥')->rules('required');
            $form->currency('input_money', '投入总金额')->symbol('￥')->rules('required');
            $form->currency('income_money', '收益总金额')->symbol('￥')->rules('required');
            $form->number('sold_ad', '年度已售广告位')->default(0)->rules('required');
            $form->number('unsold_ad', '年度未售广告位')->default(0)->rules('required');
            $states = [
                    'on'  => ['value' => 1, 'text' => '通过', 'color' => 'primary'],
                    'off' => ['value' => 0, 'text' => '未通过', 'color' => 'default'],
            ];
            $form->switch('audit', '审核状态')->states($states);

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
