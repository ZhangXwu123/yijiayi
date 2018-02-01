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
                <a style="margin-left:50px;" href="/yijiyi/index.php?m=YiJiaYicms&c=Product&a=addup">添加产品分类</a>
        <span>
    </h2>
    <div class="condition">
         <form action="" method="get">
                <ul>
                    <li>搜索：
                        <input type="text" style="width:180px;" name="keyworld" value=""/>
                        <input type="hidden" name="m" value="YiJiaYicms"><input type="hidden" name="c" value="Product"><input type="hidden" name="a" value="index">                        <input type="submit" class="butt" value="确定">
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
                                <td bgcolor="#e1e1e1"><strong>产品图片</strong></td>
                                <td bgcolor="#e1e1e1" style="text-align: left; padding: 15px;"><strong>产品名称</strong></td>
                                <td bgcolor="#e1e1e1" style="text-align: left; padding: 15px;"><strong>产品类型</strong></td>
                                <td bgcolor="#e1e1e1" style="text-align: left; padding: 15px;"><strong>产品描述</strong></td>
                                <td bgcolor="#e1e1e1"><strong>浏览量</strong></td>
                                <td bgcolor="#e1e1e1"><strong>排列排序</strong></td>
                                <td bgcolor="#e1e1e1"><strong>添加时间</strong></td>
                                <td bgcolor="#e1e1e1"><strong>操作</strong></td>
                        </tr>
                        <tr><td><img src="/yijiyi/Public/upload/JCHK/Product/2018/20180117/20180117150135rK.jpg" style="width:80px; height:80px; border:1px solid #ccc; "></td><td title="测试产品一" style="text-align: left; padding: 15px;">测试产品一</td><td style="text-align: left; padding: 15px;">放信息泄露产品</td><td style="text-align: left; padding: 15px;">测试产品一</td><td>0</td><td>0</td><td>2018-01-17</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Product&a=is_switch&if=false&id=c81e728d9d4c2f636f067f89cc14862c">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Product&a=addup&id=c81e728d9d4c2f636f067f89cc14862c">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Product&a=del&id=c81e728d9d4c2f636f067f89cc14862c')">删除</a></td></tr><tr><td><img src="/yijiyi/Public/upload/JCHK/Product/2018/20180117/20180117150157rh.jpg" style="width:80px; height:80px; border:1px solid #ccc; "></td><td title="测试产品二" style="text-align: left; padding: 15px;">测试产品二</td><td style="text-align: left; padding: 15px;">放信息泄露产品</td><td style="text-align: left; padding: 15px;">测试产品二</td><td>0</td><td>0</td><td>2018-01-17</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Product&a=is_switch&if=false&id=eccbc87e4b5ce2fe28308fd9f2a7baf3">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Product&a=addup&id=eccbc87e4b5ce2fe28308fd9f2a7baf3">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Product&a=del&id=eccbc87e4b5ce2fe28308fd9f2a7baf3')">删除</a></td></tr><tr><td><img src="/yijiyi/Public/upload/JCHK/Product/2018/20180117/20180117150218O5.jpg" style="width:80px; height:80px; border:1px solid #ccc; "></td><td title="测试产品三" style="text-align: left; padding: 15px;">测试产品三</td><td style="text-align: left; padding: 15px;">屏蔽材料</td><td style="text-align: left; padding: 15px;">测试产品三</td><td>0</td><td>0</td><td>2018-01-17</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Product&a=is_switch&if=false&id=a87ff679a2f3e71d9181a67b7542122c">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Product&a=addup&id=a87ff679a2f3e71d9181a67b7542122c">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Product&a=del&id=a87ff679a2f3e71d9181a67b7542122c')">删除</a></td></tr><tr><td><img src="/yijiyi/Public/upload/JCHK/Product/2018/20180117/201801171505097Y.jpg" style="width:80px; height:80px; border:1px solid #ccc; "></td><td title="测试产品四" style="text-align: left; padding: 15px;">测试产品四</td><td style="text-align: left; padding: 15px;">放信息泄露产品</td><td style="text-align: left; padding: 15px;">测试产品四</td><td>0</td><td>0</td><td>2018-01-17</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Product&a=is_switch&if=false&id=e4da3b7fbbce2345d7772b0674a318d5">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Product&a=addup&id=e4da3b7fbbce2345d7772b0674a318d5">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Product&a=del&id=e4da3b7fbbce2345d7772b0674a318d5')">删除</a></td></tr><tr><td><img src="/yijiyi/Public/upload/JCHK/Product/2018/20180117/20180117150135rK.jpg" style="width:80px; height:80px; border:1px solid #ccc; "></td><td title="测试产品一" style="text-align: left; padding: 15px;">测试产品一</td><td style="text-align: left; padding: 15px;">放信息泄露产品</td><td style="text-align: left; padding: 15px;">测试产品五</td><td>0</td><td>0</td><td>2018-01-17</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Product&a=is_switch&if=false&id=1679091c5a880faf6fb5e6087eb1b2dc">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Product&a=addup&id=1679091c5a880faf6fb5e6087eb1b2dc">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Product&a=del&id=1679091c5a880faf6fb5e6087eb1b2dc')">删除</a></td></tr><tr><td><img src="/yijiyi/Public/upload/JCHK/Product/2018/20180117/20180117150157rh.jpg" style="width:80px; height:80px; border:1px solid #ccc; "></td><td title="测试产品二" style="text-align: left; padding: 15px;">测试产品二</td><td style="text-align: left; padding: 15px;">放信息泄露产品</td><td style="text-align: left; padding: 15px;">测试产品六</td><td>0</td><td>0</td><td>2018-01-17</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Product&a=is_switch&if=false&id=8f14e45fceea167a5a36dedd4bea2543">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Product&a=addup&id=8f14e45fceea167a5a36dedd4bea2543">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Product&a=del&id=8f14e45fceea167a5a36dedd4bea2543')">删除</a></td></tr><tr><td><img src="/yijiyi/Public/upload/JCHK/Product/2018/20180117/20180117150218O5.jpg" style="width:80px; height:80px; border:1px solid #ccc; "></td><td title="测试产品三" style="text-align: left; padding: 15px;">测试产品三</td><td style="text-align: left; padding: 15px;">放信息泄露产品</td><td style="text-align: left; padding: 15px;">测试产品七</td><td>0</td><td>0</td><td>2018-01-17</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Product&a=is_switch&if=false&id=c9f0f895fb98ab9159f51fd0297e236d">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Product&a=addup&id=c9f0f895fb98ab9159f51fd0297e236d">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Product&a=del&id=c9f0f895fb98ab9159f51fd0297e236d')">删除</a></td></tr><tr><td><img src="/yijiyi/Public/upload/JCHK/Product/2018/20180117/201801171505097Y.jpg" style="width:80px; height:80px; border:1px solid #ccc; "></td><td title="测试产品四" style="text-align: left; padding: 15px;">测试产品四</td><td style="text-align: left; padding: 15px;">放信息泄露产品</td><td style="text-align: left; padding: 15px;">测试产品八</td><td>0</td><td>0</td><td>2018-01-17</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Product&a=is_switch&if=false&id=45c48cce2e2d7fbdea1afc51c7c6ad26">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Product&a=addup&id=45c48cce2e2d7fbdea1afc51c7c6ad26">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Product&a=del&id=45c48cce2e2d7fbdea1afc51c7c6ad26')">删除</a></td></tr>               </table>
            
            <div class="pagelist">
                    <div class="pageList"><span style="color:#333; margin:2px 10px;">共8条记录</span><a href="javascript:;">首页</a><a href="javascript:;">上一页</a><a href="javascript:;" class="on">1</a><a href="javascript:;">下一页</a><a href="javascript:;">尾页</a></div>            </div>
       </div>
<div class="cl"></div>
</div>            <div class="cl"></div>
            <div class="footer">
                <div class="footer-butt-l"><a href='/yijiyi/index.php?m=YiJiaYicms&c=Index&a=index'></a></div>
                    <span class="footer-title">产品管理</span>
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