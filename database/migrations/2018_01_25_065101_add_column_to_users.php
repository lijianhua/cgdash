<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('userName');
            $table->integer('telPhone');
            $table->string('address');
            $table->string('bankName');
            $table->string('bankAccount');
            $table->string('referrer');
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
            //
            $table ->dropColumn('userName');
            $table ->dropColumn('telPhone');
            $table ->dropColumn('address');
            $table ->dropColumn('bankAccount');
            $table ->dropColumn('bankName');
            $table ->dropColumn('referrer');
        });
    }
}
