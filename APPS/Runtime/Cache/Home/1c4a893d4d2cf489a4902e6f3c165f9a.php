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
                    <a href="about.html" class="menu_item">关于我们</a>
                    <a href="about.html" class="menu_item">关于我们</a>
                    <a href="about.html" class="menu_item">关于我们</a>
                    <a href="about.html" class="menu_item">关于我们</a>
                    <a href="about.html" class="menu_item">关于我们</a>
                    <a href="about.html" class="menu_item">关于我们</a>
                    <a href="about.html" class="menu_item">关于我们</a>
                    <a href="about.html" class="menu_item">关于我们</a>
                </div>
            </div>
        </div>
        <img src="/yijiyi/Public/Home/images/header_title.png" class="img-title ele-center"/>
    </header>
    <!--上操作栏结束-->

    <!--主体内容-->
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
        <!-- 轮播banner结束-->            <!--幻灯部分-->
            <div class="slide-box">
                <div class="slide-img">
                    <img class="" src="/yijiyi/Public/upload/JCHK/2018/20180116/2018/20180116/20180116090816fJ.png" /><img class="hide" src="/yijiyi/Public/upload/JCHK/2018/20180115/2018/20180115/20180115174346I4.jpg" /><img class="hide" src="/yijiyi/Public/upload/JCHK/2018/20180116/2018/20180116/20180116090747bo.png" />                </div>
                <div class="slide-list wrap">
                    <div class="list-box">
                      <span class="span-box mo "></span><span class="span-box  "></span><span class="span-box  "></span>                    </div>
                </div>
            </div>
            
            <!--1-->
            <div class="itext-box wrap">
                    <h1>关于积成航科</h1>
                    <a>ABOUT INTEGARTION</a>
            </div>
            
            <div class="in1-box wrap">
               <div class="content">
                    <div class="left">
                        <a href=""><img src="/yijiyi/Public/upload/JCHK/2018/20180116/2018/20180116/20180116091219tB.jpg"/></a>                    </div>
                    <div class="right">
                        <div class="nr">
                          北京积成航空科技有限公司于2017年08月21日成立。法定代表人柴利冰,公司经营范围包括：技术推广等。 北京积成航空科技有限公司于2017年08月21日成立。法定代表人柴利冰,公司经营范围包括：技术推广等。 北京积成航空科技有限公司于2017年08月21日成立。法定代表人柴利冰,公司经营范围包括：技术推广等。 北京积成航空科技有限公司于2017年08月21日成立。法定代表人柴利冰,公司经营范围包括：技术推广等。 北京积成航空科技有限公司于2017年08月21日成立。法定代表人柴利冰,公司经营范围包括：技术                        </div>
                        <div class="cz-more">
                            <a href="/yijiyi/index.php?m=Home&c=CluCentre&a=index&cluinid=2"><span class="cz-more-sp">查找更多<span></span></span></a>
                        </div>
                    </div>
                    <div class="cl"></div>
                </div>
            </div>
            
             <!--2-->
            <div class="itext-box wrap">
                    <h1>新闻资讯</h1>
                    <a>INTEGARTION NEWS</a>
            </div>
            
            <div class="in1-box wrap">
               <div class="content">
                    <div class="left-2">
                         <h1 class="tt8">公司动态
                                <span>
                                    <a href="/yijiyi/index.php?m=Home&c=CluCentre&a=index&mo=4&cluinid=4&infid=6512bd43d9caa6e02c990b0a82652dca">更多...</a>
                                </span>
                         </h1>
                        
                        <div class="new-box">
                                <div class="newBox-top">
                                    <div class="tleft01 dongtai">
                                        <a class="" href=""><img  src="/yijiyi/Public/upload/JCHK/2018/20180130/2018/20180130/20180130181458l2.jpg" /></a><a class="hide" href=""><img  src="/yijiyi/Public/upload/JCHK/2018/20180116/2018/20180116/20180116091253Ck.jpg" /></a>                                    </div>
                                    <div class="tright01">
                                        <span><a href="/yijiyi/index.php?m=Home&c=CluCentre&a=contentInfo&mo=4&cluinid=4&infid=6512bd43d9caa6e02c990b0a82652dca&listinfo=c4ca4238a0b923820dcc509a6f75849b">测试一</a></span>
                                        <p class="txt">自己发破案四间房破is阿鸡排饭</p>
                                    </div>
                                    <div class="cl"></div>
                                </div>
                                <ul>
                                      <a href="/yijiyi/index.php?m=Home&c=CluCentre&a=contentInfo&mo=4&cluinid=4&infid=6512bd43d9caa6e02c990b0a82652dca&listinfo=c81e728d9d4c2f636f067f89cc14862c"><li>测试二 <span>2018-01-17</span></li></a><a href="/yijiyi/index.php?m=Home&c=CluCentre&a=contentInfo&mo=4&cluinid=4&infid=6512bd43d9caa6e02c990b0a82652dca&listinfo=eccbc87e4b5ce2fe28308fd9f2a7baf3"><li>测试三 <span>2018-01-17</span></li></a><a href="/yijiyi/index.php?m=Home&c=CluCentre&a=contentInfo&mo=4&cluinid=4&infid=6512bd43d9caa6e02c990b0a82652dca&listinfo=a87ff679a2f3e71d9181a67b7542122c"><li>测试四 <span>2018-01-17</span></li></a>                                </ul>
                        </div>
                    </div>
                   
                   
                    <div class="right-2">
                         <h1 class="tt8">行业动态
                            <span>
                                <a href="/yijiyi/index.php?m=Home&c=CluCentre&a=index&mo=4&cluinid=4&infid=c20ad4d76fe97759aa27a0c99bff6710">更多...</a>
                            </span>
                        </h1>
                         <div class="new-box">
                                <div class="newBox-top">
                                    <div class="tleft01 hangye">
                                        <a class="" href=""><img src="/yijiyi/Public/upload/JCHK/2018/20180130/2018/20180130/20180130190203La.jpg" /></a><a class="hide" href=""><img src="/yijiyi/Public/upload/JCHK/2018/20180116/2018/20180116/20180116091315Fb.jpg" /></a>                                    </div>
                                    <div class="tright01">
                                        <span><a href="/yijiyi/index.php?m=Home&c=CluCentre&a=contentInfo&mo=4&cluinid=4&infid=c20ad4d76fe97759aa27a0c99bff6710&listinfo=e4da3b7fbbce2345d7772b0674a318d5">测试一</span>
                                        <p class="txt">积成航空科技</p>
                                    </div>
                                    <div class="cl"></div>
                                </div>
                                <ul>
                                        <a href="/yijiyi/index.php?m=Home&c=CluCentre&a=contentInfo&mo=4&cluinid=4&infid=c20ad4d76fe97759aa27a0c99bff6710&listinfo=1679091c5a880faf6fb5e6087eb1b2dc"><li>测试二 <span>2018-01-17</span></li></a><a href="/yijiyi/index.php?m=Home&c=CluCentre&a=contentInfo&mo=4&cluinid=4&infid=c20ad4d76fe97759aa27a0c99bff6710&listinfo=8f14e45fceea167a5a36dedd4bea2543"><li>测试三 <span>2018-01-17</span></li></a><a href="/yijiyi/index.php?m=Home&c=CluCentre&a=contentInfo&mo=4&cluinid=4&infid=c20ad4d76fe97759aa27a0c99bff6710&listinfo=c9f0f895fb98ab9159f51fd0297e236d"><li>测试四 <span>2018-01-17</span></li></a>                                </ul>
                        </div>
                    </div>
                    <div class="cl"></div>
                </div>
            </div>
             
             
             
             <!--3-->
            <div class="itext-box wrap">
                    <h1>产品展示</h1>
                    <a>积成航科旗下子公司斯利德产品展示</a>
            </div>
            
             <div class="product-box wrap">
                 <div class="content">
                        <div class="left"></div>
                        <div class="listbox">
                            <div class="yidong">
                                <div class="list-l">
                            <a href="/yijiyi/index.php?m=Home&c=CluCentre&a=productInfo&mo=5&cluinid=5&protypeid=1&proid=45c48cce2e2d7fbdea1afc51c7c6ad26">
                                <div class="img"><img src="/yijiyi/Public/upload/JCHK/Product/2018/20180117/201801171505097Y.jpg"/></div>
                                <div class="title">测试产品四</div>
                             </a>
                          </div><div class="list-l">
                            <a href="/yijiyi/index.php?m=Home&c=CluCentre&a=productInfo&mo=5&cluinid=5&protypeid=1&proid=c9f0f895fb98ab9159f51fd0297e236d">
                                <div class="img"><img src="/yijiyi/Public/upload/JCHK/Product/2018/20180117/20180117150218O5.jpg"/></div>
                                <div class="title">测试产品三</div>
                             </a>
                          </div><div class="list-l">
                            <a href="/yijiyi/index.php?m=Home&c=CluCentre&a=productInfo&mo=5&cluinid=5&protypeid=1&proid=8f14e45fceea167a5a36dedd4bea2543">
                                <div class="img"><img src="/yijiyi/Public/upload/JCHK/Product/2018/20180117/20180117150157rh.jpg"/></div>
                                <div class="title">测试产品二</div>
                             </a>
                          </div><div class="list-l">
                            <a href="/yijiyi/index.php?m=Home&c=CluCentre&a=productInfo&mo=5&cluinid=5&protypeid=1&proid=1679091c5a880faf6fb5e6087eb1b2dc">
                                <div class="img"><img src="/yijiyi/Public/upload/JCHK/Product/2018/20180117/20180117150135rK.jpg"/></div>
                                <div class="title">测试产品一</div>
                             </a>
                          </div><div class="list-l">
                            <a href="/yijiyi/index.php?m=Home&c=CluCentre&a=productInfo&mo=5&cluinid=5&protypeid=1&proid=e4da3b7fbbce2345d7772b0674a318d5">
                                <div class="img"><img src="/yijiyi/Public/upload/JCHK/Product/2018/20180117/201801171505097Y.jpg"/></div>
                                <div class="title">测试产品四</div>
                             </a>
                          </div><div class="list-l">
                            <a href="/yijiyi/index.php?m=Home&c=CluCentre&a=productInfo&mo=5&cluinid=5&protypeid=4&proid=a87ff679a2f3e71d9181a67b7542122c">
                                <div class="img"><img src="/yijiyi/Public/upload/JCHK/Product/2018/20180117/20180117150218O5.jpg"/></div>
                                <div class="title">测试产品三</div>
                             </a>
                          </div><div class="list-l">
                            <a href="/yijiyi/index.php?m=Home&c=CluCentre&a=productInfo&mo=5&cluinid=5&protypeid=1&proid=eccbc87e4b5ce2fe28308fd9f2a7baf3">
                                <div class="img"><img src="/yijiyi/Public/upload/JCHK/Product/2018/20180117/20180117150157rh.jpg"/></div>
                                <div class="title">测试产品二</div>
                             </a>
                          </div><div class="list-l">
                            <a href="/yijiyi/index.php?m=Home&c=CluCentre&a=productInfo&mo=5&cluinid=5&protypeid=1&proid=c81e728d9d4c2f636f067f89cc14862c">
                                <div class="img"><img src="/yijiyi/Public/upload/JCHK/Product/2018/20180117/20180117150135rK.jpg"/></div>
                                <div class="title">测试产品一</div>
                             </a>
                          </div>                            </div>
                        </div>
                        <div class="right"></div>
                 </div>
             </div>
             <a href="/yijiyi/index.php?m=Home&c=CluCentre&a=productInfo&cluinid=5">
                <div class="geduo wrap">
                   查看更多...
                </div>
             </a>    <!--下操作栏-->
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