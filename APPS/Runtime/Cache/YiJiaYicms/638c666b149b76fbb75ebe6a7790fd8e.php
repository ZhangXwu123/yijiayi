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
                <a style="margin-left:50px;" href="/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=addup">添加广告</a>
        <span>
    </h2>
    <div class="condition">
         <form action="" method="get">
                <ul>
                    <li>搜索：
                        <input type="text" style="width:180px;" name="keyworld" value=""/>
                        <input type="hidden" name="m" value="YiJiaYicms"><input type="hidden" name="c" value="Advertis"><input type="hidden" name="a" value="index">                        <input type="submit" class="butt" value="确定">
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
                            <td bgcolor="#e1e1e1" style="text-align: left; padding: 15px;"><strong>广告缩略图</strong></td>
                            <td bgcolor="#e1e1e1" style="text-align: left; padding: 15px;"><strong>广告分类</strong></td>
                            <td bgcolor="#e1e1e1"><strong>广告标识</strong></td>
                            <td bgcolor="#e1e1e1" style="text-align: left; padding: 15px;"><strong>所属（站点）栏目</strong></td>
                            <td bgcolor="#e1e1e1"><strong>排列排序</strong></td>
                            <td bgcolor="#e1e1e1"><strong>时间</strong></td>
                            <td bgcolor="#e1e1e1"><strong>操作</strong></td>
                        </tr>
                        <tr><td title="幻灯" style="text-align: left; padding: 15px;"><a target="_blank" href=""> <img src="/yijiyi/Public/upload/JCHK/2018/20180116/2018/20180116/20180116090816fJ.png" style="width:60px; height:60px; border:1px solid #ccc; margin:2px; padding:1px;"> </a></td><td style="text-align: left; padding: 15px;">顶部幻灯 [1]</td><td>幻灯</td><td style="text-align: left; padding: 15px;"> [ 站点1 ] * 首页</td><td>0</td><td>2018-01-16</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=is_switch&if=false&id=c9f0f895fb98ab9159f51fd0297e236d">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=addup&id=c9f0f895fb98ab9159f51fd0297e236d">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=del&id=c9f0f895fb98ab9159f51fd0297e236d')">删除</a></td></tr><tr><td title="广告" style="text-align: left; padding: 15px;"><a target="_blank" href=""> <img src="/yijiyi/Public/upload/JCHK/2018/20180116/2018/20180116/20180116091219tB.jpg" style="width:60px; height:60px; border:1px solid #ccc; margin:2px; padding:1px;"> </a></td><td style="text-align: left; padding: 15px;">顶部中间 [2]</td><td>广告</td><td style="text-align: left; padding: 15px;"> [ 站点1 ] * 首页</td><td>0</td><td>2018-01-16</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=is_switch&if=false&id=45c48cce2e2d7fbdea1afc51c7c6ad26">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=addup&id=45c48cce2e2d7fbdea1afc51c7c6ad26">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=del&id=45c48cce2e2d7fbdea1afc51c7c6ad26')">删除</a></td></tr><tr><td title="幻灯" style="text-align: left; padding: 15px;"><a target="_blank" href=""> <img src="/yijiyi/Public/upload/JCHK/2018/20180115/2018/20180115/20180115174346I4.jpg" style="width:60px; height:60px; border:1px solid #ccc; margin:2px; padding:1px;"> </a></td><td style="text-align: left; padding: 15px;">顶部幻灯 [1]</td><td>幻灯</td><td style="text-align: left; padding: 15px;"> [ 站点1 ] * 首页</td><td>0</td><td>2018-01-15</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=is_switch&if=false&id=1679091c5a880faf6fb5e6087eb1b2dc">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=addup&id=1679091c5a880faf6fb5e6087eb1b2dc">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=del&id=1679091c5a880faf6fb5e6087eb1b2dc')">删除</a></td></tr><tr><td title="2" style="text-align: left; padding: 15px;"><a target="_blank" href=""> <img src="/yijiyi/Public/upload/JCHK/2018/20180130/2018/20180130/20180130181458l2.jpg" style="width:60px; height:60px; border:1px solid #ccc; margin:2px; padding:1px;"> </a></td><td style="text-align: left; padding: 15px;">顶部中间 [2]</td><td>2</td><td style="text-align: left; padding: 15px;"> [ 站点1 ] * 公司动态</td><td>0</td><td>2018-01-30</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=is_switch&if=false&id=c20ad4d76fe97759aa27a0c99bff6710">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=addup&id=c20ad4d76fe97759aa27a0c99bff6710">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=del&id=c20ad4d76fe97759aa27a0c99bff6710')">删除</a></td></tr><tr><td title="3" style="text-align: left; padding: 15px;"><a target="_blank" href=""> <img src="/yijiyi/Public/upload/JCHK/2018/20180130/2018/20180130/20180130190203La.jpg" style="width:60px; height:60px; border:1px solid #ccc; margin:2px; padding:1px;"> </a></td><td style="text-align: left; padding: 15px;">顶部中间 [2]</td><td>3</td><td style="text-align: left; padding: 15px;"> [ 站点1 ] * 行业动态</td><td>0</td><td>2018-01-30</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=is_switch&if=false&id=c51ce410c124a10e0db5e4b97fc2af39">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=addup&id=c51ce410c124a10e0db5e4b97fc2af39">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=del&id=c51ce410c124a10e0db5e4b97fc2af39')">删除</a></td></tr><tr><td title="幻灯" style="text-align: left; padding: 15px;"><a target="_blank" href=""> <img src="/yijiyi/Public/upload/JCHK/2018/20180116/2018/20180116/20180116090747bo.png" style="width:60px; height:60px; border:1px solid #ccc; margin:2px; padding:1px;"> </a></td><td style="text-align: left; padding: 15px;">顶部幻灯 [1]</td><td>幻灯</td><td style="text-align: left; padding: 15px;"> [ 站点1 ] * 首页</td><td>1</td><td>2018-01-16</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=is_switch&if=false&id=8f14e45fceea167a5a36dedd4bea2543">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=addup&id=8f14e45fceea167a5a36dedd4bea2543">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=del&id=8f14e45fceea167a5a36dedd4bea2543')">删除</a></td></tr><tr><td title="广告" style="text-align: left; padding: 15px;"><a target="_blank" href=""> <img src="/yijiyi/Public/upload/JCHK/2018/20180116/2018/20180116/20180116091315Fb.jpg" style="width:60px; height:60px; border:1px solid #ccc; margin:2px; padding:1px;"> </a></td><td style="text-align: left; padding: 15px;">顶部中间 [2]</td><td>广告</td><td style="text-align: left; padding: 15px;"> [ 站点1 ] * 行业动态</td><td>2</td><td>2018-01-16</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=is_switch&if=false&id=6512bd43d9caa6e02c990b0a82652dca">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=addup&id=6512bd43d9caa6e02c990b0a82652dca">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=del&id=6512bd43d9caa6e02c990b0a82652dca')">删除</a></td></tr><tr><td title="广告" style="text-align: left; padding: 15px;"><a target="_blank" href=""> <img src="/yijiyi/Public/upload/JCHK/2018/20180116/2018/20180116/20180116091253Ck.jpg" style="width:60px; height:60px; border:1px solid #ccc; margin:2px; padding:1px;"> </a></td><td style="text-align: left; padding: 15px;">顶部中间 [2]</td><td>广告</td><td style="text-align: left; padding: 15px;"> [ 站点1 ] * 公司动态</td><td>4</td><td>2018-01-16</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=is_switch&if=false&id=d3d9446802a44259755d38e6d163e820">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=addup&id=d3d9446802a44259755d38e6d163e820">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Advertis&a=del&id=d3d9446802a44259755d38e6d163e820')">删除</a></td></tr>               </table>
            
            <div class="pagelist">
                    <div class="pageList"><span style="color:#333; margin:2px 10px;">共8条记录</span><a href="javascript:;">首页</a><a href="javascript:;">上一页</a><a href="javascript:;" class="on">1</a><a href="javascript:;">下一页</a><a href="javascript:;">尾页</a></div>            </div>
       </div>
<div class="cl"></div>
</div>            <div class="cl"></div>
            <div class="footer">
                <div class="footer-butt-l"><a href='/yijiyi/index.php?m=YiJiaYicms&c=Index&a=index'></a></div>
                    <span class="footer-title">广告管理</span>
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