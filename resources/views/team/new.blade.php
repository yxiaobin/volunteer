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
    <form class="layui-form column-content-detail"  action="{{url("/createteam")}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="layui-tab">
            <ul class="layui-tab-title">
                <li class="layui-this">创建团队</li>
            </ul>
            <div class="layui-tab-content">

                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <label class="layui-form-label">团队名称：</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" required lay-verify="required" placeholder="请输入团队的名称" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                </div>



                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <label class="layui-form-label">团队规模：</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" readonly   value="50人" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                </div>

                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <label class="layui-form-label">团队队长：</label>
                        <div class="layui-input-block">
                            @php
                                $user = \App\Users::find(session("userid"));
                            @endphp
                            <input type="text" name="title" readonly   value="{{$user->name}}" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                </div>


                <div class="layui-form-item">
                    <label class="layui-form-label">团队标志：</label>
                    <div class="layui-input-block">
                        <input type="file" name="file" onchange="show(this)">
                        {{--<button type="button" class="layui-btn" id="test1">上传图片</button>--}}

                    </div>

                </div>

                <div class="layui-form-item" id="yulan" style="height: 100px;width:80px; display: none" >
                    <label class="layui-form-label">预览：</label>
                    <div class="layui-input-block">
                        <div class="layui-inline">
                            <img class="layui-upload-img" id="img">
                        </div>
                    </div>
                </div>

                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <label class="layui-form-label">团队简介：</label>
                        <div class="layui-input-block">
                            <input type="text" name="introduction" required lay-verify="required" placeholder="请描述您的团队的相关介绍" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                </div>

            </div>

        </div>
</div>
<div class="layui-form-item" style="padding-left: 10px;">
    <div class="layui-input-block">
        <button class="layui-btn layui-btn-normal"  lay-submit >提交认证</button>
        <button  type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
</div>
</form>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{asset("/layui/static/admin/layui/layui.js")}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset("/layui//static/admin/js/common.js")}}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    function show(file){

        var reader = new FileReader();    // 实例化一个FileReader对象，用于读取文件
        var img = document.getElementById('img');     // 获取要显示图片的标签

        //读取File对象的数据
        reader.onload = function(evt){
            img.width  =  "120";
            img.height =  "80";
            img.src = evt.target.result;
            if(img.src.indexOf("image")>0 ||img.src.indexOf("jpeg")>0 ){
                $("#yulan").css("display","block");
            }else{
                $("#yulan").css("display","none");
            }
        }
        reader.readAsDataURL(file.files[0]);
    }
</script>


</body>

</html>