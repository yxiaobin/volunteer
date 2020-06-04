<?php

namespace App\Http\Controllers;

use App\Bbs;
use App\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LuntanController extends Controller
{
    //所有帖子列表页面
    public function list(){
        $objs = Bbs::where('preid','=','-1')->orderby("created_at",'desc')->paginate(3);
        $bbs = 0;
        return view("bbs.list",compact('objs','bbs'));
    }
    //我的帖子列表页面
    public function mybbs(){
        $objs = Bbs::where("userid",'=',session("userid"))->where('preid','=','-1')->orderby("created_at",'desc')->paginate(3);
        $bbs  =1;
        return view("bbs.list",compact('objs','bbs'));
    }
    //某一个帖子的具体展示页面
    public function show(Bbs $obj){
        $user = Users::find($obj->userid);
        $objs = Bbs::where('preid','=',$obj->id)->orderby("id",'desc')->get();
        return view("bbs.date",compact("obj",'user','objs'));
    }
    //新建帖子跳转页面
    public function new(){
        return view("bbs.new");
    }
    //新建帖子存储逻辑
    public function store(Request $request){
        $obj = new Bbs();
        $obj->title = $request->input("title");
        $obj->content = $request->input("content");
        $obj->userid = session("userid");
        $obj->preid = $request->input("preid");
        $obj->save();
        $msg = "发帖成功";
        return $msg;
    }
    //回复帖子
    public function huifu(Request $request){
        $bbs = new Bbs();
        $bbs->userid = $request->input("userid");
        $bbs->preid = $request->input("bbsid");
        $bbs->content = $request->input("content");
        $bbs->title = $request->input("title");
        $bbs->save();
        $msg = "发帖成功";
        return  $msg;
    }
    //删除帖子
    public function delete(Bbs $obj){
        $obj->delete();
        return back();
    }
}
