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
                <a style="margin-left:50px;" href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup">添加栏目内容</a>
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
                        <tr><td>1</td><td style="text-align: left; padding-left: 10px;">首页&nbsp;&nbsp;<span style="color:#ccc">[ 单页 ]</span></td><td style="text-align: left; padding-left: 10px;">index.php?mo=1</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=c4ca4238a0b923820dcc509a6f75849b">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=c4ca4238a0b923820dcc509a6f75849b">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=c4ca4238a0b923820dcc509a6f75849b')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=c4ca4238a0b923820dcc509a6f75849b">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=c4ca4238a0b923820dcc509a6f75849b">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=c4ca4238a0b923820dcc509a6f75849b">底部启用</a></td></tr><tr><td>2</td><td style="text-align: left; padding-left: 10px;">关于我们&nbsp;&nbsp;<span style="color:#ccc">[ 单页 ]</span></td><td style="text-align: left; padding-left: 10px;">index.php?m=Home&c=CluCentre&a=index&cluinid=2</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=c81e728d9d4c2f636f067f89cc14862c">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=c81e728d9d4c2f636f067f89cc14862c">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=c81e728d9d4c2f636f067f89cc14862c')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=c81e728d9d4c2f636f067f89cc14862c">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=c81e728d9d4c2f636f067f89cc14862c">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=c81e728d9d4c2f636f067f89cc14862c">底部启用</a></td></tr><tr><td>7</td><td style="text-align: left; padding-left: 10px;"><span class="zxian2"></span>公司简介&nbsp;&nbsp;<span style="color:#ccc">[ 单页 ]</span></td><td style="text-align: left; padding-left: 10px;">/</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=8f14e45fceea167a5a36dedd4bea2543">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=8f14e45fceea167a5a36dedd4bea2543">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=8f14e45fceea167a5a36dedd4bea2543')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=8f14e45fceea167a5a36dedd4bea2543">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=8f14e45fceea167a5a36dedd4bea2543">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=8f14e45fceea167a5a36dedd4bea2543">底部启用</a></td></tr><tr><td>8</td><td style="text-align: left; padding-left: 10px;"><span class="zxian2"></span>企业文化&nbsp;&nbsp;<span style="color:#ccc">[ 单页 ]</span></td><td style="text-align: left; padding-left: 10px;">/</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=c9f0f895fb98ab9159f51fd0297e236d">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=c9f0f895fb98ab9159f51fd0297e236d">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=c9f0f895fb98ab9159f51fd0297e236d')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=c9f0f895fb98ab9159f51fd0297e236d">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=c9f0f895fb98ab9159f51fd0297e236d">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=c9f0f895fb98ab9159f51fd0297e236d">底部启用</a></td></tr><tr><td>9</td><td style="text-align: left; padding-left: 10px;"><span class="zxian2"></span>发展前景&nbsp;&nbsp;<span style="color:#ccc">[ 单页 ]</span></td><td style="text-align: left; padding-left: 10px;">/</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=45c48cce2e2d7fbdea1afc51c7c6ad26">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=45c48cce2e2d7fbdea1afc51c7c6ad26">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=45c48cce2e2d7fbdea1afc51c7c6ad26')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=45c48cce2e2d7fbdea1afc51c7c6ad26">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=45c48cce2e2d7fbdea1afc51c7c6ad26">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=45c48cce2e2d7fbdea1afc51c7c6ad26">底部启用</a></td></tr><tr><td>10</td><td style="text-align: left; padding-left: 10px;"><span class="zxian2"></span>社会责任&nbsp;&nbsp;<span style="color:#ccc">[ 单页 ]</span></td><td style="text-align: left; padding-left: 10px;">/</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=d3d9446802a44259755d38e6d163e820">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=d3d9446802a44259755d38e6d163e820">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=d3d9446802a44259755d38e6d163e820')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=d3d9446802a44259755d38e6d163e820">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=d3d9446802a44259755d38e6d163e820">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=d3d9446802a44259755d38e6d163e820">底部启用</a></td></tr><tr><td>3</td><td style="text-align: left; padding-left: 10px;">专栏文章&nbsp;&nbsp;<span style="color:#ccc">[ 单页 ]</span></td><td style="text-align: left; padding-left: 10px;">index.php?m=Home&c=CluCentre&a=index&cluinid=3</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=eccbc87e4b5ce2fe28308fd9f2a7baf3">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=eccbc87e4b5ce2fe28308fd9f2a7baf3">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=eccbc87e4b5ce2fe28308fd9f2a7baf3')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=eccbc87e4b5ce2fe28308fd9f2a7baf3">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=eccbc87e4b5ce2fe28308fd9f2a7baf3">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=eccbc87e4b5ce2fe28308fd9f2a7baf3">底部启用</a></td></tr><tr><td>4</td><td style="text-align: left; padding-left: 10px;">新闻中心&nbsp;&nbsp;<span style="color:#ccc">[ 单页 ]</span></td><td style="text-align: left; padding-left: 10px;">index.php?m=Home&c=CluCentre&a=index&cluinid=4</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=a87ff679a2f3e71d9181a67b7542122c">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=a87ff679a2f3e71d9181a67b7542122c">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=a87ff679a2f3e71d9181a67b7542122c')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=a87ff679a2f3e71d9181a67b7542122c">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=a87ff679a2f3e71d9181a67b7542122c">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=a87ff679a2f3e71d9181a67b7542122c">底部启用</a></td></tr><tr><td>11</td><td style="text-align: left; padding-left: 10px;"><span class="zxian2"></span>公司动态&nbsp;&nbsp;<span style="color:#ccc">[ 列表 ]</span></td><td style="text-align: left; padding-left: 10px;">/</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=6512bd43d9caa6e02c990b0a82652dca">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=6512bd43d9caa6e02c990b0a82652dca">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=6512bd43d9caa6e02c990b0a82652dca')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=6512bd43d9caa6e02c990b0a82652dca">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=6512bd43d9caa6e02c990b0a82652dca">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=6512bd43d9caa6e02c990b0a82652dca">底部启用</a></td></tr><tr><td>12</td><td style="text-align: left; padding-left: 10px;"><span class="zxian2"></span>行业动态&nbsp;&nbsp;<span style="color:#ccc">[ 列表 ]</span></td><td style="text-align: left; padding-left: 10px;">/</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=c20ad4d76fe97759aa27a0c99bff6710">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=c20ad4d76fe97759aa27a0c99bff6710">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=c20ad4d76fe97759aa27a0c99bff6710')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=c20ad4d76fe97759aa27a0c99bff6710">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=c20ad4d76fe97759aa27a0c99bff6710">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=c20ad4d76fe97759aa27a0c99bff6710">底部启用</a></td></tr><tr><td>5</td><td style="text-align: left; padding-left: 10px;">产品展示&nbsp;&nbsp;<span style="color:#ccc">[ 单页 ]</span></td><td style="text-align: left; padding-left: 10px;">index.php?m=Home&c=CluCentre&a=product&cluinid=5</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=e4da3b7fbbce2345d7772b0674a318d5">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=e4da3b7fbbce2345d7772b0674a318d5">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=e4da3b7fbbce2345d7772b0674a318d5')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=e4da3b7fbbce2345d7772b0674a318d5">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=e4da3b7fbbce2345d7772b0674a318d5">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=e4da3b7fbbce2345d7772b0674a318d5">底部启用</a></td></tr><tr><td>13</td><td style="text-align: left; padding-left: 10px;"><span class="zxian2"></span>放信息泄露产品&nbsp;&nbsp;<span style="color:#ccc">[ 列表 ]</span></td><td style="text-align: left; padding-left: 10px;">index.php?m=Home&c=CluCentre&a=product&cluinid=5&protypeid=1</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=c51ce410c124a10e0db5e4b97fc2af39">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=c51ce410c124a10e0db5e4b97fc2af39">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=c51ce410c124a10e0db5e4b97fc2af39')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=c51ce410c124a10e0db5e4b97fc2af39">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=c51ce410c124a10e0db5e4b97fc2af39">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=c51ce410c124a10e0db5e4b97fc2af39">底部启用</a></td></tr><tr><td>14</td><td style="text-align: left; padding-left: 10px;"><span class="zxian2"></span>加固产品&nbsp;&nbsp;<span style="color:#ccc">[ 列表 ]</span></td><td style="text-align: left; padding-left: 10px;">	index.php?m=Home&c=CluCentre&a=product&cluinid=5&protypeid=2</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=aab3238922bcc25a6f606eb525ffdc56">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=aab3238922bcc25a6f606eb525ffdc56">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=aab3238922bcc25a6f606eb525ffdc56')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=aab3238922bcc25a6f606eb525ffdc56">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=aab3238922bcc25a6f606eb525ffdc56">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=aab3238922bcc25a6f606eb525ffdc56">底部启用</a></td></tr><tr><td>15</td><td style="text-align: left; padding-left: 10px;"><span class="zxian2"></span>主板产品&nbsp;&nbsp;<span style="color:#ccc">[ 列表 ]</span></td><td style="text-align: left; padding-left: 10px;">	index.php?m=Home&c=CluCentre&a=product&cluinid=5&protypeid=3</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=9bf31c7ff062936a96d3c8bd1f8f2ff3">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=9bf31c7ff062936a96d3c8bd1f8f2ff3">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=9bf31c7ff062936a96d3c8bd1f8f2ff3')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=9bf31c7ff062936a96d3c8bd1f8f2ff3">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=9bf31c7ff062936a96d3c8bd1f8f2ff3">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=9bf31c7ff062936a96d3c8bd1f8f2ff3">底部启用</a></td></tr><tr><td>16</td><td style="text-align: left; padding-left: 10px;"><span class="zxian2"></span>屏蔽材料&nbsp;&nbsp;<span style="color:#ccc">[ 列表 ]</span></td><td style="text-align: left; padding-left: 10px;">	index.php?m=Home&c=CluCentre&a=product&cluinid=5&protypeid=4</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=c74d97b01eae257e44aa9d5bade97baf">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=c74d97b01eae257e44aa9d5bade97baf">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=c74d97b01eae257e44aa9d5bade97baf')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=c74d97b01eae257e44aa9d5bade97baf">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=c74d97b01eae257e44aa9d5bade97baf">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=c74d97b01eae257e44aa9d5bade97baf">底部启用</a></td></tr><tr><td>17</td><td style="text-align: left; padding-left: 10px;"><span class="zxian2"></span>定制机箱&nbsp;&nbsp;<span style="color:#ccc">[ 列表 ]</span></td><td style="text-align: left; padding-left: 10px;">	index.php?m=Home&c=CluCentre&a=product&cluinid=5&protypeid=5</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=70efdf2ec9b086079795c442636b55fb">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=70efdf2ec9b086079795c442636b55fb">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=70efdf2ec9b086079795c442636b55fb')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=70efdf2ec9b086079795c442636b55fb">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=70efdf2ec9b086079795c442636b55fb">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=70efdf2ec9b086079795c442636b55fb">底部启用</a></td></tr><tr><td>6</td><td style="text-align: left; padding-left: 10px;">联系我们&nbsp;&nbsp;<span style="color:#ccc">[ 单页 ]</span></td><td style="text-align: left; padding-left: 10px;">index.php?m=Home&c=CluCentre&a=index&cluinid=6</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=1679091c5a880faf6fb5e6087eb1b2dc">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=1679091c5a880faf6fb5e6087eb1b2dc">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=1679091c5a880faf6fb5e6087eb1b2dc')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=1679091c5a880faf6fb5e6087eb1b2dc">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=1679091c5a880faf6fb5e6087eb1b2dc">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=1679091c5a880faf6fb5e6087eb1b2dc">底部启用</a></td></tr><tr><td>18</td><td style="text-align: left; padding-left: 10px;"><span class="zxian2"></span>联系方式&nbsp;&nbsp;<span style="color:#ccc">[ 单页 ]</span></td><td style="text-align: left; padding-left: 10px;">/</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=6f4922f45568161a8cdf4ad2299f6d23">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=6f4922f45568161a8cdf4ad2299f6d23">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=6f4922f45568161a8cdf4ad2299f6d23')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=6f4922f45568161a8cdf4ad2299f6d23">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=6f4922f45568161a8cdf4ad2299f6d23">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=6f4922f45568161a8cdf4ad2299f6d23">底部启用</a></td></tr><tr><td>19</td><td style="text-align: left; padding-left: 10px;"><span class="zxian2"></span>招聘信息&nbsp;&nbsp;<span style="color:#ccc">[ 列表 ]</span></td><td style="text-align: left; padding-left: 10px;">index.php?m=Home&c=CluCentre&a=zhaopin&cluinid=6</td><td>站点【1】</td><td>0</td><td class="action-butt"><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=is_switch&if=false&id=1f0e3dad99908345f7439f8ffabdffc4">停用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=column_addup&id=1f0e3dad99908345f7439f8ffabdffc4">修改</a><a onclick="confirms('确定要删除吗？','/yijiyi/index.php?m=YiJiaYicms&c=Column&a=del&id=1f0e3dad99908345f7439f8ffabdffc4')">删除</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=1&id=1f0e3dad99908345f7439f8ffabdffc4">顶部禁用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=2&id=1f0e3dad99908345f7439f8ffabdffc4">左侧启用</a><a href="/yijiyi/index.php?m=YiJiaYicms&c=Column&a=show_position&position=3&id=1f0e3dad99908345f7439f8ffabdffc4">底部启用</a></td></tr>               </table>
            
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