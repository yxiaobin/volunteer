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
                    <th class="hidden-xs">名称</th>
                    <td class="hidden-xs"><strong>公益小菊</strong></td>
                    <th class="hidden-xs">队徽</th>
                    <td class="hidden-xs" style="text-align: center"><img src="{{url("getImage/images/MALObgHXrZSihEEFQrTyGp7WYlkmS2DWLjhktWVO.jpeg")}}"  width="100px" height="100px" alt=""></td>


                </tr>
                <tr>
                    <th class="hidden-xs">公告</th>
                    <td class="hidden-xs"><strong>大家一起报名2020年的义卖活动！，我们会为大家提供后勤保障服务的！</strong></td>
                     <th class="hidden-xs">简介</th>
                    <td class="hidden-xs" id="num">你好啊，志愿者们，我们一起努力吧</td>
                </tr>

                <tr >
                    <th style="height: auto" class="hidden-xs">活动次数</th>
                    <td style="height: auto" class="hidden-xs">9次</td>
                    <th class="hidden-xs">团队规模</th>
                    <td class="hidden-xs">24人/40人</td>
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
