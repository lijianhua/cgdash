<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCgGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cg_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group_name')->comment('组名');
            $table->integer('group_ad_count')->comment('组广告位总数');
            $table->integer('group_led_count')->comment('组屏幕总数');
            $table->integer('group_ad_surplus')->comment('组剩余广告位数');
            $table->integer('group_led_surplus')->comment('组剩余屏数');
            $table->integer('divident')->comment('分红比例');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cg_groups');
    }
}
