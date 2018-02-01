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
        <span class="head-add">欢迎 admin2 登录，使用系统！<a style="border: none;" href="/yijiayi/index.php?m=YiJiaYicms&c=Login&a=index">退出登录</a>
                <a style="margin-left:50px;" href="/yijiayi/index.php?m=YiJiaYicms&c=AdminGroup&a=group_addup">添加管理员组</a>
        <span>
    </h2>
    <div class="condition">
         <form action="" method="get">
                <ul>
                    <li>搜索：
                        <input type="text" style="width:180px;" name="keyworld" value=""/>
                        <input type="hidden" name="m" value="YiJiaYicms"><input type="hidden" name="c" value="AdminGroup"><input type="hidden" name="a" value="group">                        <input type="submit" class="butt" value="确定">
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
                                <td bgcolor="#e1e1e1" style="text-align: left; padding-left:10px;"><strong>管理员组名称</strong></td>
                                <td bgcolor="#e1e1e1" style="text-align: left; padding-left:10px;"><strong>描述</strong></td>
                                <td bgcolor="#e1e1e1"><strong>操作</strong></td>
                        </tr>
                        <tr><td style="text-align: left; padding-left:10px;">技术管理员</td><td style="text-align: left; padding-left:10px;">开发管理员拥有最高权限。请合理分配权限。</td><td class="action-butt"><span>禁用</span><a href="/yijiayi/index.php?m=YiJiaYicms&c=AdminGroup&a=group_addup&id=c4ca4238a0b923820dcc509a6f75849b">修改</a><span>删除</span></td></tr><tr><td style="text-align: left; padding-left:10px;">系统管理员管理</td><td style="text-align: left; padding-left:10px;">系统管理员管理</td><td class="action-butt"><a href="/yijiayi/index.php?m=YiJiaYicms&c=AdminGroup&a=is_switch&if=false&id=c81e728d9d4c2f636f067f89cc14862c">禁用</a><a href="/yijiayi/index.php?m=YiJiaYicms&c=AdminGroup&a=group_addup&id=c81e728d9d4c2f636f067f89cc14862c">修改</a><a onclick="confirms('确定要删除吗？','/yijiayi/index.php?m=YiJiaYicms&c=AdminGroup&a=del&id=c81e728d9d4c2f636f067f89cc14862c')">删除</a></td></tr>               </table>
            
            <div class="pagelist">
                    <div class="pageList"><span style="color:#333; margin:2px 10px;">共2条记录</span><a href="javascript:;">首页</a><a href="javascript:;">上一页</a><a href="javascript:;" class="on">1</a><a href="javascript:;">下一页</a><a href="javascript:;">尾页</a></div>            </div>
       </div>
<div class="cl"></div>
</div>            <div class="cl"></div>
            <div class="footer">
                <div class="footer-butt-l"><a href='/yijiayi/index.php?m=YiJiaYicms&c=Index&a=index'></a></div>
                    <span class="footer-title">管理员组</span>
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
                             <ul class="nav1"> <li><a href="">系统管理</a><ul class="sub_nav hide"><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Index&a=EditPassword">密码修改</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Config&a=index">基本设置</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Advertis&a=index">广告管理</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Link&a=index">友情链接</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Log&a=index">日志管理</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=City&a=index">地区管理</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Index&a=EditCode">代码编辑</a></li></ul></li> <li><a href="">管理员管理</a><ul class="sub_nav hide"><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=AdminGroup&a=index">管理员列表</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=AdminGroup&a=group">管理员组</a></li></ul></li> <li><a href="">栏目管理</a><ul class="sub_nav hide"><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Column&a=column">栏目分类</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Column&a=index">栏目列表</a></li></ul></li> <li><a href="">招聘管理</a><ul class="sub_nav hide"><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=ZhaoPin&a=index">招聘列表</a></li></ul></li> <li><a href="">产品管理</a><ul class="sub_nav hide"><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=ProductType&a=index">产品分类</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Product&a=index">产品列表</a></li></ul></li> <li><a href="">用户管理</a><ul class="sub_nav hide"><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Member&a=index">用户列表</a></li></ul></li></ul>                    </div>
                   <div class="cl"></div>
            </div>
        </div>
    </body>
</html>