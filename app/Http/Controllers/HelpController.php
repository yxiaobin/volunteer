<?php

namespace App\Http\Controllers;

use App\Help;
use App\Userhelp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
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
    //修改活动页面
    public function editindex(Help $obj){
        return view('help.edit',compact('obj'));
    }
    //修改活动的存储逻辑
    public function editstore(Request $request){
        $help = Help::find($request->input("id"));
        $help->title= $request->input("title");
        $help->content= $request->input("editorValue");
        $help->starttime= $request->input("start_time");
        $help->endtime= $request->input("end_time");
        if($request->file("file") != null){
            $help->img= $request->file("file")->store("/images");
        }
        $help->num= $request->input("num");
        $help->status= "审核中";
        $help->categoryid = $request->input("category");
        $help->save();
        echo "<div style='text-align: center;padding-top: 130px;color: black;'> 修改成功，正在等待管理员的审核! <br><a href='/volunteer/public/myhelp'>
        <span style='color: black;'>返回</span></a></div>";
    }
    //删除活动页面逻辑
    public function delete(Help $obj){
        $obj->delete();
        return back();
    }
    //模糊查询---活动广场、我的求助和我报名的均已实现
    public function search(Request $request){
        //dd($request);
        switch ($request->input('leixing')){
            case 'guangchang':
                if($request->input("category")== 0){
                    $helps = Help::where("title",'like','%'.$request->input('key')."%")->where("status","=","审核已通过")->orderby("starttime",'desc')->paginate(3);
                    return view("home.activity",compact('helps'));
                }else if($request->input("key")!= null){
                    $helps = Help::where("title",'like','%'.$request->input('key').'%')->where("status","=","审核已通过")->where('categoryid','=',$request->input('catrgory'))->orderby("starttime",'desc')->paginate(3);
                    return view("home.activity",compact('helps'));
                }else {
                    $helps = Help::where("status","=","审核已通过")->where('categoryid','=',$request->input('catrgory'))->orderby("starttime",'desc')->paginate(3);
                    return view("home.activity",compact('helps'));
                }
                break;
            case 'qiuzhu':
                if($request->input("category")== 0){
                    $helps = Help::where('userid','=',session('userid'))->where("title",'like','%'.$request->input('key')."%")->orderby("starttime",'desc')->paginate(3);
                    return view("home.activity",compact('helps'));
                }else if($request->input("key")!= null){
                    $helps = Help::where('userid','=',session('userid'))->where("title",'like','%'.$request->input('key').'%')->where('categoryid','=',$request->input('catrgory'))->orderby("starttime",'desc')->paginate(3);
                    return view("home.activity",compact('helps'));
                }else {
                    $helps = Help::where('userid','=',session('userid'))->where('categoryid','=',$request->input('catrgory'))->orderby("starttime",'desc')->paginate(3);
                    return view("home.activity",compact('helps'));
                }
                break;
            case 'canjia':
                $ps = Userhelp::where("userid",'=',session('userid'))->get();
                $helps = array();
                foreach ($ps as $p){
                    if($request->input("category")== 0){
                        $keys = Help::where('id','=',$p->helpid)->where("title",'like','%'.$request->input("key").'%')->get();
                    }else{
                        $keys = Help::where('id','=',$p->helpid)->where("title",'like','%'.$request->input("key").'%')->where('categoryid','=',$request->input('catrgory'))->get();
                    }
                    foreach ($keys as $key){
                        array_push($helps,$key);
                    }
                }

                session::flash('fenye','no');
                return view("home.activity",compact('helps'));
                break;
        }
    }
    //退出
    public  function  quit($id){
        $p = Userhelp::where("helpid",'=',$id)->where("userid",'=',session('userid'))->get();
        if(count($p)>0) $p = $p->first();
        $help = Help::find($id);
        if($help->endtime <now()){
            echo "<div style='text-align: center;padding-top: 130px;color: red;'><h2>对不起, 该活动已结束，无法退出!</h2> <br><a href='/volunteer/public/myactivity'>
        <span style='color: black;'>返回</span></a></div>";
        }else{
            $help->finish = $help->finish -1;
            $help->save();
            $p->delete();
            echo "<div style='text-align: center;padding-top: 130px;color: green;'> <h2>成功退出此活动！ </h2> <br><a href='/volunteer/public/myactivity'>
        <span style='color: black;'>返回</span></a></div>";
        }

    }
}
