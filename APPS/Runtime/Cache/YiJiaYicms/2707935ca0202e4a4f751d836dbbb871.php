<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose /yijiyi/Public/YiJiaYi/tools | Templates
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
        <link href="/yijiyi/Public/YiJiaYi/css/css.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/yijiyi/Public/YiJiaYi/javascript/jquery-1.12.3.min.js"></script>
        <script type="text/javascript" src="/yijiyi/Public/YiJiaYi/tool/laydate/laydate.js"></script>
        <script type="text/javascript" src="/yijiyi/Public/YiJiaYi/javascript/js.js"></script>
        
       
    </head>
    <body>
        <div class="master"><div class="header-top">
    <h2>后台管理
        <span class="head-add">欢迎 admin 登录，使用系统！<a style="border: none;" href="/yijiyi/index.php?m=YiJiaYicms&c=Login&a=index">退出登录</a>
                <a style="margin-left:50px;" href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&position=2">添加栏目内容</a>
        <span>
    </h2>
    <div class="condition">
         <form action="" method="get">
                <ul>
                    <li>搜索：
                        <input type="text" style="width:180px;" name="keyworld" value=""/>
                        &nbsp;&nbsp;&nbsp;栏目类型：
                        <select name="group">
                            <option value="">--请选择--</option>
                                                    </select>
                        <input type="hidden" name="m" value="YiJiaYicms"><input type="hidden" name="c" value="Column"><input type="hidden" name="a" value="column">                        <input type="submit" class="butt" value="确定">
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
                                <td bgcolor="#e1e1e1"><strong>ID</strong></td>
                                <td bgcolor="#e1e1e1" style="text-align: left; padding-left: 10px;"><strong>栏目分类名称</strong></td>
                                <td bgcolor="#e1e1e1" style="text-align: left; padding-left: 10px;"><strong>自定义跳转链接</strong></td>
                                <td bgcolor="#e1e1e1"><strong>站点</strong></td>
                                <td bgcolor="#e1e1e1"><strong>排列排序</strong></td>
                                <td bgcolor="#e1e1e1"><strong>操作</strong></td>
                        </tr>
                        <tr><td>1</td><td style="text-align: left; padding-left: 10px;">首页&nbsp;&nbsp;<span style="color:#ccc">[ 单页 ]</span></td><td style="text-align: left; padding-left: 10px;">/</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=c4ca4238a0b923820dcc509a6f75849b">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=c4ca4238a0b923820dcc509a6f75849b">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=c4ca4238a0b923820dcc509a6f75849b')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=c4ca4238a0b923820dcc509a6f75849b">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=c4ca4238a0b923820dcc509a6f75849b">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=c4ca4238a0b923820dcc509a6f75849b">底部启用</a></td></tr>               </table>
            
            <div class="pagelist">
                                </div>
       </div>
<div class="cl"></div>
</div>            <div class="cl"></div>
            <div class="footer">
                <div class="footer-butt-l"><a href='/yijiyi/index.php?m=YiJiaYicms&c=Index&a=index'></a></div>
                    <span class="footer-title">栏目类型</span>
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
                             <ul class="nav1"> <li><a href="">系统管理</a><ul class="sub_nav hide"><li><a href="/yijiyi/index.php?m=YiJiaYicms&c=Index&a=EditPassword">密码修改</a></li><li><a href="/yijiyi/index.php?m=YiJiaYicms&c=Config&a=index">基本设置</a></li><li><a href="/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=index">广告管理</a></li><li><a href="/yijiyi/index.php?m=YiJiaYicms&c=Link&a=index">友情链接</a></li></ul></li> <li><a href="">栏目管理</a><ul class="sub_nav hide"><li><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column">栏目分类</a></li><li><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=index">栏目列表</a></li></ul></li> <li><a href="">招聘管理</a><ul class="sub_nav hide"><li><a href="/yijiyi/index.php?m=YiJiaYicms&c=ZhaoPin&a=index">招聘列表</a></li></ul></li> <li><a href="">产品管理</a><ul class="sub_nav hide"><li><a href="/yijiyi/index.php?m=YiJiaYicms&c=ProductType&a=index">产品分类</a></li><li><a href="/yijiyi/index.php?m=YiJiaYicms&c=Product&a=index">产品列表</a></li></ul></li> <li><a href="">用户管理</a><ul class="sub_nav hide"><li><a href="/yijiyi/index.php?m=YiJiaYicms&c=Member&a=index">用户列表</a></li></ul></li></ul>                    </div>
                   <div class="cl"></div>
            </div>
        </div>
    </body>
</html>