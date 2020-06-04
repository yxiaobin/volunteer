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
    <form class="layui-form column-content-detail"  action="{{url("/newhelp")}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="layui-tab">
            <ul class="layui-tab-title">
                <li class="layui-this">发布请求帮助</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <label class="layui-form-label">标题：</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" required lay-verify="required" placeholder="请输入志愿项目的名称" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">封面上传：</label>
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
                @php
                    $categorys = \App\Category::all();
                @endphp
                <div class="layui-form-item"  >
                    <label class="layui-form-label">活动类别：</label>
                    <div class="layui-input-block">
                        <div class="layui-inline" style="float: left">
                            <select class="my_selected" data-edit-select="1" onmousedown="if(this.options.length>3){this.size=8}" onblur="this.size=0" onchange="this.size=0" style="position:absolute;z-index:999;"  name="category" id="select1" class="layui-select" >
                                @foreach($categorys as $p )
                                <option value="{{$p->id}}">{{$p->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        {{--<div style="line-height: 38px;">
                            <p>
                                <span id="jianjie">主要是啥啊</span>

                            </p>

                        </div>--}}
                    </div>


                </div>

                    <div class="layui-form-item" >
                        <label class="layui-form-label">时间：</label>
                        <div class="layui-input-block">
                            <div class="layui-input-inline">
                                <input class="layui-input" name="start_time" placeholder="开始日" id="LAY_demorange_s">
                            </div>
                            <div class="layui-input-inline">
                                <input class="layui-input" name="end_time" placeholder="截止日" id="LAY_demorange_e">
                            </div>
                        </div>
                    </div>

                <div class="layui-form-item" >
                    <label class="layui-form-label">招募人数：</label>
                    <div class="layui-input-block">
                        <div class="layui-input-inline">
                            <input class="layui-input" type="text" required  lay-verify="number" name="num" placeholder="招募人数" >
                        </div>
                    </div>
                </div>

                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">文章内容：</label>
                        <div class="layui-input-block" style="z-index: 2">
                            <div  id="editor" type="text/plain" style="height: 400px;width: 100%;margin: auto; z-index: 2">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="layui-form-item" style="padding-left: 10px;">
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-normal"  lay-submit >立即提交</button>
                <button  type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{asset("/layui/static/admin/layui/layui.js")}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset("/layui//static/admin/js/common.js")}}" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
    layui.use(['laydate','util'], function(){
        var laydate = layui.laydate;
        var util = layui.util;
        var start = {
            min: util.toDateString(new Date(), 'yyyy-MM-dd HH:mm:ss')
            ,max: '2099-06-16 23:59:59'
            ,istoday: false
            ,trigger:'click'
            ,done: function(value,datas){
                end.min = value; //开始日选好后，重置结束日的最小日期
                end.start = value //将结束日的初始值设定为开始日
            }
        };
        var end = {
            min: util.toDateString(new Date(), 'yyyy-MM-dd HH:mm:ss')
            ,max: '2099-06-16 23:59:59'
            ,istoday: false
            ,trigger: 'click'
            ,done: function(value,datas){
                start.max = value; //结束日选好后，重置开始日的最大日期
            }
        };

        document.getElementById('LAY_demorange_s').onclick = function(){
            start.elem = this;
            laydate.render(start);
        }
        document.getElementById('LAY_demorange_e').onclick = function(){
            end.elem = this;
            laydate.render(end);
        }
    });
    function show(file){
        $("#yulan").css("display","block");
        var reader = new FileReader();    // 实例化一个FileReader对象，用于读取文件
        var img = document.getElementById('img');     // 获取要显示图片的标签
        //读取File对象的数据
        reader.onload = function(evt){
            img.width  =  "120";
            img.height =  "80";
            img.src = evt.target.result;
        }
        reader.readAsDataURL(file.files[0]);
    }
</script>

<script type="text/javascript" charset="utf-8" src="{{asset("/Ueditor/ueditor.config.js")}}"></script>
<script type="text/javascript" charset="utf-8" src="{{asset("/Ueditor/ueditor.all.min.js")}}"> </script>

<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="{{asset("/Ueditor/lang/zh-cn/zh-cn.js")}}"></script>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    //var ue = UE.getEditor('editor');
    var ue = UE.getEditor('editor',{toolbars: [['fullscreen',//全屏
            'source',//源代码
            'undo',//撤回一步
            'redo',//前进一步
            'bold',//粗体
            'italic',//斜体
            'underline',//下划线
            'fontborder',//字体边框
            'strikethrough',//删除线
            'subscript',//下标
            'superscript',//上标
            'forecolor', //字体颜色
            'fontfamily',//字体
            'fontsize',//字体大小
            'formatmatch',//格式刷
            'touppercase', //字母大写
            'tolowercase', //字母小写
            'link',//超链接
            'unlink',//取消超链接
            'searchreplace',//查询替换
            'selectall'],//全选
            ['indent',//首行缩进
                'justifyleft', //居左对齐
                'justifycenter', //居中对齐
                'justifyright', //居右对齐
                'justifyjustify', //两端对齐
                'blockquote',//引用
                'preview',//预览
                'horizontal',//分割线
                'insertcode',//代码语言
                'paragraph',//段落格式
                'simpleupload',//单个图片上传
                'insertimage',//多个图片上传
                'imagecenter', //居中
                'insertvideo',//视频上传
                'emotion',//表情
                'map',//地图
                'backcolor',//背景色
                'lineheight', //行间距
                'edittip ', //编辑提示
                'customstyle', //自定义标题
                'autotypeset',//自动排版

                'background', //背景
                'template', //模板
                'scrawl', //涂鸦
                'time', //时间
                'date', //日期
                'snapscreen',
                'attachment'
            ]]});
    ue.ready(function() {
        //设置编辑器的内容
        ue.execCommand("inserthtml",'请输入内容') ;
    });
</script>

</body>

</html>