<?php

namespace App\Http\Controllers;

use App\User;
use App\Userhelp;
use App\Users;
use Illuminate\Http\Request;


class UserController extends Controller
{
    //用户认证页面
    public function index(){
        return view("user.token");
    }
    //用户信息页面
    public function info(){
        $obj = Users::find(session("userid"));
        return view("user.info",compact('obj'));
    }
    //明星榜
    public function rank(){
        $objs = Array();//最终结果集
        $users = Users::all();//得到所有的用户
        foreach($users as $user){
            $p = Userhelp::where("userid",'=',$user->id)->get();
            array_push($objs , ['time'=>count($p),'user'=>$user]);
        }
        array_multisort(array_column($objs,'time'),SORT_DESC,$objs);
        $users = $objs;
        return view("user.rank",compact('users'));
    }
    //用户修改页面
    public function update(Request $request){
        $user = Users::find(session("userid"));
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        if($request->file("image") == "" ){
            //空操作
        }else{
            $user->image = $request->file("image")->store("images");
        }
        $user->introduction = $request->input("introduction");
        $user->save();
        return $user;
    }
    //用户认证
    public function token(Request $request){
        //dd($request);
        $user = Users::find(session("userid"));

        $user->identity = $request->input("token");
        if($request->file("file") == "" ){
            //空操作
        }else{
            $user->tokenfiles = $request->file("file")->store("tokens");
        }
        $user->save();
        echo " <div style='text-align: center;padding-top: 130px;'> 
                材料上传成功，正在等待管理员的审核!
                <br><a href='javascript:history.go(-1)'>
                        <span style='color: black;'>返回</span>
                    </a>
                </div>";
    }
}
