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
<h1 style="text-align: center; margin-top: 5%;">明星志愿者排行榜</h1>
<div class="wrap-container welcome-container">
    <div class="row">
        <div class="welcome-left-container1 col-lg-9">
            <table class="layui-table" lay-even  >
                <colgroup>
                    <col class="hidden-xs" width="50">
                    <col class="hidden-xs" width="140">
                    <col class="hidden-xs" width="100">
                    <col class="hidden-xs" width="140">
                </colgroup>
                @php
                   $i = 0;
                @endphp
                @foreach($users as $user)

                    @php
                        $usr = $user['user'];
                        $i = $i+1;
                    @endphp
                <tr>
                    <th class="hidden-xs">{{$i}}</th>
                    <th class="hidden-xs"><img src="{{url("getImage/$usr->image")}}" alt=""></th>
                    <th class="hidden-xs">{{$user['user']->name}}</th>
                    <th class="hidden-xs">共 {{$user['time']}} 次</th>
                    <th class="hidden-xs">{{$user['user']->introduction}}</th>
                </tr>
                @endforeach
            </table>
        </div>

    </div>
</div>
　<script src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
<script src="{{asset("/layui/static/admin/layui/layui.js")}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset("/layui/static/admin/lib/echarts/echarts.js")}}"></script>

</body>
</html>
