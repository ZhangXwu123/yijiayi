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
                <a style="margin-left:50px;" href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=addup">添加栏目内容</a>
        <span>
    </h2>
    <div class="condition">
         <form action="" method="get">
                <ul>
                    <li>搜索：
                        <input type="text" style="width:180px;" name="keyworld" value=""/>
                        &nbsp;&nbsp;&nbsp;栏目类型：
                        <select name="coloumid">
                            <option value="">--请选择--</option>
                            <option  value="11">公司动态</option><option  value="12">行业动态</option><option  value="13">放信息泄露产品</option><option  value="14">加固产品</option><option  value="15">主板产品</option><option  value="16">屏蔽材料</option><option  value="17">定制机箱</option><option  value="19">招聘信息</option>                        </select>
                        <input type="hidden" name="m" value="YiJiaYicms"><input type="hidden" name="c" value="Column"><input type="hidden" name="a" value="index">                        <input type="submit" class="butt" value="确定">
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
                                <td bgcolor="#e1e1e1"><strong>缩略图片</strong></td>
                                <td bgcolor="#e1e1e1" style="text-align: left; padding-left:10px;"><strong>标题</strong></td>
                                <td bgcolor="#e1e1e1"><strong>栏目</strong></td>
                                <td bgcolor="#e1e1e1"><strong>作者</strong></td>
                                <td bgcolor="#e1e1e1" style="text-align: left; padding-left:10px;"><strong>摘要</strong></td>
                                <td bgcolor="#e1e1e1"><strong>排列排序</strong></td>
                                <td bgcolor="#e1e1e1"><strong>是否发布</strong></td>
                                <td bgcolor="#e1e1e1"><strong>更新时间</strong></td>
                                <td bgcolor="#e1e1e1"><strong>操作</strong></td>
                        </tr>
                        <tr><td>5</td><td><img src="/yijiyi" style="width:60px; height:60px; border:1px solid #ccc; padding:1px; margin:1px;" /></td><td title="测试一" style="text-align: left; padding-left:10px;">测试一  </td><td>行业动态</td><td>积成航空科技</td><td style="text-align: left; padding-left:10px;">积成航空科技</td><td>0</td><td><span class="green">是</span></td><td>2018-01-30</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch2&if=false&id=e4da3b7fbbce2345d7772b0674a318d5">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=addup&id=e4da3b7fbbce2345d7772b0674a318d5">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del2&id=e4da3b7fbbce2345d7772b0674a318d5')">删除</a></td></tr><tr><td>6</td><td><img src="/yijiyi" style="width:60px; height:60px; border:1px solid #ccc; padding:1px; margin:1px;" /></td><td title="测试二" style="text-align: left; padding-left:10px;">测试二  </td><td>行业动态</td><td>积成航空科技</td><td style="text-align: left; padding-left:10px;">积成航空科技</td><td>0</td><td><span class="green">是</span></td><td>2018-01-17</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch2&if=false&id=1679091c5a880faf6fb5e6087eb1b2dc">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=addup&id=1679091c5a880faf6fb5e6087eb1b2dc">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del2&id=1679091c5a880faf6fb5e6087eb1b2dc')">删除</a></td></tr><tr><td>7</td><td><img src="/yijiyi" style="width:60px; height:60px; border:1px solid #ccc; padding:1px; margin:1px;" /></td><td title="测试三" style="text-align: left; padding-left:10px;">测试三  </td><td>行业动态</td><td>积成航空科技</td><td style="text-align: left; padding-left:10px;">积成航空科技</td><td>0</td><td><span class="green">是</span></td><td>2018-01-17</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch2&if=false&id=8f14e45fceea167a5a36dedd4bea2543">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=addup&id=8f14e45fceea167a5a36dedd4bea2543">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del2&id=8f14e45fceea167a5a36dedd4bea2543')">删除</a></td></tr><tr><td>8</td><td><img src="/yijiyi" style="width:60px; height:60px; border:1px solid #ccc; padding:1px; margin:1px;" /></td><td title="测试四" style="text-align: left; padding-left:10px;">测试四  </td><td>行业动态</td><td>积成航空科技</td><td style="text-align: left; padding-left:10px;">积成航空科技</td><td>0</td><td><span class="green">是</span></td><td>2018-01-17</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch2&if=false&id=c9f0f895fb98ab9159f51fd0297e236d">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=addup&id=c9f0f895fb98ab9159f51fd0297e236d">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del2&id=c9f0f895fb98ab9159f51fd0297e236d')">删除</a></td></tr><tr><td>4</td><td><img src="/yijiyi" style="width:60px; height:60px; border:1px solid #ccc; padding:1px; margin:1px;" /></td><td title="测试四" style="text-align: left; padding-left:10px;">测试四  </td><td>公司动态</td><td>积成航空科技</td><td style="text-align: left; padding-left:10px;">积成航空科技</td><td>0</td><td><span class="green">是</span></td><td>2018-01-17</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch2&if=false&id=a87ff679a2f3e71d9181a67b7542122c">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=addup&id=a87ff679a2f3e71d9181a67b7542122c">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del2&id=a87ff679a2f3e71d9181a67b7542122c')">删除</a></td></tr><tr><td>3</td><td><img src="/yijiyi" style="width:60px; height:60px; border:1px solid #ccc; padding:1px; margin:1px;" /></td><td title="测试三" style="text-align: left; padding-left:10px;">测试三  </td><td>公司动态</td><td>积成航空科技</td><td style="text-align: left; padding-left:10px;">积成航空科技</td><td>0</td><td><span class="green">是</span></td><td>2018-01-17</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch2&if=false&id=eccbc87e4b5ce2fe28308fd9f2a7baf3">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=addup&id=eccbc87e4b5ce2fe28308fd9f2a7baf3">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del2&id=eccbc87e4b5ce2fe28308fd9f2a7baf3')">删除</a></td></tr><tr><td>2</td><td><img src="/yijiyi" style="width:60px; height:60px; border:1px solid #ccc; padding:1px; margin:1px;" /></td><td title="测试二" style="text-align: left; padding-left:10px;">测试二  </td><td>公司动态</td><td>积成航空科技</td><td style="text-align: left; padding-left:10px;">积成航空科技</td><td>0</td><td><span class="green">是</span></td><td>2018-01-17</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch2&if=false&id=c81e728d9d4c2f636f067f89cc14862c">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=addup&id=c81e728d9d4c2f636f067f89cc14862c">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del2&id=c81e728d9d4c2f636f067f89cc14862c')">删除</a></td></tr><tr><td>1</td><td><img src="/yijiyi" style="width:60px; height:60px; border:1px solid #ccc; padding:1px; margin:1px;" /></td><td title="测试一" style="text-align: left; padding-left:10px;">测试一  </td><td>公司动态</td><td>富盎得集团</td><td style="text-align: left; padding-left:10px;">自己发破案四间房破is阿鸡排饭</td><td>0</td><td><span class="green">是</span></td><td>2018-01-16</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch2&if=false&id=c4ca4238a0b923820dcc509a6f75849b">禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=addup&id=c4ca4238a0b923820dcc509a6f75849b">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del2&id=c4ca4238a0b923820dcc509a6f75849b')">删除</a></td></tr>               </table>
            
            <div class="pagelist">
                    <div class="pageList"><span style="color:#333; margin:2px 10px;">共8条记录</span><a href="javascript:;">首页</a><a href="javascript:;">上一页</a><a href="javascript:;" class="on">1</a><a href="javascript:;">下一页</a><a href="javascript:;">尾页</a></div>            </div>
       </div>
<div class="cl"></div>
</div>            <div class="cl"></div>
            <div class="footer">
                <div class="footer-butt-l"><a href='/yijiyi/index.php?m=YiJiaYicms&c=Index&a=index'></a></div>
                    <span class="footer-title">栏目管理列表</span>
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