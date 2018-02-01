<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose /yijiyi/Public/Home/tools | Templates
and open the template in the editor.
-->
<html>
<head lang="en">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content=" user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="壹加壹美术教育">
        <meta name="keywords" content="壹加壹美术教育">
        <title>壹加壹美术教育</title>
        <link rel="stylesheet" href="/yijiyi/Public/Home/css/base.css"/>
        <link rel="stylesheet" href="/yijiyi/Public/Home/css/index.css"/>
        <link rel="stylesheet" href="/yijiyi/Public/Home/css/swiper.css">
        <script src="/yijiyi/Public/Home/javascript/jquery-1.11.3.min.js"></script>
        <script src="/yijiyi/Public/Home/javascript/swiper.min.js"></script>
        <!-- Initialize Swiper -->
        <script src="/yijiyi/Public/Home/javascript/index.js"></script>
    
        <script>
            function changeViewport() {
                // UI-width ：WebApp布局宽度
                // device-width ：屏幕分辨率宽度
                // target-densitydpi = UI-width / device-width * window.devicePixelRatio * 160;
                var uiWidth = 1080,
                    deviceWidth = (window.orientation == 90 || window.orientation == -90) ? window.screen.height : window.screen.width;
                devicePixelRatio = window.devicePixelRatio || 1;
                var myScale = deviceWidth / uiWidth;
                var targetDensitydpi = uiWidth / deviceWidth * devicePixelRatio * 160;
                //alert(uiWidth+","+deviceWidth+","+devicePixelRatio+","+myScale+","+targetDensitydpi);
                var viewportContent = "initial-scale=" + myScale + ", maximum-scale=" + myScale + ", minimum-scale=" + myScale + ',target-densitydpi=' + targetDensitydpi + ', width=device-width, user-scalable=no';
                //var viewportContent = "initial-scale=" + myScale + ", maximum-scale=" + myScale + ", minimum-scale=" + myScale + ', width=device-width, user-scalable=no';
                document.querySelector('meta[name=viewport]').attributes['content'].value = viewportContent;
            }
            window.addEventListener("orientationchange", function () {
                // Announce the new orientation number
                changeViewport();
            }, false);
            changeViewport();
            $(function(){
                $("#menu_ct").on("touchstart click",function(e){
                    e.stopPropagation();
                });
                $("#menuEvent").click(function(e){
                    e.stopPropagation();
                    $("#menu").show();
                    return false;
                });
                $(document).on("click  touchstart",function(){
                    $("#menu").hide();
                });
            })
        </script>
</head>
<body>
    
