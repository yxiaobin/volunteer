<?php

namespace App\Http\Controllers;

use App\Help;
use App\Team;
use Illuminate\Http\Request;


class TeamController extends Controller
{
    //团队广场
    public function index(){
        $helps = new Help();
        return view("team.index",compact('helps'));
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
        echo "<div style='text-align: center;padding-top: 130px;'> 团队创建完成，正在等待管理员的审核!</div>";

    }
}
