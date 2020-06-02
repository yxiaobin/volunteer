<!DOCTYPE html>
<html class="iframe-h">

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>志愿者活动查询</title>
    <link rel="stylesheet" type="text/css" href="{{asset("/layui/static/admin/layui/css/layui.css")}}" />
    <link rel="stylesheet" type="text/css" href="{{asset("/layui/static/admin/css/admin.css")}}" />
</head>

<body>
<div class="wrap-container clearfix">
    <div class="column-content-detail">
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <div class="layui-inline">
                    <input type="text" name="title"  placeholder="请输入标题" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-inline">
                    <select name="states" lay-filter="status">
                        <option value="">请选择一个状态</option>
                        <option value="010">正常</option>
                        <option value="021">停止</option>
                        <option value="0571">删除</option>
                    </select>
                </div>
                <button class="layui-btn layui-btn-normal" lay-submit="search">搜索</button>
            </div>
        </form>
        <div class="layui-form" id="table-list">
            <table class="layui-table" lay-even lay-skin="nob">
                <colgroup>
                    <col class="hidden-xs" width="100">
                    <col class="hidden-xs" width="200">
                    <col class="hidden-xs" width="150">
                    <col class="hidden-xs" width="100">
                    <col width="80">
                    <col width="30">
                </colgroup>
                <thead>
                <tr>

                    <th class="hidden-xs">活动名称</th>
                    <th>概要</th>
                    <th class="hidden-xs">开始时间-结束时间</th>
                    <th class="hidden-xs">已报名/总人数</th>
                    <th>状态</th>
                    <th>查看详情</th>
                </tr>
                </thead>
                <tbody>
                @foreach($helps as $help)
                    <tr>
                        <td class="hidden-xs">{{$help->title}}</td>
                        <td style="color:#AAAAAA;">{!! str_limit($help->content,30,'...') !!}</td>
                        <td class="hidden-xs">{{$help->starttime}}至{{$help->endtime}}</td>
                        <td class="hidden-xs">{{$help->finish}}人/{{$help->num}}人</td>
                        <td><button class="layui-btn layui-btn-mini layui-btn-normal">{{$help->status}}</button></td>
                        <td>
                            <div class="layui-inline" >
                                <button class="layui-btn layui-btn-small layui-btn-radius" data-id="1"><a href="{{url("/activity/$help->id")}}">活动详情</a> </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="page-wrap">
                <ul class="pagination">
                    <li class="disabled"><span>«</span></li>
                    <li class="active"><span>1</span></li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">»</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script src="{{asset("/layui/static/admin/layui/layui.js")}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset("/layui/static/admin/js/common.js")}}" type="text/javascript" charset="utf-8"></script>
</body>

</html>