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
                    <td class="hidden-xs"><strong>张大庄</strong></td>
                    <th class="hidden-xs">名次</th>
                    <td class="hidden-xs"><strong>1</strong></td>
                </tr>
                <tr>
                    <th class="hidden-xs">姓名</th>
                    <td class="hidden-xs"><strong>张大庄</strong></td>
                    <th class="hidden-xs">名次</th>
                    <td class="hidden-xs"><strong>2</strong></td>
                </tr>
                <tr>
                    <th class="hidden-xs">姓名</th>
                    <td class="hidden-xs"><strong>张大庄</strong></td>
                    <th class="hidden-xs">名次</th>
                    <td class="hidden-xs"><strong>3</strong></td>
                </tr>
                <tr>
                    <th class="hidden-xs">姓名</th>
                    <td class="hidden-xs"><strong>张大庄</strong></td>
                    <th class="hidden-xs">名次</th>
                    <td class="hidden-xs"><strong>4</strong></td>
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
