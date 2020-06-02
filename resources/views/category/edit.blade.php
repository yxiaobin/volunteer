<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>网站后台管理模版</title>
    <link rel="stylesheet" type="text/css" href="{{asset("/layui/static/admin/layui/css/layui.css")}}" />
    <link rel="stylesheet" type="text/css" href="{{asset("/layui/static/admin/css/admin.css")}}" />

</head>

<body>
<div class="wrap-container clearfix">
    <form class="layui-form column-content-detail"  action="#" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="layui-tab">
            <ul class="layui-tab-title">
                <li class="layui-this">添加志愿活动分类</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <label class="layui-form-label">类别名称</label>
                        <div class="layui-input-block">
                            <input id="name" name="name" type="text"  required lay-verify="required" placeholder="请输入类别的名称" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">简介：</label>
                    <div class="layui-input-block">
                        <input id="introduction" type="text" name="introduction"  required lay-verify="required" placeholder="请输入该类别的简介" autocomplete="off" class="layui-input">
                        {{--<button type="button" class="layui-btn" id="test1">上传图片</button>--}}

                    </div>

                </div>


            </div>

        </div>
</div>
<div class="layui-form-item" style="padding-left: 10px;">
    <div class="layui-input-block">
        <button class="layui-btn layui-btn-normal"  type="button"  id="add" >添加</button>
        <button  type="reset" class="layui-btn layui-btn-primary">重置</button>
        <a href="{{url("/category")}}">
            <button  type="button" class="layui-btn layui-btn">返回</button>
        </a>
    </div>
</div>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{asset("/layui/static/admin/layui/layui.js")}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset("/layui//static/admin/js/common.js")}}" type="text/javascript" charset="utf-8"></script>
<script>
    layui.use('layer',function () {
        var layer = layui.layer;
        $("#add").bind("click",function () {
            var name = $("#name").val();
            var introduction =$("#introduction").val();
            if(name=="" || introduction==""){
                layer.alert("请完整输入数据");
                return ;
            }else{
               $.ajax({
                   method:"post",
                   url:"/volunteer/public/newcategory",
                   data:{
                       name:name,
                       introduction:introduction,
                       _token:"{{csrf_token()}}"
                   },
                   success:function (data) {
                       layer.alert(data);
                   }
               });
            }
        });
    })

</script>
</body>

</html>