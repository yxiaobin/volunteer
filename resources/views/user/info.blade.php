<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>网站后台管理模版</title>
    <link rel="stylesheet" type="text/css" href="{{asset("/layui//static/admin/layui/css/layui.css")}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset("/layui/static/admin/css/admin.css")}}"/>

    <style>
        .welcome-left-container1{
            width: 96%;
            height: 100%;
            overflow: hidden;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
            padding: 43px 206px;
        }
    </style>
</head>
<body>
<div class="wrap-container welcome-container">

        <div class="row">
            <form class="layui-form" action="#" method="post"  enctype="multipart/form-data" id="avatar">
                <input name="_token" id="token" hidden value="{{csrf_token()}} ">
                <div class="welcome-left-container1 col-lg-9">
                    <table class="layui-table" lay-even  >
                        <colgroup>
                            <col class="hidden-xs" width="70">
                            <col class="hidden-xs" width="140">
                            <col class="hidden-xs" width="70">
                            <col class="hidden-xs" width="140">
                        </colgroup>
                        <tr>
                            <th class="hidden-xs" >姓名</th>
                            <td class="hidden-xs edit"><strong>{{$obj->name}}</strong></td>
                            <th rowspan="2" class="hidden-xs">头像</th>
                            <td style="text-align: center" id="imageshow" rowspan="2" class="hidden-xs edit"><img id="image1" name="image1" src="{{url("/getImage/$obj->image")}}"></td>
                            <td id="imageup" rowspan="2" class="hidden-xs edit" style="display: none"><input type="file" name="image2" id="image2"  ></td>
                        </tr>

                        <tr>
                            <th class="hidden-xs">邮箱</th>
                            <td class="hidden-xs edit" ><strong>{{$obj->email}}</strong></td>
                        </tr>
                        <tr>
                            <th class="hidden-xs">认证</th>
                            <td class="hidden-xs ">{{$obj->identity}}</td>
                            <th class="hidden-xs">所属团队</th>
                            <td class="hidden-xs">放飞梦想团队</td>
                        </tr>
                        <tr >
                            <th class="hidden-xs">加入时间</th>
                            <td class="hidden-xs " id="num">{{$obj->created_at}}</td>
                            <th class="hidden-xs">志愿次数</th>
                            <td class="hidden-xs">999次</td>
                        </tr>
                        <tr >
                            <th class="hidden-xs">个人简介</th>
                            <td colspan="3" class="hidden-xs edit" >{{$obj->introduction}}</td>

                        </tr>

                        <tr >
                            <td colspan="4" style="text-align: center">
                                    <button  id="editinfo"  type="button" class="layui-btn layui-btn-normal layui-btn-radius"   >修改信息</button>

                                    <button type="button" style="display: none;" class=" layui-btn layui-btn-normal layui-btn-radius " id="saveinfo" >保存数据</button>

                            </td>
                        </tr>

                    </table>
                </div>
            </form>
        </div>

</div>

<script src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
<script src="{{asset("/layui/static/admin/layui/layui.js")}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset("/layui/static/admin/lib/echarts/echarts.js")}}"></script>
<script>
    layui.use(['form','layer'],function () {
        var  layer = layui.layer;
        $("#editinfo").bind("click",function () {
            $(".edit").attr("contenteditable" ,'true');
            $(".hidden-xs").css("background-color" ,'#9BCD9B');
            $(".edit").css("background-color" ,'#90EE90');
            $("#imageshow").hide();
            $("#imageup").show();
            $("#editinfo").hide();
            $("#saveinfo").show();
        })

        $("#saveinfo").bind("click",function () {
            var btn = $('.edit').val();//只能获得这个类标签的第一个值
            //获得一组值
            var btns = new Array();
            var i=0;
            $(".edit").each(function(){
                if(i==2){
                    btns[i] = $("#image2").val();
                    if(btns[i]==""){
                        btns[i] = $("#image1").src;
                    }
                }else{
                    btns[i] = $(this).text();
                }
                i++;
                //  或者 btns[key] = $(value).val();
            });
            var  token  =$("#token").val();
            var files = $('#image2').prop('files');
            var ppp = new FormData();
            ppp.append('image', files[0]);
            ppp.append('name', btns[0]);
            ppp.append('email', btns[3]);
            ppp.append('introduction', btns[4]);
            ppp.append('_token', token);
            $.ajax({
                method:"post",
                url: "/volunteer/public/info",
                data: ppp,
                processData: false,
                contentType: false,
                mimeType: "multipart/form-data",
                success: function (e) {
                    $(".edit").attr("contenteditable" ,'false');
                    $(".hidden-xs").css("background-color","");
                    $(".edit").css("background-color","");
                    $("#imageshow").show();
                    $("#imageup").hide();
                    $("#saveinfo").hide();
                    $("#editinfo").show();
                    layer.alert("信息修改成功，请刷新页面查看");
                }
            });
        });
    })

</script>
</body>
</html>
