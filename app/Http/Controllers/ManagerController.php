<?php

namespace App\Http\Controllers;

use App\Help;
use App\Userhelp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class ManagerController extends Controller
{
    //后台侧边栏
    public function index(){
        return view("layout.left");
    }
    //后台首页
    public function home(){
        return view("Home.index");
    }
    //志愿者活动广场页面
    public function activity(){
        //状态有 审核中、审核已通过、审核未通过、
        $helps = Help::where("status","=","审核已通过")->orderby("starttime",'desc')->paginate(3);
        return view("Home.activity",compact("helps"));
    }
    //发布新志愿编辑页面
    public function newhelp(){
        return view("help.new");
    }
    //我的求助列表
    public function myhelp(){
        $userid=session("userid");
        $helps = Help::where("userid",'=',$userid)->orderby("starttime",'decs')->paginate(3);
        //dd($helps);
        return view("Home.activity",compact("helps"));
    }
    //活动详情
    public function show(Help $obj){
        return  view("Home.activity_date",compact("obj"));
    }
    //报名项目
    public function join($obj){
        $data = array('msg','num');
       if(count(Userhelp::where("userid",'=',session("userid"))->where("helpid",'=',$obj)->get()) <= 0)
       {
               $p = new Userhelp();
               $p->userid = session("userid");
               $p->helpid = $obj;
               $p->time = now();
               $p->save();
               $data['msg'] = 1;
               $p = Help::find($obj);
               $p->finish = $p->finish+1;
               $p->save();
               $data['num'] = $p->finish;
       }else{
           $data['msg'] = 0;
       }
        return $data;
    }
    //我参加过的活动
    public function myactivity(){
        $ps = Userhelp::where("userid",'=',session('userid'))->get();
        //dd($helps);
        $helps = array();
        foreach ($ps as $p){
            $key = Help::find($p->helpid);
            array_push($helps,$key);
        }
        session::flash('fenye','no');
        //dd($helps);
        return view("Home.activity",compact('helps'));
    }
}
