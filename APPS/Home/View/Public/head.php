<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head lang="en">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content=" user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="<?php echo $wdescription; ?>">
        <meta name="keywords" content="<?php echo $wkeyworld; ?>">
        <title><?php echo $btitle; ?></title>
        <link rel="stylesheet" href="Css/base.css"/>
        <link rel="stylesheet" href="Css/index.css"/>
        <link rel="stylesheet" href="Css/swiper.css">
        <script src="Javascript/jquery-1.11.3.min.js"></script>
        <script src="Javascript/swiper.min.js"></script>
        <!-- Initialize Swiper -->
        <script src="Javascript/index.js"></script>
    
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
                <img src="Tool/svg/header_menu.svg"/>
        </nav>
        <div id="menu">
            <div class="menu" id="menu_ct">
                <img src="Images/menu_header.jpg" alt="">
                <div class="menu_list">
                    <?php echo $nav; ?>
                </div>
            </div>
        </div>
        <a href="<?php echo $rootURL; ?>"><img src="<?php echo $logo; ?>" class="img-title ele-center"/></a>
    </header>
    <!--上操作栏结束-->
        