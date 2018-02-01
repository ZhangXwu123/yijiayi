<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <meta name="description" content="<?php echo $wdescription; ?>">
        <meta name="keywords" content="<?php echo $wkeyworld; ?>">
        <title><?php echo $btitle; ?></title>
        <link href="Css/css.css"  rel="stylesheet" type="text/css" />
        <link href="Tool/laydate/need/laydate.css" rel="stylesheet" type="text/css" />
        <script src="Javascript/jquery-1.12.3.min.js"></script>
        <script src="Javascript/javascript.js"></script>
        <script type="text/javascript" src="Tool/laydate/laydate.js"></script>
    </head>
    <body>
            <div class="header">
                <!--头部-->
                <div class="head-top wrap">
                    <div class="logo-img">
                        <a href="<?php echo $rootURL; ?>"><img src="__ROOT__<?php echo $logo; ?>"/></a>
                    </div>
                    <div class="nav">
                            <ul class="ul-nav">
                               <?php echo $nav;?>
                            </ul>
                    </div>
                    <div class="login-reg">
                        <?php if(!$login_status){ ?>
                        <a class="a1" href="javascript:;" onclick="clickReg();">注册</a>
                        <a href="javascript:;" onclick="clickLogin();">登录</a>
                        <?PHP }else{ ?>
                        <a class="a1" href="<?php echo $LoginOut; ?>">已登录，退出</a>
                        <?php } ?>
                    </div>
                    <div class="cl"></div>
                </div>
            </div>