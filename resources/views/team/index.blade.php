<!DOCTYPE html>
<html class="iframe-h">

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>团队广场</title>
    <link rel="stylesheet" type="text/css" href="{{asset("/layui/static/admin/layui/css/layui.css")}}" />
    <link rel="stylesheet" type="text/css" href="{{asset("/layui/static/admin/css/admin.css")}}" />
</head>

<body>
<div class="wrap-container clearfix">
    <div class="column-content-detail">
        <div class="layui-form" id="table-list">
            <table class="layui-table" lay-even lay-skin="nob">
                <colgroup>
                    <col class="hidden-xs" width="100">

                    <col class="hidden-xs" width="150">
                    <col class="hidden-xs" width="100">
                    <col class="hidden-xs" width="200">
                    <col width="30">
                </colgroup>
                <thead>
                <tr>
                    <th class="hidden-xs">团队队徽</th>
                    <th class="hidden-xs">团队名称</th>

                    <th class="hidden-xs">团队规模</th>

                    <th>团队简介</th>
                    <th>查看详情</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($teams as $team)
                    <tr>
                        <td class="hidden-xs"><img src="{{url("getImage/$team->image")}}" width="100px" height="100px" alt=""></td>
                        <td class="hidden-xs">{{$team->name}}</td>
                        <td >共可容纳 {{$team->num}} 人</td>
                        <td style="color:#AAAAAA;">{{$team->introduction}}</td>
                        <td>
                            <div class="layui-inline" >
                                <button class="layui-btn layui-btn-sm layui-btn-radius" ><a href="">查看详情</a> </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="page-wrap">
                <ul class="pagination">
                        {{ $teams->links() }}

                </ul>
            </div>
        </div>
    </div>
</div>
<script src="{{asset("/layui/static/admin/layui/layui.js")}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset("/layui/static/admin/js/common.js")}}" type="text/javascript" charset="utf-8"></script>
</body>

</html>