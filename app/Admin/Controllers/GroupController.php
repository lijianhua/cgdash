<?php

namespace App\Admin\Controllers;

use Log;
use App\Group;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class GroupController extends Controller
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

            $content->header('组');
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

            $content->header('组');
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
        return Admin::grid(Group::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            $grid->column('group_name', '组名');
            $grid->adposition('组屏幕总数(广告位总数)')->display(function ($adpositions) {
                $adCount = $ledCount = 0;
                foreach ($adpositions as $adposition) {
                    $adCount += $adposition['area_ad_count'];
                    $ledCount += $adposition['area_led_count'];
                }
                return "<span class='label label-success'>{$ledCount}({$adCount})</span>";
            });
            $grid->column('divident', '分红比例');
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
        return Admin::form(Group::class, function (Form $form) {
            $form->display('id', 'ID');
            $form->text('group_name', '组名')->rules('required');
            // $form->number('group_ad_count', '组广告位总数')->default(0)->rules('required');
            // $form->number('group_led_count', '组屏幕总数')->default(0)->rules('required');
            $form->rate('divident', '分红比例')->default(0)->rules('required');
            // $form->number('group_ad_surplus', '剩余广告位')->default(0)->rules('required');
            // $form->number('group_led_surplus', '剩余屏幕')->default(0)->rules('required');

            $form->display('created_at', '添加时间');
            // $form->display('updated_at', 'Updated At');
        });

    }

    public function getGroup()
    {
        $groups = Group::getGroup();
        $groupArray = [];
        foreach ($groups as $group){
            $groupArray[] = ['id' => $group['id'], 'text' => $group['group_name']];
        }
        return $groupArray;

    }
}
