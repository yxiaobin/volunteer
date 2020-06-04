<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>网站后台管理模版</title>
    <link rel="stylesheet" type="text/css" href="{{asset("/layui/static/admin/layui/css/layui.css")}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset("/layui/static/admin/css/admin.css")}}"/>
<style>
    .welcome-left-container1{
        width: 92%;
        height: 100%;
        overflow: hidden;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
        padding: 49px 80px;
    }

</style>
</head>

<body style="background-color: white">

<div class="wrap-container welcome-container">
        <div class="welcome-left-container1 col-lg-9">
            <table class="layui-table"  >
                @foreach($objs as $obj)
                <tr>
                @php
                $user = \App\Users::find($obj->userid);
                @endphp
                    <th class="hidden-xs" style="width: 20%; text-align: center">

                        <img style=" width:130px;height: 100px;" id="image1" name="image1" src="{{url("getImage/$user->image")}}">
                        <hr>
                        <p>{{$user->name}}</p>
                    </th>
                    <td  class="hidden-xs" >
                        <div>
                            <h3 style="float: left;">{{$obj->title}}</h3>
                            <div style="float: right;">
                                <span>{{$obj->created_at}}</span>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <span style="">{{$obj->content}}</span>
                        {{--<br>--}}

                        <div  style="text-align: right" >
                            @if($bbs ==1)
                                <a href="{{url("/bbsdelete/$obj->id")}}" onclick="return confirm('您确定要删除这个帖子吗?')">
                                    <button class="layui-btn layui-btn-sm layui-btn-danger layui-btn-radius">删除本帖</button>
                                </a>
                            @endif
                            <a href="{{url("/bbsshow/$obj->id")}}">
                            <button class="layui-btn layui-btn-sm layui-btn-primary layui-btn-radius">查看详情</button>
                            </a>
                        </div>

                    </td>
                </tr>
            @endforeach
            </table>
        </div>

    <hr>
    <div class="page-wrap">
        <ul class="pagination">
                {{ $objs->links() }}
        </ul>
    </div>
</div>
<script src="{{asset("/layui/static/admin/layui/layui.js")}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset("/layui//static/admin/lib/echarts/echarts.js")}}"></script>

</body>
</html>
