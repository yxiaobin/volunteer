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
        <form class="layui-form" action="{{url('/searchactivity')}}" method="post">
            <div class="layui-form-item">
                {{csrf_field()}}
                <div class="layui-inline">
                    <input type="text" name="key"  placeholder="请输入标题" autocomplete="off" class="layui-input">
                </div>
                <input type="text" name="leixing" value="{{session("msg")}}" hidden>
                @php
                    $categorys = \App\Category::all();
                @endphp
                <div class="layui-inline">
                    <select name="category" lay-filter="status">
                        <option value="0">类别不限</option>
                        @foreach($categorys as $p)
                        <option value="{{$p->id}}">{{$p->name}}</option>
                        @endforeach

                    </select>
                </div>
                <button class="layui-btn layui-btn-normal" lay-submit="search">搜索</button>
            </div>
        </form>
        <div class="layui-form" id="table-list">
            <table class="layui-table" lay-even lay-skin="nob">
                <colgroup>
                    <col class="hidden-xs" width="80">
                    <col class="hidden-xs" width="150">
                    <col class="hidden-xs" width="130">
                    <col class="hidden-xs" width="100">
                    <col class="hidden-xs" width="80">
                    <col width="20">
                    <col width="150">
                </colgroup>
                <thead>
                <tr>
                    <th class="hidden-xs">活动名称</th>
                    <th>概要</th>
                    <th class="hidden-xs">开始时间-结束时间</th>
                    <th class="hidden-xs">已报名/总人数</th>
                    <th class="hidden-xs">封面预览</th>
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
                        <td class="hidden-xs">
                            <img src="{{url("getImage/$help->img")}}" alt="活动预览封面" width="100px;" height="80px;">
                        </td>
                        <td><button class="layui-btn layui-btn-sm layui-btn-normal">{{$help->status}}</button></td>
                        <td>
                            <div class="layui-inline" >
                                <button class="layui-btn layui-btn-sm layui-btn-radius" ><a href="{{url("/activity/$help->id")}}">详情</a> </button>
                                @if(session("msg")=="qiuzhu")
                                    <button class="layui-btn-warm layui-btn-sm layui-btn-radius" ><a href="{{url("editactivity/$help->id")}}">修改</a> </button>
                                    <button class="layui-btn-danger layui-btn-sm layui-btn-radius" ><a href="{{url("deleteactivity/$help->id")}}" onclick="return confirm('确定要删除吗')">删除</a> </button>
                                @endif
                                @if(session("msg")=="canjia")
                                    <button class="layui-btn-danger layui-btn-sm layui-btn-radius" ><a href="{{url("/quit/$help->id")}}" onclick="return confirm('确定要退出吗')">退出</a> </button>
                                @endif
                            </div>

                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            @if(count($helps)==0)
            <div style="text-align: center; left: 50%;">
                <br><br>
                <span >抱歉，还未有任何数据！</span>
                <br>
                <br>
            </div>
            @else
                <div class="page-wrap">
                    <ul class="pagination">
                        @if(session("fenye")=="no")

                        @else
                        {{ $helps->links() }}
                        @endif
                    </ul>
                </div>
            @endif

        </div>
    </div>
</div>
<script src="{{asset("/layui/static/admin/layui/layui.js")}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset("/layui/static/admin/js/common.js")}}" type="text/javascript" charset="utf-8"></script>
</body>

</html>