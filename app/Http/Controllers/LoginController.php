<?php

namespace App\Http\Controllers;

use App\User;
use App\Users;
use function foo\func;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Mail;
use Session;
class LoginController extends Controller
{
    //登录页面
    public function  index(){

      return view("login.index");
    }
    //登录逻辑
    public function login(Request $request){
        //dd($request);
        if(strtolower(session("yzmContent")) != strtolower($request->input("yzm"))){
            $msg = "验证码错误";
            return $msg;
        } else{
            if($request->input("email")=="root@email.com" && md5($request->input("password"))== md5("root")){
                session(["userid"=>'-1', 'rank'=>'1']);
                $msg = "登录成功";
                return $msg;
            }else{
                $user = User::where("email",'=',$request->input('email'))->get();
                if(count($user)==0)
                {
                    $msg = "不存在此用户";
                    return $msg;
                }else{
                    $user = $user->first();
                    if($user->password == md5($request->input("password"))){
                        session(["userid"=>$user->id,'rank'=>'0']);
                        $msg = "登录成功";
                        return $msg;
                    }else{
                        $msg = "用户密码错误，登陆失败";
                        return $msg;
                    }
                }
            }

        }


    }

    //注册逻辑页面
    public function register(Request $request){
        $user = new Users();
        $obj = Users::where("email",'=',$request->input("email"))->get();
        if(count($obj)>=1){
            $message = "此邮箱也被注册，请更换邮箱";
            session::flash('registerWrong',1);
            session(["message"=>$message]);
        }
        else if(strtolower(session('emailyzm'))==strtolower($request->input("emailyzm")) && strtolower(session("yzmContent")) ==strtolower($request->input("yzm"))){
            $user->name = $request->input("name");
            $user->email = $request->input("email");
            $user->password = md5($request->input("password")) ;
            $user->identity = "未认证用户";
            $user->save();
            $message = "数据添加成功";
            session::flash('registerWrong',2);
            session(["message"=>$message]);
            //session(['registerWrong'=>0,"message"=>$message]);

        }else if(strtolower(session("yzmContent")) ==strtolower($request->input("yzm"))){

            $message = "邮箱验证不正确，邮箱验证失败";
            session::flash('registerWrong',1);
            session(["message"=>$message]);

        }
        else if(strtolower(session('emailyzm'))==strtolower($request->input("emailyzm"))) {
            $message = "验证码不正确，数据添加失败";
            session::flash('registerWrong',1);
            session(["message"=>$message]);

        }else{
            $message = "请先点击发送邮箱验证码,然后注册";
            session::flash('registerWrong',1);
            session(["message"=>$message]);

        }
        return back();
    }
    //邮箱验证
    public function sendMail($address){
        $str = substr(md5(time()), 3,5 );//md5加密，time()当前时间戳
        session(["emailyzm"=>$str]);
        Mail::raw("感谢您的使用，你的验证码为".$str,function ($message)use($address){
            $message->to($address)->subject("志愿者服务系统账号注册");
        });
    }

    public function logout(){
        session(["rank"=>"","userid"=>""]);
        return redirect("/");
    }

}
