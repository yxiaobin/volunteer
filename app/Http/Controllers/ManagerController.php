<?php

namespace App\Http\Controllers;

use App\Category;
use App\Help;
use App\Recommend;
use App\Userhelp;
use App\Users;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Object_;
use PhpParser\Node\Expr\Array_;
use Session;

class ManagerController extends Controller
{
    //后台侧边栏
    public function index(){
        return view("layout.left");
    }
    //后台首页-----智能推荐
    public function home(){
        if(session('rank')==0){
            $user = Users::find(session("userid"));//找出目标用户
            $users = Users::all(); //找出所有用户
            $catrgorys = Category::all(); //找出所有类别
            $values = Array();   //定义评分数组
            $sum = Array();//记录每个用户的打分总分
            $num = Array();//记录每个用户的数量
            foreach($users as $p){
                $sum[$p->name] = 0;
                $num[$p->name] = Recommend::where("userid",'=',$p->id)->get();
                foreach($catrgorys as $q){
                    //查找评分表看是否存在这个这个评分
                    $out = Recommend::where("userid",'=',$p->id)->where("categoryid",'=',$q->id)->get();
                    //如果不存在，则默认为0
                    if(count($out)==0){
                        $values[$p->name][$q->name]=0;
                    }else{
                        $out = $out->first();
                        $values[$p->name][$q->name]=$out->value;
                    }
                    $sum[$p->name] = $sum[$p->name] + $values[$p->name][$q->name];
                }
            }//生成打分的二维表
            //var_dump($values);  //正确
            foreach($users as $p){
                //总分变成平均分
                if(count($num[$p->name])>0){
                    $sum[$p->name] = $sum[$p->name]/count($num[$p->name]);
                }
                foreach($catrgorys as $q){
                    $values[$p->name][$q->name] = $values[$p->name][$q->name] - $sum[$p->name];
                }
            }//评分去中心化
            //dd($values);//正确
            $recommend = Array();//生成相似余弦二维数组
            $username =  Array();//将用户姓名与下标一一对应
            $categoryname =  Array();//将类别名称与下标一一对应
            for ($i=0;$i<count($catrgorys);$i++){//
                $categoryname[$i] = $catrgorys[$i]->name ;
            }
            for ($i=0;$i<count($users);$i++){//
                $username[$i] = $users[$i]->name ;
            }
            for ($i=0;$i<count($catrgorys)-1;$i++){
                for($j=$i;$j<count($catrgorys);$j++){
                    $x = 0;//存储点乘
                    $y = 0;//存储某X的模长
                    $z = 0;//存储某y的模长
                    foreach ($users as  $p){
                        $x = $x + ($values[$p->name][$categoryname[$i]] * $values[$p->name][$categoryname[$j]]);
                        $y = $y + ($values[$p->name][$categoryname[$i]] * $values[$p->name][$categoryname[$i]]);
                        $z = $z + ($values[$p->name][$categoryname[$j]] * $values[$p->name][$categoryname[$j]]);
                    }
                    $y = sqrt($y);
                    $z = sqrt($z);
                    if($y*$z > 0){
                        $recommend[$categoryname[$j]][$categoryname[$i]] = $recommend[$categoryname[$i]][$categoryname[$j]] = $x/($y*$z);
                    }else{
                        $recommend[$categoryname[$j]][$categoryname[$i]] = $recommend[$categoryname[$i]][$categoryname[$j]] = 0;
                    }
                }
            }//求余弦
            //dd($recommend); 正常
            //找出该用户最喜欢的某一类。
            $targets = $values[$user->name];//找到该用户对所有的评分
            arsort($targets);//排序--倒序。
            $name = key($targets);//获取第一个健名。
            $targets = $recommend[$name];//获取类别相似矩阵
            //dd($targets); //正常
            arsort($targets);//排序--倒序。
            $keyname = array_keys($targets);
            //dd($keyname); //正常----得到了一个逆向排序。
            $helps = [];//最终的推荐
            foreach ($keyname as $key){
                $caregoryid = Category::where('name','=',$key)->get()->first();
                $objs = Help::where("categoryid",'=',$caregoryid->id)
                                ->where("status",'=',"审核已通过")
                                    ->where("endtime",'>=',now())
                                        ->whereNotIn('id',function ($query) use ($user){
                                            $query->select('helpid')->from('userhelp')->where('userid', '=',$user->id);
                                        })
                                        ->get();

                if(count($helps)>=6){
                    break;
                }else{
                    foreach ($objs as $obj){
                        array_push($helps,$obj);
                    }
                }
            } //求与此类最相似的志愿活动----6个。

            $helps = (object)$helps;
            $num = count((array)$helps);
        }
        return view("Home.index",compact('helps','num'));
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
        session::flash('msg','myhelp');
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