<div class="bd-container">
    <!--上操作栏-->
    <header>
        <!-- 侧边栏 按钮-->
        <nav class="sidebar" id="menuEvent">
                <img src="/yijiyi/Public/Home/tool/svg/header_menu.svg"/>
        </nav>
        <div id="menu">
            <div class="menu" id="menu_ct">
                <img src="/yijiyi/Public/Home/images/menu_header.jpg" alt="">
                <div class="menu_list">
                    <a href="" class="menu_item">关于我们</a><a href="" class="menu_item">榜上有名</a><a href="" class="menu_item">培训课程</a><a href="" class="menu_item">双师课程.</a><a href="" class="menu_item">名校规划</a>                </div>
            </div>
        </div>
        <a href="index.php"><img src="/yijiyi/Public/upload/YiJiaYi/logo/2018/20180201/logo.png" class="img-title ele-center"/></a>
    </header>
    <!--上操作栏结束-->    <!--主体内容-->
     <div class="index main-content">
        <!-- 轮播banner-->
        <div class="carousel-banner">
            <div class="ad-box swiper-container">
                <ul class="ad-img swiper-wrapper">
                    <li class="swiper-slide"><img src="/yijiyi/Public/Home/images/banner01.png"/></li>
                    <li class="swiper-slide"><img src="/yijiyi/Public/Home/images/banner01.png"/></li>
                    <li class="swiper-slide"><img src="/yijiyi/Public/Home/images/banner01.png"/></li>
                    <li class="swiper-slide"><img src="/yijiyi/Public/Home/images/banner01.png"/></li>
                </ul>
                <div class="ad-tabs">

                </div>
            </div>

        </div>
        <!-- 轮播banner结束-->
        
        <!--固定导航按钮-->
        <div class="nav-button">
            <ul class="clear">
                <li><a href=""><img src="/yijiyi/Public/upload/YiJiaYi/column/2018/20180201/20180201151040Ty.jpg" alt=""><span>关于我们</span></a></li><li><a href=""><img src="/yijiyi/Public/upload/YiJiaYi/column/2018/20180201/20180201152001rr.jpg" alt=""><span>榜上有名</span></a></li><li><a href=""><img src="/yijiyi" alt=""><span>培训课程</span></a></li><li><a href=""><img src="/yijiyi" alt=""><span>双师课程.</span></a></li><li><a href=""><img src="/yijiyi" alt=""><span>名校规划</span></a></li>            </ul>
        </div>
        <!-- 固定导航按钮结束-->
        <!-- 相信榜样的力量-->
        <div class="goodExample content_item">
            <div class="content_item_bg">
                <div class="title font60">
                    <div class="main_title">相信榜样的力量</div>
                    <span class="font20">An example to believe</span>
                </div>
                <div class="exampleListP">
                    <ul class="exampleList clear">
                        <li class="clear">
                            <a href="student_record.html">
                                <img class="border50 fl" src="/yijiyi/Public/Home/images/touxiang.jpg" alt="">
                                <div class="exampleInfo fl">
                                    <div class="clear">
                                        <span class="exampleName fl">张三1</span>
                                        <span class="exampleRegion fr">江西</span>
                                    </div>
                                    <div class="example_rank ">四川美术学院第1名</div>
                                </div>
                            </a>
                        </li>
                        <li class="clear">
                            <a href="student_record.html">
                                <img class="border50 fl" src="/yijiyi/Public/Home/images/touxiang.jpg" alt="">
                                <div class="exampleInfo fl">
                                    <div class="clear">
                                        <span class="exampleName fl">张三1</span>
                                        <span class="exampleRegion fr">江西</span>
                                    </div>
                                    <div class="example_rank ">四川美术学院第1名</div>
                                </div>
                            </a>
                        </li>
                        <li class="clear">
                            <a href="student_record.html">
                                <img class="border50 fl" src="/yijiyi/Public/Home/images/touxiang.jpg" alt="">
                                <div class="exampleInfo fl">
                                    <div class="clear">
                                        <span class="exampleName fl">张三1</span>
                                        <span class="exampleRegion fr">江西</span>
                                    </div>
                                    <div class="example_rank ">四川美术学院第1名</div>
                                </div>
                            </a>
                        </li>
                        <li class="clear">
                            <a href="student_record.html">
                                <img class="border50 fl" src="/yijiyi/Public/Home/images/touxiang.jpg" alt="">
                                <div class="exampleInfo fl">
                                    <div class="clear">
                                        <span class="exampleName fl">张三1</span>
                                        <span class="exampleRegion fr">江西</span>
                                    </div>
                                    <div class="example_rank ">四川美术学院第1名</div>
                                </div>
                            </a>
                        </li>
                        <li class="clear">
                            <a href="student_record.html">
                                <img class="border50 fl" src="/yijiyi/Public/Home/images/touxiang.jpg" alt="">
                                <div class="exampleInfo fl">
                                    <div class="clear">
                                        <span class="exampleName fl">张三1</span>
                                        <span class="exampleRegion fr">江西</span>
                                    </div>
                                    <div class="example_rank ">四川美术学院第1名</div>
                                </div>
                            </a>
                        </li>
                        <li class="clear">
                            <a href="student_record.html">
                                <img class="border50 fl" src="/yijiyi/Public/Home/images/touxiang.jpg" alt="">
                                <div class="exampleInfo fl">
                                    <div class="clear">
                                        <span class="exampleName fl">张三1</span>
                                        <span class="exampleRegion fr">江西</span>
                                    </div>
                                    <div class="example_rank ">四川美术学院第1名</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="end font24 ">
                    <p class="text-center font36" style="line-height: 2">快 速 加 入 , 一 起 成 长</p>
                    <div class="text-center" style="padding: 60px 0">
                        <a class="btn btn-red font36 ">详细成绩咨询</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- 相信榜样的力量结束-->

        <!-- 状元说-->
        <div class="champion content_item">
            <div class="content_item_bg">
                <div class="title font60">
                    <div class="main_title">壹加壹 状元说</div>
                    <span class="font20">One plus one scholar said</span>
                </div>
                <!--最大支持11个-->
                <div class="champion_slide">
                    <ul class="championList swiper-wrapper clear">
                        <li class="swiper-slide">
                            <a href="student_record.html">
                                <div class="img-info">
                                    <img class="border50" src="/yijiyi/Public/Home/images/touxiang.jpg" alt="">
                                </div>
                                <div class="text-info">
                                    <span class="name font24">张三丰</span>
                                    <p>中国传媒大学 第一名 </p>
                                </div>
                            </a>
                        </li>
                        <li class="swiper-slide">
                            <a href="student_record.html">
                                <div class="img-info">
                                    <img class="border50" src="/yijiyi/Public/Home/images/touxiang.jpg" alt="">
                                </div>
                                <div class="text-info">
                                    <span class="name font24">张三丰</span>
                                    <p>中国传媒大学 第一名 </p>
                                </div>
                            </a>
                        </li>
                        <li class="swiper-slide">
                            <a href="student_record.html">
                                <div class="img-info">
                                    <img class="border50" src="/yijiyi/Public/Home/images/touxiang.jpg" alt="">
                                </div>
                                <div class="text-info">
                                    <span class="name font24">张三丰</span>
                                    <p>中国传媒大学 第一名 </p>
                                </div>
                            </a>
                        </li>
                        <li class="swiper-slide">
                            <a href="student_record.html">
                                <div class="img-info">
                                    <img class="border50" src="/yijiyi/Public/Home/images/touxiang.jpg" alt="">
                                </div>
                                <div class="text-info">
                                    <span class="name font24">张三丰</span>
                                    <p>中国传媒大学 第一名 </p>
                                </div>
                            </a>
                        </li>
                        <li class="swiper-slide">
                            <a href="student_record.html">
                                <div class="img-info">
                                    <img class="border50" src="/yijiyi/Public/Home/images/touxiang.jpg" alt="">
                                </div>
                                <div class="text-info">
                                    <span class="name font24">张三丰</span>
                                    <p>中国传媒大学 第一名 </p>
                                </div>
                            </a>
                        </li>
                        <li class="swiper-slide">
                            <a href="student_record.html">
                                <div class="img-info">
                                    <img class="border50" src="/yijiyi/Public/Home/images/touxiang.jpg" alt="">
                                </div>
                                <div class="text-info">
                                    <span class="name font24">张三丰</span>
                                    <p>中国传媒大学 第一名 </p>
                                </div>
                            </a>
                        </li>
                        <li class="swiper-slide">
                            <a href="student_record.html">
                                <div class="img-info">
                                    <img class="border50" src="/yijiyi/Public/Home/images/touxiang.jpg" alt="">
                                </div>
                                <div class="text-info">
                                    <span class="name font24">张三丰</span>
                                    <p>中国传媒大学 第一名 </p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="page-info clear">
                </div>
            </div>
        </div>
        <!-- 状元说结束-->

        <!--剩余床位 领取名额-->
        <div class="chuangwei">
            <div class="chuangwei_num clear">
                <div class="item item1  fl clear">
                    <div class="fl">
                        <span>0</span>
                        <span>8</span>
                        <span>6</span>
                    </div>

                </div>
                <div class="item item2 fr clear">
                    <div class="fr">
                        <span>1</span>
                        <span>2</span>
                        <span>3</span>
                    </div>
                </div>
            </div>
            <div class="chuangwei_info">
                <p class="font50">免费接送，免费试学</p>
                <p class="font60">今日还剩 <span>2</span> 个名额</p>
            </div>
            <div class="chuangwei_form font36">
                <div class="clear">
                    <span class="font36 fl">姓名：</span>
                    <input class="fl" type="text" placeholder="请输入您的名字">
                </div>
                <hr>
                <div class="clear">
                    <span class="font36 fl">电话：</span>
                    <input class="fl" type="number" placeholder="请输入您的联系方式">
                </div>

            </div>
            <div>
                <a href="" class="btn btn-red block font36">立刻领取</a>
            </div>
            <div class="chuangwei_end ">
                全国5所分校 11年成就了10000多名艺术考生的大学梦。
            </div>
        </div>
        <!-- 剩余床位 领取名额结束-->

        <!--20+模式-->
        <div class="teachModel content_item">
            <div class="content_item_bg">
                <div class="title font60">
                    <div class="main_title">20+2+1+1</div>
                    <div class="main_title" style="padding-top: 20px">新型教学模式</div>
                    <span class="font20">Teaching mode</span>
                </div>
                <div>
                    <img src="/yijiyi/Public/Home/images/moshi1.png" width="100%" alt="">
                </div>
                <div class="title font60">
                    <div class="main_title">告别百人大厅/走进精品小班</div>
                    <span class="font20">Exquisite small class</span>
                </div>
                <div>
                    <img src="/yijiyi/Public/Home/images/moshi2.png" width="100%" alt="">
                </div>
            </div>
        </div>
        <!--20+模式-->
        <!--高端定制-->
        <div class="custom content_item">
            <div class="content_item_bg">
                <div class="title font60">
                    <div class="main_title">高端定制/定向培养</div>
                    <span class="font20">High-end custom & Orientation training</span>
                </div>
                <div class="custom_content">
                    <p class="text-center font24" style="padding-bottom: 34px">中国唯一将定制服务做到极致的画室</p>
                    <div class="custom_detail">
                        <div class="custom_detail_item">
                            <div>
                                <img src="/yijiyi/Public/Home/images/custom01.jpg" width="100%" alt="">
                                <p class="text-center">
                                    定向师资
                                </p>
                            </div>
                        </div>
                        <div class="custom_detail_item">
                            <div>
                                <img src="/yijiyi/Public/Home/images/custom02.jpg" width="100%" alt="">
                                <p class="text-center">
                                    定向班级
                                </p>
                            </div>
                        </div>
                        <div class="custom_detail_item">
                            <div>
                                <img src="/yijiyi/Public/Home/images/custom03.jpg" width="100%" alt="">
                                <p class="text-center">
                                    定向大学
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center " style="padding: 60px 0">
                        <a href="" class="btn-red btn border35 font36">了解更多</a>
                    </div>
                </div>
            </div>
        </div>
        <!--高端定制-->
        <!--班级介绍 + 报名按钮-->
        <div class="oneClass content_item">
            <div class="content_item_bg">
                <img src="/yijiyi/Public/Home/images/Class01.jpg" width="100%" alt="">
                <div class="title font60">
                    <div class="main_title">壹加壹班级</div>
                    <span class="font20">One plus one class</span>
                </div>
                <div class="oneClass_content">
                    <div class="oneClass_item">
                        <img src="/yijiyi/Public/Home/images/Class001.jpg" width="100%" alt="">
                        <div class="item_info">
                            <span class="font24">美院部</span>
                            <hr>
                            <ul class="clear">
                                <li>动漫预科班</li>
                                <li>动漫设计班</li>
                                <li>动漫设计班</li>
                                <li>动漫设计班</li>
                            </ul>
                            <a href="" class="btn ">了解更多</a>
                        </div>
                    </div>
                    <div class="oneClass_item">
                        <img src="/yijiyi/Public/Home/images/Class002.jpg" width="100%" alt="">
                        <div class="item_info">
                            <span class="font24">传媒部</span>
                            <hr>
                            <ul class="clear">
                                <li>动漫预科班</li>
                                <li>动漫设计班</li>
                                <li>动漫设计班</li>
                                <li>动漫设计班</li>
                            </ul>
                            <a href="" class="btn ">了解更多</a>
                        </div>
                    </div>
                    <div class="oneClass_item">
                        <img src="/yijiyi/Public/Home/images/Class003.jpg" width="100%" alt="">
                        <div class="item_info">
                            <span class="font24">综合设计部</span>
                            <hr>
                            <ul class="clear">
                                <li>动漫预科班</li>
                                <li>动漫设计班</li>
                                <li>动漫设计班</li>
                                <li>动漫设计班</li>
                            </ul>
                            <a href="" class="btn ">了解更多</a>
                        </div>
                    </div>
                </div>
                <div class="oneClass_btn text-center">
                    <a href="" class="btn btn-red border35 font36">我要报名</a>
                </div>
            </div>
        </div>
        <!-- 班级介绍 结束-->

        <!-- 视频-->
        <div class="video-box">
            <embed src='http://player.youku.com/player.php/Type/Folder/Fid//Ob//sid/XMzI3MDIyOTUyOA==/v.swf'
                   quality='high' width='100%' height='100%' align='middle' allowScriptAccess='always'
                   allowFullScreen='true' autostart="true" mode='transparent'
                   type='application/x-shockwave-flash'></embed>
        </div>
        <!-- 视频 结束-->

        <!-- 师资介绍-->
        <div class="content_item">
            <div class="content_item_bg">
                <div class="title font60">
                    <div class="main_title">壹加壹师资</div>
                    <div class="main_title" style="padding-top: 20px;">不止是顶尖的教师</div>
                    <span class="font20">One plus one teacher</span>
                </div>
                <div class="teach_content">
                    <div class="teach_team1">
                        <img src="/yijiyi/Public/Home/images/teach01.jpg" alt="">
                    </div>
                    <div class="teach_team2 ">
                        <div class="teach">
                            <img src="/yijiyi/Public/Home/images/teach02.jpg" alt="">
                            <div class="teach_info text-center">
                                <span class="teach_name font20 ">刘善武</span>
                                <hr>
                                <p class="font18">
                                    山东潍坊人，全国美术高考名师。二零零三年开始从事美术高考教育工作，有十余年的高考教学经验，深谙美

                                </p>
                                <a href="teacher_record.html" class="btn ">了解更多</a>
                            </div>
                        </div>
                        <div class="teach">
                            <img src="/yijiyi/Public/Home/images/teach02.jpg" alt="">
                            <div class="teach_info text-center">
                                <span class="teach_name font20 ">刘善武</span>
                                <hr>
                                <p class="font18">
                                    山东潍坊人，全国美术高考名师。二零零三年开始从事美术高考教育工作，有十余年的高考教学经验，深谙美

                                </p>
                                <a href="teacher_record.html" class="btn ">了解更多</a>
                            </div>
                        </div>
                        <div class="teach">
                            <img src="/yijiyi/Public/Home/images/teach02.jpg" alt="">
                            <div class="teach_info text-center">
                                <span class="teach_name font20 ">刘善武</span>
                                <hr>
                                <p class="font18">
                                    山东潍坊人，全国美术高考名师。二零零三年开始从事美术高考教育工作，有十余年的高考教学经验，深谙美

                                </p>
                                <a href="teacher_record.html" class="btn ">了解更多</a>
                            </div>
                        </div>
                    </div>
                    <div class="teach_btn text-center">
                        <a href="teacher_detail.html" class="btn btn-red border35 font36">查看更多</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- 师资 介绍结束-->
        <!--双师讲堂-->
        <div class="content_item double_class">
            <div class="content_item_bg">
                <div class="title font60">
                    <div class="main_title">壹加壹双师课堂</div>
                    <span class="font20">One plus one double division class</span>
                </div>
                <div class="double_content">
                    <img src="/yijiyi/Public/Home/images/shuangshijiangtang.jpg"  width="100%" alt="">
                </div>
                <div class="double_btn text-center">
                    <a href="" style="line-height: 70px;margin: 50px 0" class="btn btn-red border35 font36">一招制胜</a>
                    <a href="" style="line-height: 70px;margin:50px 0 50px 100px" class="btn btn-red border35 font36">直播课程</a>
                </div>
            </div>
        </div>
        <!--双师讲堂-->
        <!--环境-->
        <div class="custom content_item">
            <div class="content_item_bg">
                <div class="title font60">
                    <div class="main_title">壹加壹环境</div>
                    <span class="font20">One plus one environment</span>
                </div>
                <div class="environment text-center">
                    <img src="/yijiyi/Public/Home/images/huanjing.png" alt="">
                    <img src="/yijiyi/Public/Home/images/huanjing.png" alt="">
                    <img src="/yijiyi/Public/Home/images/huanjing.png" alt="">
                    <img src="/yijiyi/Public/Home/images/huanjing.png" alt="">
                </div>
                <div class=" text-center ">
                    <a href="" style="line-height: 70px;margin: 50px 0" class="btn btn-red border35 font36">我要报名</a>
                </div>
            </div>
        </div>
        <!--环境-->
        <!-- 作品介绍-->
        <div class="content_item">
            <div class="content_item_bg">
                <div class="title font60">
                    <div class="main_title">壹加壹作品</div>
                    <span class="font20">One plus one works</span>
                </div>
                <div class="works_content">
                    <img src="/yijiyi/Public/Home/images/works_03.jpg" alt="">
                    <img src="/yijiyi/Public/Home/images/works_03.jpg" alt="">
                    <img src="/yijiyi/Public/Home/images/works_03.jpg" alt="">
                    <img src="/yijiyi/Public/Home/images/works_03.jpg" alt="">
                </div>
                <div class="works_content">
                    <img src="/yijiyi/Public/Home/images/works_03.jpg" alt="">
                    <img src="/yijiyi/Public/Home/images/works_03.jpg" alt="">
                    <img src="/yijiyi/Public/Home/images/works_03.jpg" alt="">
                    <img src="/yijiyi/Public/Home/images/works_03.jpg" alt="">
                </div>
                <div class="works_btn text-center">
                    <a href="excellent.html" class="btn btn-red border35 font36">查看更多</a>
                </div>
            </div>
        </div>
        <!-- 作品介绍结束-->

    </div>
    <!--主体内容结束-->    <!--下操作栏-->
    <footer>
        <!--education-->
        <div class="content_item education">
            <div class="content_item_bg">
                <div class="title font60">
                    <div class="main_title">壹加壹 <span>成就大学之美</span></div>
                    <span class="font20">One plus one art education</span>

                </div>
                <form action="" class="eduction_content">
                    <div class="education_items">
                        <div class="education_item text-center">
                            <img src="/yijiyi/Public/Home/images/education1.jpg" alt="">
                            <p>选床位</p>
                        </div>
                        <div class="education_item text-center">
                            <img src="/yijiyi/Public/Home/images/education2.jpg" alt="">
                            <p>选床位</p>
                        </div>
                        <div class="education_item text-center">
                            <img src="/yijiyi/Public/Home/images/education3.jpg" alt="">
                            <p>选床位</p>
                        </div>
                        <div class="education_item text-center">
                            <img src="/yijiyi/Public/Home/images/education4.jpg" alt="">
                            <p>选床位</p>
                        </div>
                    </div>
                    <div class="education_form clear">
                        <select name="selectClass" id="selectClass" class="fl">
                            <option value="选班级">选班级</option>
                        </select>
                        <select name="selectEducation" id="selectEducation" class="fr">
                            <option value="选大学">选大学</option>
                        </select>
                        <select name="selectTeach" id="selectTeach" class="fl">
                            <option value="选名师">选名师</option>
                        </select>
                        <input type="text" placeholder="您的姓名" class="fr">
                        <select name="selectBed" id="selectBed" class="fl">
                            <option value="选床位">选床位</option>
                        </select>
                        <input type="text" placeholder="您的电话" class="fr">
                    </div>
                    <div class="education_btn text-center">
                        <a href="" class="btn btn-red border35 font36">立刻报名</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="copyright  text-center">
            CopyRi版权所有 北京壹加壹卓越文化创意产业有限公司 京ICP备14045042号-1         </div>
        <div class="footer_nav">
            <a href="tel:17600103465" class="footer_nav_item">
                <p><img src="/yijiyi/Public/Home/images/tel1.png" alt=""></p>
                <span>拨打电话</span>
            </a>
            <a href="" class="footer_nav_item">
                <p><img src="/yijiyi/Public/Home/images/inpuiry.png" alt=""></p>
                <span>在线咨询</span>
            </a>
            <a href="" class="footer_nav_item">
                <p><img src="/yijiyi/Public/Home/images/live1.png" alt=""></p>
                <span>网络直播</span>
            </a>
        </div>
        <!--education-->
    </footer>
    <!--下操作栏结束-->
</div>
</body>
</html>