<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose /yijiyi/Public/YiJiaYi/tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>管理服务系统</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <link href="/yijiyi/Public/YiJiaYi/css/css.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/yijiyi/Public/YiJiaYi/javascript/jquery-1.12.3.min.js"></script>
        <script type="text/javascript" src="/yijiyi/Public/YiJiaYi/javascript/js.js"></script>
    </head>
    <body>
        <div class="master">
            <div class="login-page">
                <div class="login-page-c">
                        <h2></h2>
                        <form action="/yijiyi/index.php?m=YiJiaYicms&c=Login&a=prologin" method="post">
                            <div class="condition">
                                <ul>
                                    <li><span>账　号：</span><input type="text"  name="username" placeholder="请输入账号..." /></li>
                                    <li><span>密　码：</span><input type="password"  name="password" placeholder="请输入密码..." /></li>
                                    <li><span>验证码：</span><input type="text"  name="vcode"   style="width:100px;" value="" placeholder="验证码..." /><a  onclick="$('.vcode').attr('src','/yijiyi/index.php?m=YiJiaYicms&c=Login&a=vcode&'+(new Date()).valueOf())"><img title="看不清？请点击" style="height: 37px; cursor: pointer; margin-top: -3px" class="vcode" src="/yijiyi/index.php?m=YiJiaYicms&c=Login&a=vcode"/></a></li>
                                    <li><button>Login</button></li>
                                </ul>
                            </div>
                         </form>
                        
                        <div class="cl"></div>
                </div>
            </div>
        </div>
    </body>
</html>