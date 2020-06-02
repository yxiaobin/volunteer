<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");//团队名称
            $table->string("prim")->nullable();//团队队长
            $table->string("notice");//团队公告
            $table->string("num")->default(50);//团队人数
            $table->string("image")->nullable();//团队队徽
            $table->string("introduction")->nullable();//团队简介
            $table->string("token")->default("审核中");//团队是否审核通过


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team');
    }
}
