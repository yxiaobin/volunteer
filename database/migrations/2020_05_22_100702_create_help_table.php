<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("userid");//项目发起人
            $table->integer("categoryid");//活动类型
            $table->string("title")->nullable();//标题
            $table->longText("content")->nullable();//内容
            $table->string("starttime")->nullable();//开始时间
            $table->string("endtime")->nullable();//结束时间
            $table->string("img")->nullable();//封面图
            $table->integer("num")->default(20);//需要人数
            $table->integer("finish")->default(0);
            $table->string("status")->default("已提交");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('help');
    }
}
