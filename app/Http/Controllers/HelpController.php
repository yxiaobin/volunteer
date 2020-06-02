<?php

namespace App\Http\Controllers;

use App\Help;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HelpController extends Controller
{
    //
    public function add(Request $request){
        //dd($request);
        $help = new Help();
        $help->title= $request->input("title");
        $help->userid= session("userid");
        $help->content= $request->input("editorValue");
        $help->starttime= $request->input("start_time");
        $help->endtime= $request->input("end_time");
        $help->img= $request->file("file")->store("/images");
        $help->num= $request->input("num");
        $help->finish= "0";
        $help->status= "审核中";
        $help->categoryid = $request->input("category");
        $help->save();
        echo "<div style='text-align: center;padding-top: 130px;color: black;'> 发布成功，正在等待管理员的审核! <br><a href='/volunteer/public/myhelp'>
        <span style='color: black;'>返回</span></a></div>";

    }
}
