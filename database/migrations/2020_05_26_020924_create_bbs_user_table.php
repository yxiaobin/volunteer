<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBbsUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bbs_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string("preid")->default("-1");//表示回复的哪个帖子，-1表示主贴子
            $table->integer("userid");//表示谁回复的
            $table->longText("content");//表示内容是啥
            $table->string("title");//表示主题是啥
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
        Schema::dropIfExists('bbs_user');
    }
}
