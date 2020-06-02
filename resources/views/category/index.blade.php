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
                    <a href="{{url("/newcategory")}}">
                        <button type="button" class="layui-btn layui-btn-warm" > 添加新分类</button>
                    </a>
                </div>
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
                    <col class="hidden-xs" width="400">

                    <col width=100">
                </colgroup>
                <thead>
                <tr>

                    <th class="hidden-xs">类别名称</th>
                    <th class="hidden-xs">类别简介</th>
                    <th class="hidden-xs">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categorys as  $category)
                    <tr>
                        <td class="hidden-xs">{{$category->name}}</td>
                        <td class="hidden-xs">{{$category->introduction}}</td>
                        <td>
                            <div class="layui-inline" >
                                <button class="layui-btn layui-btn-sm layui-btn-radius" ><a href="{{url("/editcategory/$category->id")}}">修改</a> </button>
                                <button class="layui-btn layui-btn-sm layui-btn-warm layui-btn-radius"  ><a href="{{url("/deletecategory/$category->id")}}" onclick="return confirm('您确定要删除这个类别吗?')" >删除</a> </button>
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