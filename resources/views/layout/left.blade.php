<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>志愿者服务管理系统</title>
    <link rel="stylesheet" type="text/css" href="{{asset("/layui/static/admin/layui/css/layui.css")}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset("/layui/static/admin/css/admin.css")}}"/>
</head>
<body>
<div class="main-layout" id='main-layout'>
    <!--侧边栏-->
    <div class="main-layout-side">
        <div class="m-logo">
        </div>
        <ul class="layui-nav layui-nav-tree" lay-filter="leftNav">
            @if(session("rank")==0)
            <li class="layui-nav-item layui-nav-itemed">
                <a href="javascript:;"><i class="iconfont">&#xe607;</i>志愿者活动</a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" data-url="{{url("/activity")}}" data-id='1' data-text="活动查询"><span class="l-line"></span>志愿活动广场 </a></dd>
                    <dd><a href="javascript:;" data-url="{{url("/myactivity")}}" data-id='2' data-text="我参加过的活动"><span class="l-line"></span>我参加过的活动</a></dd>
                    <dd><a href="javascript:;" data-url="{{url("/newhelp")}}" data-id='3' data-text="发布志愿求助"><span class="l-line"></span>发布志愿求助</a></dd>
                    <dd><a href="javascript:;" data-url="{{url("/myhelp")}}" data-id='4' data-text="我的求助"><span class="l-line"></span>我的求助</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;"><i class="iconfont">&#xe606;</i>个人信息</a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" data-url="{{url("/info")}}" data-id='5' data-text="我的信息"><span class="l-line"></span>我的信息</a></dd>
                    <dd><a href="javascript:;" data-url="{{url("/token")}}" data-id='6' data-text="账号认证"><span class="l-line"></span>账号认证</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;"><i class="iconfont">&#xe604;</i>团队信息</a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" data-url="{{url("/list")}}" data-id='7' data-text="团队广场"><span class="l-line"></span>团队广场</a></dd>
                    <dd><a href="javascript:;" data-url="{{url("/myteam")}}" data-id='8' data-text="我的团队"><span class="l-line"></span>我的团队</a></dd>
                    <dd><a href="javascript:;" data-url="{{url("/createteam")}}" data-id='9' data-text="创建团队"><span class="l-line"></span>创建团队</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;"><i class="iconfont">&#xe603;</i>交流中心</a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;" data-url="{{url("/bbs")}}" data-id='10' data-text="论坛广场"><span class="l-line"></span>论坛广场</a></dd>
                    <dd><a href="javascript:;" data-url="{{url("/newbbs")}}" data-id='11' data-text="发布新贴"><span class="l-line"></span>发布新贴</a></dd>
                    <dd><a href="javascript:;" data-url="{{url("/mybbs")}}" data-id='12' data-text="我的帖子"><span class="l-line"></span>我的内容</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;" data-url="{{url("/rank")}}" data-id='13' data-text="明星志愿者"><i class="iconfont">&#xe60c;</i>明星志愿者</a>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;" data-url="email.html" data-id='14' data-text="文章"><i class="iconfont">&#xe608;</i>文章事迹</a>
            </li>
            @else
                 <li class="layui-nav-item">
                    <a href="javascript:;" data-url="{{url("/tokenhelp")}}" data-id='15' data-text="志愿活动审核"><i class="iconfont">&#xe600;</i>志愿活动审核</a>
                </li>
                 <li class="layui-nav-item">
                     <a href="javascript:;" data-url="{{url("/tokenuser")}}" data-id='16' data-text="用户认证审核"><i class="iconfont">&#xe606;</i>用户认证审核</a>
                 </li>
                 <li class="layui-nav-item">
                     <a href="javascript:;" data-url="{{url("/tokenteam")}}" data-id='17' data-text="团队审核"><i class="iconfont">&#xe60b;</i>团队审核</a>
                 </li>
                <li class="layui-nav-item">
                    <a href="javascript:;" data-url="{{url("/category")}}" data-id='18' data-text="志愿项目类别管理"><i class="iconfont">&#xe60e;</i>类别管理</a>
                </li>
            @endif

        </ul>
    </div>
    <!--右侧内容-->
    <div class="main-layout-container">
        <!--头部-->
        <div class="main-layout-header">
            <div class="menu-btn" id="hideBtn">
                <a href="javascript:;">
                    <span class="iconfont">&#xe60e;</span>
                </a>
            </div>
            <ul class="layui-nav" lay-filter="rightNav">
                <li  class="layui-nav-item"><a style="color: red;" href="javascript:;" data-url="email.html" data-id='4' data-text="邮件系统"><i class="iconfont">&#xe603;</i></a></li>
                @if(session("rank")==1)
                <li class="layui-nav-item">
                    <a style="color: red;" href="javascript:;">超级管理员</a>
                </li>
                @else
                    <li class="layui-nav-item">
                        <a style="color: red;" href="javascript:;">普通用户</a>
                    </li>
                @endif
                <li class="layui-nav-item"><a style="color: red;" href="{{url("/logout")}}">退出</a></li>
            </ul>
        </div>
        <!--主体内容-->
        <div class="main-layout-body">
            <!--tab 切换-->
            <div class="layui-tab layui-tab-brief main-layout-tab" lay-filter="tab" lay-allowClose="true">
                <ul class="layui-tab-title">
                    <li class="layui-this welcome">@if(session("rank")==0) 志愿活动推荐 @else 系统详情@endif</li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show" style="background: #f5f5f5;">
                        <!--1-->
                        <iframe  src="{{url("/home")}}" width="100%" height="100%" name="iframe" scrolling="auto" class="iframe" framborder="0">
                        </iframe>
                        <!--1end-->
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


@yield("js")
</body>

<script src="{{asset("/layui/static/admin/layui/layui.js")}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset("/layui/static/admin/js/common.js")}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset("/layui/static/admin/js/main.js")}}" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
    var scope={
        link:'./welcome.html'
    }
</script>
</html>
