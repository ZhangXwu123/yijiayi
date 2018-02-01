<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose /yijiayi/Public/JiCheng/tools | Templates
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
        <link href="/yijiayi/Public/JiCheng/css/css.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/yijiayi/Public/JiCheng/javascript/jquery-1.12.3.min.js"></script>
        <script type="text/javascript" src="/yijiayi/Public/JiCheng/tool/laydate/laydate.js"></script>
        <script type="text/javascript" src="/yijiayi/Public/JiCheng/javascript/js.js"></script>
        
       
    </head>
    <body>
        <div class="master"><div class="header-top">
    <h2>后台管理
        <span class="head-add">欢迎 admin 登录，使用系统！<a style="border: none;" href="/yijiayi/index.php?m=YiJiaYicms&c=Login&a=index">退出登录</a>
                <a style="margin-left:50px;" href="/yijiayi/index.php?m=YiJiaYicms&c=Link&a=addup">添加友情链接</a>
        <span>
    </h2>
    <div class="condition">
         <form action="" method="get">
                <ul>
                    <li>搜索：
                        <input type="text" style="width:180px;" name="keyworld" value=""/>
                        <input type="hidden" name="m" value="YiJiaYicms"><input type="hidden" name="c" value="Link"><input type="hidden" name="a" value="index">                        <input type="submit" class="butt" value="确定">
                    </li>
                </ul>
         </form>
         <div class="cl"></div>
    </div>
    <div class="cl"></div>
</div>

<div class="sub-page">
    
        <div class="tb-cn">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                         <tr>
                                <td bgcolor="#e1e1e1" style="text-align: left; padding: 15px;"><strong>友情链接标题或图片</strong></td>
                                <td bgcolor="#e1e1e1"><strong>类型</strong></td>
                                <td bgcolor="#e1e1e1"><strong>排列排序</strong></td>
                                <td bgcolor="#e1e1e1"><strong>添加时间</strong></td>
                                <td bgcolor="#e1e1e1"><strong>操作</strong></td>
                        </tr>
                                       </table>
            
            <div class="pagelist">
                                </div>
       </div>
<div class="cl"></div>
</div>            <div class="cl"></div>
            <div class="footer">
                <div class="footer-butt-l"><a href='/yijiayi/index.php?m=YiJiaYicms&c=Index&a=index'></a></div>
                    <span class="footer-title">友情链接管理</span>
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
                             <ul class="nav1"> <li><a href="">系统管理</a><ul class="sub_nav hide"><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Index&a=EditPassword">密码修改</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Config&a=index">基本设置</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Advertis&a=index">广告管理</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Link&a=index">友情链接</a></li></ul></li> <li><a href="">栏目管理</a><ul class="sub_nav hide"><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Column&a=column">栏目分类</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Column&a=index">栏目列表</a></li></ul></li> <li><a href="">招聘管理</a><ul class="sub_nav hide"><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=ZhaoPin&a=index">招聘列表</a></li></ul></li> <li><a href="">产品管理</a><ul class="sub_nav hide"><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=ProductType&a=index">产品分类</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Product&a=index">产品列表</a></li></ul></li> <li><a href="">用户管理</a><ul class="sub_nav hide"><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Member&a=index">用户列表</a></li></ul></li></ul>                    </div>
                   <div class="cl"></div>
            </div>
        </div>
    </body>
</html>