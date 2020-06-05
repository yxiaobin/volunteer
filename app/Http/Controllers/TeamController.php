<?php

namespace App\Http\Controllers;

use App\Help;
use App\Team;
use Illuminate\Http\Request;


class TeamController extends Controller
{
    //团队广场
    public function index(){
        $teams = Team::where("token",'=','审核已通过')->paginate(3);
        return view("team.index",compact('teams'));
    }
    //我的团队
    public function myteam(){
        return view("team.data");
    }
    public function create(){
        return view("team.new");
    }
    public function store(Request $request){
        //dd($request);
        $obj = Team::where("prim",'=',session("userid"))->get();
        if(count($obj)>0){
            echo "<div style='text-align: center;padding-top: 130px;color: black;'> 对不起，您已经有团队了不能在创建团队了！ <br><a href='javascript:history.go(-1)'>
            <span style='color: black; font: bold;'>返回</span></a></div>";
        }else{
            $team = new Team();
            $team->name = $request->input('name');
            $team->introduction = $request->input('introduction');
            if($request->file("file") == "" ){
                //空操作
            }else{
                $team->image = $request->file('file')->store("images");
            }
            $team->prim = session("userid");
            $team->notice = "暂无内容！";
            $team->save();
            echo "<div style='text-align: center;padding-top: 130px;color: black;'> 团队创建完成，正在等待管理员的审核! <br><a href='javascript:history.go(-1)'>
            <span style='color: black; font: bold;'>返回</span></a></div>";
        }

    }
}
