<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>登录</title>
    <link rel="stylesheet" type="text/css" href="{{asset('/layui/static/admin/layui/css/layui.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset("/layui/static/admin/css/login.css")}}" />
</head>

<body onload="judge()">
<div class="m-login-bg" >
    <div class="m-login"  id="UIlogin" style="display: block">
        <h3>系统登录入口</h3>
        <div class="m-login-warp" >
            <form class="layui-form" >
                <input hidden name="_token" value="{{csrf_token()}}">
                <div class="layui-form-item">
                    <input type="text" name="email" required lay-verify="email" placeholder="用户邮箱" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <input type="password" name="password" required lay-verify="required" placeholder="密码" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <input type="text" name="yzm" required lay-verify="required" placeholder="验证码" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-inline">
                        <div  style="cursor:pointer">
                        <img class="verifyImg"  src="{{url("/yzm")}}" onclick="ChangeYzm(this)" title="点击图片重新获取验证码" />
                        </div>
                    </div>
                </div>
                <div class="layui-form-item m-login-btn">
                    <div class="layui-inline">
                        <button class="layui-btn layui-btn-normal" lay-submit lay-filter="login">登录</button>
                    </div>
                    <div class="layui-inline">
                        <button type="button" class="layui-btn layui-btn-primary" onclick="GoRegister()" >注册</button>
                        <script>
                           function GoRegister() {
                               $("#UIlogin").hide();
                               $("#UIregister").show();
                               console.log("2333")
                           }
                        </script>
                    </div>
                </div>
            </form>
        </div>
        <p class="copyright">Copyright by Yang Xiaobin</p>
    </div>
    <div class="m-login"  id="UIregister" style="display:none">
        <h3>用户注册入口</h3>
        <div class="m-login-warp" >
            <form class="layui-form" action="{{url("/register")}}" method="post" >
                {{csrf_field()}}
                @if (count($errors) > 0)
                    <div class="layui-form-item">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="color: red;text-align: center">{{ $error }}!</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="layui-form-item">
                    <input type="text" name="name" required lay-verify="required" placeholder="请输入您的姓名" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <input type="password" name="password" required lay-verify="required" placeholder="请输入您的密码" autocomplete="off" class="layui-input">
                </div>

                <div class="layui-form-item">
                    <input type="text" name="email" id="email" required lay-verify="email" placeholder="请输入您的邮箱" autocomplete="off" class="layui-input">
                </div>

                <div class="layui-form-item">
                    <div class="layui-inline">
                        <input type="text" name="emailyzm" required lay-verify="required" placeholder="请输入您的邮箱验证码" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-inline">
                        <button  type ="button"  class=" layui-btn layui-btn-normal"   onclick="send(this)">发送</button>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <input type="text" name="yzm" required lay-verify="required" placeholder="验证码" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-inline"  style="cursor:pointer">
                        <img class="verifyImg" onclick="ChangeYzm(this)" src="{{ url('yzm')}}" />
                    </div>

                </div>
                <div class="layui-form-item m-login-btn">
                    <div class="layui-inline">
                        <button class="layui-btn layui-btn-normal" lay-submit lay-filter="register">注册</button>
                    </div>
                    <div class="layui-inline">
                        <button type="button" class="layui-btn layui-btn-primary" onclick="GoLogin()">返回登录页面</button>
                        <script>
                            function GoLogin() {
                                $("#UIlogin").show();
                                $("#UIregister").hide();
                                console.log("2333")
                            }
                        </script>
                    </div>
                </div>
            </form>
        </div>
        <p class="copyright">Copyright by Yang Xiaobin</p>
    </div>
</div>
<script src="{{asset("/layui/static/admin/layui/layui.js")}}" type="text/javascript" charset="utf-8"></script>
　<script src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
<script>
    //输入文本框的必填设定
    layui.use(['form', 'layedit', 'laydate'], function() {
        var form = layui.form,
            layer = layui.layer;
            //利用layui进行表单提交
            form.on('submit(login)',function (data) {
               $.ajax({
                   type: "post",
                   url: "/volunteer/public/login",
                   data:{
                       email:data.field.email ,
                       password:data.field.password ,
                       yzm:data.field.yzm ,
                       _token:data.field._token
                   },
                   success:function (msg) {
                       var flag = 5;
                       if(msg == "登录成功"){
                           flag = 6;
                       }
                       layer.msg(msg,{icon: flag,time:1000,end:function () {
                              if(msg == "登录成功"){
                                  location.href="/volunteer/public/manager" ;
                              }

                           }});
                   },
                   error:function (msg) {
                       layer.msg(msg,{icon: 5,time:1000,end:function () {
                               location.href=this.src();
                           }});
                   }
               });
               return  false;
            })

    });
    //验证码看不清时，点击换一张的逻辑
    function ChangeYzm(self) {
        $.ajax({ type: "GET",
            url: "/volunteer/public/yzm",
            success:function() {
                $(self).attr("src","{{url('/yzm')}}");
            }
        });
    }
    //注册账号时，点击发送按钮的限制逻辑
    function send(self) {
        var  reg = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/ ;
        var email = $("#email").val();
        console.log(email)
        if(!reg.test(email)){
            layer.alert("邮箱格式不正确");
            return ;
        }else {
            $(self).attr("disabled","disabled");
            $(self).removeClass("layui-btn-normal");
            $(self).addClass("layui-btn-disabled");
            $.ajax({type:"get",
                url:"/volunteer/public/email/"+email,
                success:function (data) {
                    console.log(data)
                }});
            var num = 10;
            var time = setInterval(function () {
                $(self).text(num + "s后重试");
                num--;
                if(num < 0){
                    $(self).attr("disabled",false);
                    $(self).addClass("layui-btn-normal");
                    $(self).removeClass("layui-btn-disabled");
                    $(self).text("发送");
                    email == "";
                    clearInterval(time);
                }
            },1000);
        }

    }
    //注册的时候输入错误，错误汇报
    function judge(){
        var message = "{{session('registerWrong')}}";
        var  name ="{{session("message")}}"
        if(message == 1) {
            layer.alert(name);
            window.onload=GoRegister();

        }
        if (message == 2){
            layer.alert("注册成功");
        }
    }
</script>
</body>

</html>