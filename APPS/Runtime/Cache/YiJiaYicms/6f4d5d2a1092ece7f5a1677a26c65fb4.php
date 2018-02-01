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
        <span class="head-add">欢迎 admin 登录，使用系统！<a style="border: none;" href="/yijiayi/index.php?m=YiJiaYicms&c=Login&a=index">退出登录</a><span>
    </h2>
    <div class="cl"></div>
</div>

<div class="sub-page">
    <div class="tb-cn">
            <form action="" method="post">
                        <div class="add-mod">
                                <ul>
                                            <li>
                                                 <span class="t001">网 站 标 题： </span>
                                                 <input type="text" name="web_title" style="width: 300px;" value="北京积成航空科技有限公司"/>
                                            </li>

                                            <li>
                                                 <span class="t001">网 站 地 址： </span>
                                                 <input name="web_address" type="text" style="width: 250px;" value="http://localhost/2018.01.13/index.php"/>
                                            </li>


                                            <li>
                                                 <span class="t001">网 站 logo： </span>
                                                 <input type="hidden" id="web_logo" name="web_logo" value="/Public/upload/JCHK/logo/2018/20180115/logo.jpg"/>
                                                 <img class="web_logo" src="/yijiayi/Public/upload/JCHK/logo/2018/20180115/logo.jpg" id="logoimg" style="width: 220px;height: 80px; overflow-x: hidden;"/>
                                                 <span id="uploadify-button" style="border: 1px solid #CCC; padding: 3px 5px; cursor: pointer;" class="upload-txt">上传logo</span>
                                            </li>


                                            <li>
                                                 <span class="t001">关键字设置： </span>
                                                 <input name="web_keyworld" type="text" value="积成航空 积成"/>
                                            </li>

                                            <li>
                                                 <span class="t001">网 站 描 述： </span>
                                                 <textarea name="web_description" style="width: 260px; height: 100px;">北京积成航空科技有限公司</textarea>
                                            </li>


                                            <li> 
                                                 <span class="t001">服 务 热 线：</span>
                                                 <input name="web_tel" type="text" value="400-069-0696" placeholder="多个号码用英文&quot;,&quot;号隔开" />
                                            </li>

                                            <li> 
                                                <span class="t001">认 证 链 接：</span>
                                                <input name="web_link" type="text" placeholder="多个号码用英文&quot;,&quot;号隔开" value=""/>
                                            </li>

                                            <li> 
                                                <span class="t001">前 端 图 片：</span>
                                                <input name="web_img_url" type="text" placeholder="前端图片远程地址.." value=""/>
                                            </li>
                                            
                                             <li> 
                                                 <span class="t001">页 脚 信 息：</span>
                                                 <input name="web_footinfo" type="text" value="CopyRight @ 2016-2017 北京积成航空科技有限公司-www.integration.com All Rigths Reserved " placeholder="" />
                                            </li>
                                             <li> 
                                                 <span class="t001">备&nbsp;&nbsp;&nbsp;&nbsp;案&nbsp;&nbsp;&nbsp;号：</span>
                                                 <input name="web_beian" type="text" value="京ICP备150012854号-1" placeholder="" />
                                            </li>

                                            <li class="button">
                                                <input type="hidden" name="action" value="addup">
                                                <input type="hidden" name="id" value="">
                                                <button class="sub-mit">提交</button>
                                            </li>
                                </ul>
                                <div class="cl"></div>
                        </div>
            </form>
        
            <form id='myupload' action='' method='post' enctype='multipart/form-data'>
                    <input name="upfile" id="upfile" size="1" type="file" style="width:57px;cursor:pointer;display:none;" />
                    <input type="hidden" name="upload" id="upload" value="1"/>
            </form>
    </div>

<div class="cl"></div>
</div>

<script type="text/javascript" src="/yijiayi/Public/JiCheng/javascript/jquery.form.js"></script>
<script>
    $('#uploadify-button').on("click", function() {
        $('#upfile').click();
    });
    
    sub_go = 0;
    $("#upfile").change(function() {  //选择文件
        if (sub_go == 0) {
            $("#ts").show();
            $("#myupload").ajaxSubmit({
                            dataType: 'json', //数据格式为json 
                            beforeSend: function() {	//开始上传 
                                        var percentVal = '0%';	//开始进度为0%
                                        $("#ts").html('上传中...<span id="jindu">' + percentVal + '</span>...');
                            },
                            uploadProgress: function(event, position, total, percentComplete) {
                                        var percentVal = percentComplete + '%';	//获得进度
                                        $("#jindu").html(percentVal);	//显示上传进度百分比
                            },
                            success: function(data) {	//成功
                                        //alert(data.error);
                                       if(data.error >0){
                                         $("#ts").html(data.errortxt);  
                                       }else{
                                         $("#ts").html("");
                                         $("#ts").hide();
                                         var str = data.picurl;
                                         str.replace(/\./g,'_thumb.');
                                         var img_str ='/yijiayi'+data.picurl+"?"+(Math.random()*100);
                                         $(".web_logo").attr("src",img_str);
                                         $("#web_logo").val(data.picurl);
                                       }
                            },
                            error: function(xhr) {	//上传失败
                                        //$("#ts").html('错误信息！上传失败，请重试或与管理员联系！');
                                        $("#ts").html('错误信息！上传失败，请重试，或与管理员联系！<br/>' + xhr.responseText);
                            },
                            complete: function() {
                                         sub_go = 0;
                            }
            });
        }
    });

</script>            <div class="cl"></div>
            <div class="footer">
                <div class="footer-butt-l"><a href='/yijiayi/index.php?m=YiJiaYicms&c=Index&a=index'></a></div>
                    <span class="footer-title">基本设置</span>
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