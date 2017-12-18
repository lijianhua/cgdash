<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // 添加新字段
            $table->integer('ad_led')->comment('广告屏总数');
            $table->integer('now_money')->comment('余额');
            $table->integer('input_money')->comment('投入总额');
            $table->integer('income_money')->comment('收入总额');
            $table->integer('sold_ad')->comment('年度已售广告位');
            $table->integer('unsold_ad')->comment('年度未售广告位');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // 删除添加的字段
            $table->dropColumn(['ad_led', 'now_money', 'input_money', 'income_money', 'sold_ad', 'unsold_ad']);
        });
    }
}
