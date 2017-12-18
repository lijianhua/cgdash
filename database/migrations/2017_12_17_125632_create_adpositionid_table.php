<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdpositionidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adpositionid', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->comment('所属组ID');
            $table->string('province')->comment('省');
            $table->string('city')->comment('市');
            $table->string('area')->comment('地区');
            $table->string('address')->comment('地址');
            $table->integer('area_led_count')->comment('区域内广告屏数');
            $table->integer('area_ad_count')->comment('区域内广告位数');
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
        Schema::dropIfExists('adpositionid');
    }
}
