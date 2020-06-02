<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>网站后台管理模版</title>
    <link rel="stylesheet" type="text/css" href="{{asset("/layui//static/admin/layui/css/layui.css")}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset("/layui/static/admin/css/admin.css")}}"/>
    <style>
        .welcome-left-container1{
            width: 96%;
            height: 100%;
            overflow: hidden;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
            padding: 43px 206px;
        }
    </style>
</head>
<body>
<div class="wrap-container welcome-container">
    <div class="row">
        <div class="welcome-left-container1 col-lg-9">
            <table class="layui-table" lay-even  >
                <colgroup>
                    <col class="hidden-xs" width="70">
                    <col class="hidden-xs" width="200">
                </colgroup>
                <tr>
                    <th class="hidden-xs">活动标题</th>
                    <td class="hidden-xs"><strong>{{$obj->title}}</strong></td>
                </tr>
                <tr>
                    <th class="hidden-xs">活动时间</th>
                    <td class="hidden-xs">{{$obj->starttime}} 至 {{$obj->endtime}}</td>
                </tr>
                <tr>
                    <th class="hidden-xs">活动人数</th>
                    <td class="hidden-xs" id="num">{{$obj->finish}}人 / {{$obj->num}}人</td>
                </tr>
                <tr >
                    <th style="height: auto" class="hidden-xs">活动详情</th>
                    <td style="height: auto" class="hidden-xs">{!! $obj->content !!}</td>
                </tr>
                <tr>
                    <th class="hidden-xs">活动进度</th>
                    <td class="hidden-xs">{{$obj->status}}</td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center">
                        @if(session("rank")==0)
                             @if($obj->finish < $obj->num && $obj->status == "审核已通过")

                                    <button type="button" class="layui-btn layui-btn-normal layui-btn-radius"onclick="join()" >报名参加</button>

                            @else

                                    <button type="button" class="layui-btn layui-btn-disabled layui-btn-radius">报名参加</button>

                            @endif
                            <a href="javascript:history.go(-1)">
                                <button type="button" class="layui-btn layui-btn-primary layui-btn-radius">返回</button>
                            </a>
                        @else
                            <a href="{{url("/tokenhelp/$obj->id/1")}}" onclick="return confirm('确定要审核通过吗')">
                            <button type="button" class="layui-btn layui-btn-normal layui-btn-radius" onclick="enter(this)" >通过审核</button>
                            </a>
                            <a href="{{url("/tokenhelp/$obj->id/2")}}" onclick="return confirm('确定要拒绝通过吗')">
                                <button type="button" class="layui-btn layui-btn-warm layui-btn-radius" onclick="enter(this)">拒绝审核</button>
                            </a>
                            <a href="javascript:history.go(-1)">
                                <button type="button" class="layui-btn layui-btn-primary layui-btn-radius">返回</button>
                            </a>
                        @endif

                    </td>

                </tr>
            </table>
        </div>

    </div>
</div>
　<script src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
<script src="{{asset("/layui/static/admin/layui/layui.js")}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset("/layui/static/admin/lib/echarts/echarts.js")}}"></script>
<script>
    layui.use('form',function () {
       var layer = layui.layer;
    });
    function join() {
        $.ajax({
            method:"GET",
            url: "/volunteer/public/join/{{$obj->id}}",
            success: function (data) {
                if(data.msg == 1){
                    layer.alert("报名成功，衷心的感谢您的付出");
                    $("#num").text(data.num+"人"+" / " +"{{$obj->num}}人");
                }else if(data.msg == 0) {
                    layer.alert("您已经报名了此项目，不能重复报名此项目!");
                }
            }
        });
    }

</script>
</body>
</html>
