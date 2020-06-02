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
    <form class="layui-form column-content-detail"   method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="layui-tab">
            <ul class="layui-tab-title">
                <li class="layui-this">发帖</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <label class="layui-form-label">帖子主题：</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" id="title" required lay-verify="required" placeholder="请输入帖子的主题" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                </div>
                <input name="preid" value="-1" hidden>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">内容：</label>
                    <div class="layui-input-block">
                        <textarea name="content" id="content" cols="100" rows="10"></textarea>
                    </div>
                </div>
               {{-- <div class="layui-form-item">
                    <label class="layui-form-label">封面上传：</label>
                    <div class="layui-input-block">
                        <input type="file" name="file" onchange="show(this)">
                        --}}{{--<button type="button" class="layui-btn" id="test1">上传图片</button>--}}{{--

                    </div>
                </div>
                <div class="layui-form-item" id="yulan" style="height: 100px;width:80px; display: none" >
                    <label class="layui-form-label">预览：</label>
                    <div class="layui-input-block">
                        <div class="layui-inline">
                            <img class="layui-upload-img" id="img">

                        </div>
                    </div>
                </div>--}}

            </div>

        </div>
</div>
<div class="layui-form-item" style="padding-left: 10px;">
    <div class="layui-input-block">
        <button class="layui-btn layui-btn-normal"  type="button" id="submit" >立即提交</button>
        <button  type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
</div>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{asset("/layui/static/admin/layui/layui.js")}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset("/layui//static/admin/js/common.js")}}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">



    $("#submit").bind("click",function () {
        $.ajax({
            url: "/volunteer/public/newbbs",
            method:"POST",
            data:{
                title:$("#title").val(),
                content:$("#content").val(),
                preid : -1,
                _token:'{{csrf_token()}}'
            },
            success : function (e) {
                console.log(e);
                var layer = layui.layer;
                layer.alert("发表成功！");
            }
        });
    })

</script>
</body>

</html>