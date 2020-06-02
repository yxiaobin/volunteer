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
            padding: 40px 75px;
        }
        .welcome-container1{
            width: 132%;
            height: 100%;
            overflow: hidden;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
            padding: 15px 0;
        }
    </style>
</head>
<body>
@if(session("rank")==0)
        <div class="welcome-left-container1 col-lg-9">
            <table class="layui-table" lay-even  >
                <colgroup>
                    <col class="hidden-xs" width="90">
                    <col class="hidden-xs" width="90">
                    <col class="hidden-xs" width="90">
                </colgroup>
                {{--第一排--}}
                <tr >
                    <th class="hidden-xs">
                        <p >  <img src="" alt="图片地址" width="90px" height="160px">

                            <div style="width: 70px;height: 30px;background-color: #FF6600;text-align: center;line-height: 30px;position: absolute; right: 1px; bottom:51px; ">
                                <span style="color: white">助教</span>
                            </div>
                        </p>
                        <hr>
                        <span style="right: 0px;">
                            <button class="layui-btn layui-btn-sm layui-btn-warm layui-btn-radius">查看详情</button>
                         </span>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                          <span>这个项目的简单介绍...</span>
                    </th>
                </tr>
                {{--第二排--}}
                <tr >
                    <th class="hidden-xs">
                        <p >  <img src="" alt="图片地址" width="90px" height="160px">

                        <div style="width: 70px;height: 30px;background-color: #FF6600;text-align: center;line-height: 30px;position: absolute; right: 1px; bottom:51px; ">
                            <span style="color: white">助教</span>
                        </div>
                        </p>
                        <hr>
                        <span style="right: 0px;">
                            <button class="layui-btn layui-btn-sm layui-btn-warm layui-btn-radius">查看详情</button>
                         </span>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span>这个项目的简单介绍...</span>
                    </th>
                </tr>

            </table>
        </div>
@else
    <div class="wrap-container welcome-container1">
        <div class="row">
            <div class="welcome-left-container col-lg-9">
                <div class="data-show">
                    <ul class="clearfix">
                        <li class="col-sm-12 col-md-4 col-xs-12">
                            <a href="javascript:;" class="clearfix">
                                <div class="icon-bg bg-org f-l">
                                    <span class="iconfont">&#xe606;</span>
                                </div>
                                <div class="right-text-con">
                                    <p class="name">会员数</p>
                                    <p><span class="color-org">89</span>数据<span class="iconfont">&#xe628;</span></p>
                                </div>
                            </a>
                        </li>
                        <li class="col-sm-12 col-md-4 col-xs-12">
                            <a href="javascript:;" class="clearfix">
                                <div class="icon-bg bg-blue f-l">
                                    <span class="iconfont">&#xe602;</span>
                                </div>
                                <div class="right-text-con">
                                    <p class="name">文章数</p>
                                    <p><span class="color-blue">189</span>数据<span class="iconfont">&#xe628;</span></p>
                                </div>
                            </a>
                        </li>
                        <li class="col-sm-12 col-md-4 col-xs-12">
                            <a href="javascript:;" class="clearfix">
                                <div class="icon-bg bg-green f-l">
                                    <span class="iconfont">&#xe605;</span>
                                </div>
                                <div class="right-text-con">
                                    <p class="name">评论数</p>
                                    <p><span class="color-green">221</span>数据<span class="iconfont">&#xe60f;</span></p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--图表-->
                <div class="chart-panel panel panel-default">
                    <div class="panel-body" id="chart" style="height: 376px;">
                    </div>
                </div>
                <!--服务器信息-->
                <div class="server-panel panel panel-default">
                    <div class="panel-header">服务器信息</div>
                    <div class="panel-body clearfix">
                        <div class="col-md-2">
                            <p class="title">服务器环境</p>
                            <span class="info">Apache/2.4.4 (Win32) PHP/5.4.16</span>
                        </div>
                        <div class="col-md-2">
                            <p class="title">服务器IP地址</p>
                            <span class="info">127.0.0.1   </span>
                        </div>
                        <div class="col-md-2">
                            <p class="title">服务器域名</p>
                            <span class="info">localhost </span>
                        </div>
                        <div class="col-md-2">
                            <p class="title"> PHP版本</p>
                            <span class="info">5.4.16</span>
                        </div>
                        <div class="col-md-2">
                            <p class="title">数据库信息</p>
                            <span class="info">5.6.12-log </span>
                        </div>
                        <div class="col-md-2">
                            <p class="title">服务器当前时间</p>
                            <span class="info">2016-06-22 11:37:35</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endif


