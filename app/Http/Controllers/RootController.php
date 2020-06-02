<?php

namespace App\Http\Controllers;

use App\Help;
use App\Team;
use App\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RootController extends Controller
{
    //
    public function tokenuser(){
        $users = Users::where("token",'=','0')->get();
        return view("root.user",compact('users'));
    }
    public function storeuser(Users $user, $msg){
        if($msg == "1"){
            //同意
            $user->token="1";
        }else{
            //不同意
            $user->token="0";

        }
        $user->save();
        return  redirect("/tokenuser");

    }
    public function tokenteam(){
        $teams = Team::where("token",'=','审核中')->get();
        return view("root.team",compact("teams"));
    }
    public function storeteam(Team $team, $msg){
        if($msg == "1"){
            //同意
            $team->token="审核已通过";
        }else{
            //不同意
            $team->token="审核未通过";
        }
        $team->save();
        return  redirect("/tokenteam");
    }
    public function tokenhelp(){
        $helps = Help::where("status",'=',"审核中")->orderby("starttime",'desc')->get();
        return view("root.help",compact('helps'));
    }
    public function storehelp(Help $help, $msg){
        if($msg == "1"){
            //同意
            $help->status="审核已通过";
        }else{
            //不同意
            $help->status="审核未通过";

        }
        $help->save();
        return  redirect("/tokenhelp");
    }
}
