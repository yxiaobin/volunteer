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
                    <col class="hidden-xs" width="140">
                    <col class="hidden-xs" width="70">
                    <col class="hidden-xs" width="140">
                </colgroup>
                <tr>
                    <th class="hidden-xs">姓名</th>
                    <td class="hidden-xs"><strong></strong></td>
                    <th class="hidden-xs">邮箱</th>
                    <td class="hidden-xs"><strong></strong></td>
                </tr>
                <tr>
                    <th class="hidden-xs">认证</th>
                    <td class="hidden-xs">皇家理工</td>
                    <th class="hidden-xs">加入时间</th>
                    <td class="hidden-xs" id="num"></td>
                </tr>

                <tr >
                    <th style="height: auto" class="hidden-xs">志愿次数</th>
                    <td style="height: auto" class="hidden-xs">999次</td>
                    <th class="hidden-xs">所属团队</th>
                    <td class="hidden-xs">放飞梦想团队</td>
                </tr>

            </table>
        </div>

    </div>
</div>
　<script src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
<script src="{{asset("/layui/static/admin/layui/layui.js")}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset("/layui/static/admin/lib/echarts/echarts.js")}}"></script>

</body>
</html>