<script src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script>
<script src="{{asset("/layui/static/admin/layui/layui.js")}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset("/layui/static/admin/lib/echarts/echarts.js")}}"></script>
<script>
    $("th").mouseover(function(){

        $(this).css("background-color","#ADFF2F");
    });
    $("th").mouseout(function(){

        $(this).css("background-color","");
    });
       @if(session("rank")==1)
        layui.use(['layer','jquery'], function(){
            var layer 	= layui.layer;
            var $=layui.jquery;
            //图表
            var myChart;
            require.config({
                paths: {
                    echarts: '{{asset("/layui//static/admin/lib/echarts")}}'
                }
            });
            require(
                [
                    'echarts',
                    'echarts/chart/bar',
                    'echarts/chart/line',
                    'echarts/chart/map'
                ],
                function (ec) {
                    //--- 折柱 ---
                    myChart = ec.init(document.getElementById('chart'));
                    myChart.setOption(
                        {
                            title: {
                                text: "数据统计",
                                textStyle: {
                                    color: "rgb(85, 85, 85)",
                                    fontSize: 18,
                                    fontStyle: "normal",
                                    fontWeight: "normal"
                                }
                            },
                            tooltip: {
                                trigger: "axis"
                            },
                            legend: {
                                data: ["会员", "团队", "志愿活动"],
                                selectedMode: false,
                            },
                            toolbox: {
                                show: true,
                                feature: {
                                    dataView: {
                                        show: false,
                                        readOnly: true
                                    },
                                    magicType: {
                                        show: false,
                                        type: ["line", "bar", "stack", "tiled"]
                                    },
                                    restore: {
                                        show: true
                                    },
                                    saveAsImage: {
                                        show: true
                                    },
                                    mark: {
                                        show: false
                                    }
                                }
                            },
                            calculable: false,
                            xAxis: [
                                {
                                    type: "category",
                                    boundaryGap: false,
                                    data: ["周一", "周二", "周三", "周四", "周五", "周六", "周日"]
                                }
                            ],
                            yAxis: [
                                {
                                    type: "value"
                                }
                            ],
                            grid: {
                                x2: 30,
                                x: 50
                            },
                            series: [
                                {
                                    name: "会员",
                                    type: "line",
                                    smooth: true,
                                    itemStyle: {
                                        normal: {
                                            areaStyle: {
                                                type: "default"
                                            }
                                        }
                                    },
                                    data: [10, 12, 21, 54, 260, 830, 710]
                                },
                                {
                                    name: "团队",
                                    type: "line",
                                    smooth: true,
                                    itemStyle: {
                                        normal: {
                                            areaStyle: {
                                                type: "default"
                                            }
                                        }
                                    },
                                    data: [30, 182, 434, 791, 390, 30, 10]
                                },
                                {
                                    name: "志愿活动",
                                    type: "line",
                                    smooth: true,
                                    itemStyle: {
                                        normal: {
                                            areaStyle: {
                                                type: "default"
                                            },
                                            color: "rgb(110, 211, 199)"
                                        }
                                    },
                                    data: [1320, 1132, 601, 234, 120, 90, 20]
                                }
                            ]
                        }
                    );
                }
            );
            $(window).resize(function(){
                myChart.resize();
            })
        });
       @endif
</script>
</body>
</html>
