<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');//用户id
            $table->string('name');//用户姓名
            $table->string('email')->unique();//用户登录验证邮箱
            $table->string('password');//用户密码
            $table->string("identity");//用户身份
            $table->string("token")->default(0); //认证
            $table->string("introduction")->nullable();//简介
            $table->string("image")->nullable();//头像
            $table->string("tokenfiles")->nullable();//认证材料
            $table->timestamps();//用户注册时间
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
