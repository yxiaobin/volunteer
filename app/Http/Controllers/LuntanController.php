<?php

namespace App\Http\Controllers;

use App\Bbs;
use App\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LuntanController extends Controller
{
    //
    public function list(){
        $objs = Bbs::where('preid','=','-1')->orderby("created_at",'desc')->get();
        return view("bbs.list",compact('objs'));
    }
    public function mybbs(){
        $objs = Bbs::where("userid",'=',session("userid"))->orderby("created_at",'desc')->get();
        return view("bbs.list",compact('objs'));
    }
    public function show(Bbs $obj){
        $user = Users::find($obj->userid);
        $objs = Bbs::where('preid','=',$obj->id)->orderby("id",'desc')->get();
        return view("bbs.date",compact("obj",'user','objs'));
    }
    public function new(){
        return view("bbs.new");
    }
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
}
