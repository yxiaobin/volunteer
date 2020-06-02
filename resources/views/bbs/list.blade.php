<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>网站后台管理模版</title>
    <link rel="stylesheet" type="text/css" href="{{asset("/layui/static/admin/layui/css/layui.css")}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset("/layui/static/admin/css/admin.css")}}"/>
<style>
    .welcome-left-container1{
        width: 92%;
        height: 100%;
        overflow: hidden;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
        padding: 49px 80px;
    }

</style>
</head>

<body style="background-color: white">

<div class="wrap-container welcome-container">
        <div class="welcome-left-container1 col-lg-9">
            <table class="layui-table"  >
                @foreach($objs as $obj)
                <tr>
                @php
                $user = \App\Users::find($obj->userid);
                @endphp
                    <th class="hidden-xs" style="width: 20%; text-align: center">

                        <img style=" width:130px;height: 100px;" id="image1" name="image1" src="{{url("getImage/$user->image")}}">
                        <hr>
                        <p>{{$user->name}}</p>
                    </th>
                    <td  class="hidden-xs" >
                        <div>
                            <h3 style="float: left;">{{$obj->title}}</h3>
                            <div style="float: right;">
                                <span>{{$obj->created_at}}</span>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <span style="">{{$obj->content}}</span>
                        {{--<br>--}}

                        <div  style="text-align: right" >
                            <a href="{{url("/bbsshow/$obj->id")}}">
                            <button class="layui-btn layui-btn-sm layui-btn-primary layui-btn-radius">查看详情</button>
                            </a>
                        </div>

                    </td>
                </tr>
            @endforeach
            </table>
        </div>

    <hr>
    {{--<div style=" margin-left: 78px ;border: 1px;background-color: #eeeeee; height: 340px;width: 880px;" >
        <br>
        <div style="margin: 10px 38px">
             <p>发表评论</p>
        </div>
        <form action="" style="padding:20px 78px;">
            <textarea style="line-height:20px;letter-spacing: 1px; left: 2px;" name="" id="" cols="100%" rows="10" placeholder=" 请输入你要发表的内容。"></textarea>
            <div  style="text-align: right;margin-top: 15px;" >
                <button class="layui-btn layui-btn-sm layui-btn-primary layui-btn-radius">发布</button>
            </div>
        </form>
    </div>--}}


       {{-- <div class="welcome-edge col-lg-3">
            <!--最新留言-->
            <div class="panel panel-default comment-panel">
                <div class="panel-header">最新留言</div>
                <div class="panel-body">
                    <div class="commentbox">
                        <ul class="commentList">
                            <li class="item cl"> <a href="#"><i class="avatar size-L radius"><img alt="" src="http://static.h-ui.net/h-ui/images/ucnter/avatar-default.jpg"></i></a>
                                <div class="comment-main">
                                    <header class="comment-header">
                                        <div class="comment-meta"><a class="comment-author" href="#">慕枫</a> 评论于
                                            <time title="2014年8月31日 下午3:20" datetime="2014-08-31T03:54:20">2014-8-31 15:20</time>
                                        </div>
                                    </header>
                                    <div class="comment-body">
                                        <p><a href="#">@某人</a> 系统真不错！！！</p>
                                    </div>
                                </div>
                            </li>
                            <li class="item cl"> <a href="#"><i class="avatar size-L radius"><img alt="" src="http://static.h-ui.net/h-ui/images/ucnter/avatar-default.jpg"></i></a>
                                <div class="comment-main">
                                    <header class="comment-header">
                                        <div class="comment-meta"><a class="comment-author" href="#">慕枫</a> 评论于
                                            <time title="2014年8月31日 下午3:20" datetime="2014-08-31T03:54:20">2014-8-31 15:20</time>
                                        </div>
                                    </header>
                                    <div class="comment-body">
                                        <p><a href="#">@某人</a> 系统真不错！！！</p>
                                    </div>
                                </div>
                            </li>
                            <li class="item cl"> <a href="#"><i class="avatar size-L radius"><img alt="" src="http://static.h-ui.net/h-ui/images/ucnter/avatar-default.jpg"></i></a>
                                <div class="comment-main">
                                    <header class="comment-header">
                                        <div class="comment-meta"><a class="comment-author" href="#">慕枫</a> 评论于
                                            <time title="2014年8月31日 下午3:20" datetime="2014-08-31T03:54:20">2014-8-31 15:20</time>
                                        </div>
                                    </header>
                                    <div class="comment-body">
                                        <p><a href="#">@某人</a> 系统真不错！！！</p>
                                    </div>
                                </div>
                            </li>
                            <li class="item cl"> <a href="#"><i class="avatar size-L radius"><img alt="" src="http://static.h-ui.net/h-ui/images/ucnter/avatar-default.jpg"></i></a>
                                <div class="comment-main">
                                    <header class="comment-header">
                                        <div class="comment-meta"><a class="comment-author" href="#">慕枫</a> 评论于
                                            <time title="2014年8月31日 下午3:20" datetime="2014-08-31T03:54:20">2014-8-31 15:20</time>
                                        </div>
                                    </header>
                                    <div class="comment-body">
                                        <p><a href="#">@某人</a> 系统真不错！！！</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div id="pagesbox" style="text-align: center;padding-top: 5px;">

                    </div>
                </div>
            </div>
        </div>--}}
</div>
<script src="{{asset("/layui/static/admin/layui/layui.js")}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset("/layui//static/admin/lib/echarts/echarts.js")}}"></script>

</body>
</html>
