<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose /2018.01.13/Public/JiCheng/tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>管理系统</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link href="/2018.01.13/Public/JiCheng/css/css.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/2018.01.13/Public/JiCheng/javascript/jquery-1.12.3.min.js"></script>
        <script type="text/javascript" src="/2018.01.13/Public/JiCheng/tool/laydate/laydate.js"></script>
        <script type="text/javascript" src="/2018.01.13/Public/JiCheng/javascript/js.js"></script>
        
       
    </head>
    <body>
        <div class="master"><div class="header-top">
        <h2>后台管理
            <span class="head-add">欢迎 admin 登录，使用系统！<a style="border: none;" href="/2018.01.13/index.php?m=JiChengcms&c=Login&a=index">退出登录</a><span>
        </h2>
        <div class="cl"></div>
</div>


<div class="index-main">
    <ul class='index-menu'>
      <li><a title="密码修改" href="/2018.01.13/index.php?m=JiChengcms&c=Index&a=EditPassword"><span class="menu-title">密码修改</span></a></li><li><a title="基本设置" href="/2018.01.13/index.php?m=JiChengcms&c=Config&a=index"><span class="menu-title">基本设置</span></a></li><li><a title="幻灯片管理" href="/2018.01.13/index.php?m=JiChengcms&c=Advertis&a=index"><span class="menu-title">幻灯片管理</span></a></li><li><a title="栏目分类" href="/2018.01.13/index.php?m=JiChengcms&c=Column&a=column"><span class="menu-title">栏目分类</span></a></li><li><a title="栏目列表" href="/2018.01.13/index.php?m=JiChengcms&c=Column&a=index"><span class="menu-title">栏目列表</span></a></li><li><a title="产品分类" href="/2018.01.13/index.php?m=JiChengcms&c=ProductType&a=index"><span class="menu-title">产品分类</span></a></li><li><a title="产品列表" href="/2018.01.13/index.php?m=JiChengcms&c=Product&a=index"><span class="menu-title">产品列表</span></a></li><li><a title="招聘列表" href="/2018.01.13/index.php?m=JiChengcms&c=ZhaoPin&a=index"><span class="menu-title">招聘列表</span></a></li><li><a title="用户列表" href="/2018.01.13/index.php?m=JiChengcms&c=Member&a=index"><span class="menu-title">用户列表</span></a></li><!--        <li><a href="#"><div class="menu-pic"></div><span class="menu-title">系统首页首页首</span></a></li>-->
    </ul>
    <div class="cl"></div>
      </div>            <div class="cl"></div>
            <div class="footer">
                <div class="footer-butt-l"><a href='/2018.01.13/index.php?m=JiChengcms&c=Index&a=index'></a></div>
                    <span class="footer-title">系统首页</span>
                    <div class="footer-butt-r"><a onmouseover="click_gongneng('1')"></a></div>
                    
                    <div class="menu-gongneng hide">
<!--                            <ul class="nav1">
                                <li>
                                    <a href="#">系统首页</a>
                                </li>
                                <li>
                                    <a href="#">系统首页</a>
                                    <ul class="sub_nav hide">
                                        <li><a href="#">二级导航</a></li>
                                        <li class="li2">
                                            <a href="#">二级导航</a>
                                            <ul class="sub_nav hide">
                                                <li><a href="#">三级导航</a></li>
                                            </ul>
                                         </li>
                                    </ul>
                                </li>
                           
                            </ul>-->
                             <ul class="nav1"> <li><a href="">系统管理</a><ul class="sub_nav hide"><li><a href="/2018.01.13/index.php?m=JiChengcms&c=Index&a=EditPassword">密码修改</a></li><li><a href="/2018.01.13/index.php?m=JiChengcms&c=Config&a=index">基本设置</a></li><li><a href="/2018.01.13/index.php?m=JiChengcms&c=Advertis&a=index">幻灯片管理</a></li></ul></li> <li><a href="">栏目管理</a><ul class="sub_nav hide"><li><a href="/2018.01.13/index.php?m=JiChengcms&c=Column&a=column">栏目分类</a></li><li><a href="/2018.01.13/index.php?m=JiChengcms&c=Column&a=index">栏目列表</a></li></ul></li> <li><a href="">招聘管理</a><ul class="sub_nav hide"><li><a href="/2018.01.13/index.php?m=JiChengcms&c=ZhaoPin&a=index">招聘列表</a></li></ul></li> <li><a href="">产品管理</a><ul class="sub_nav hide"><li><a href="/2018.01.13/index.php?m=JiChengcms&c=ProductType&a=index">产品分类</a></li><li><a href="/2018.01.13/index.php?m=JiChengcms&c=Product&a=index">产品列表</a></li></ul></li> <li><a href="">用户管理</a><ul class="sub_nav hide"><li><a href="/2018.01.13/index.php?m=JiChengcms&c=Member&a=index">用户列表</a></li></ul></li></ul>                    </div>
                   <div class="cl"></div>
            </div>
        </div>
    </body>
</html>