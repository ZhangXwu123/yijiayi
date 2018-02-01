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
        <span class="head-add">欢迎 admin 登录，使用系统！<a style="border: none;" href="/yijiyi/index.php?m=YiJiaYicms&c=Login&a=index">退出登录</a><span>
    </h2>
    <div class="cl"></div>
</div>


<div class="sub-page">
    <div class="tb-cn">
            <form action="" method="post">
                        <div class="add-mod">
                                <div id="ts" class="hide" style=" width: 370px; margin:10px 0px; padding:5px 0px; text-align: center; border:1px #ccc solid; color:#ff8013;"></div>
                                <ul>
                                            <li>
                                                 <span class="t001">所属栏目：</span>
                                                 <select name="pid">
                                                        <option value="0">--顶级栏目--</option>
                                                                                                         </select>
                                                 <span class="sm001"><b class="red">*</b>   带 * 的为必填项。</span>
                                            </li>
                                            
                                            <li>
                                                <span class="t001">所属站点：</span>
                                                <select name="siteid">
                                                   <option value="">---请选择---</option>
                                                   <option  value="1">站点【1】</option><option  value="2">站点【2】</option>                                               </select>
                                            </li>
                                            
                                            <li>
                                                 <span class="t001">栏目名称：</span>
                                                 <input name="title" type="text" style="width: 300px;" value="" />
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                    <span class="t001">属　　性：</span>
                                                                                                        <label><input style="width: auto;" type="radio" name="attr"  class="attr" value="1" /> 【单页】</label>
                                                    <label><input style="width: auto;" type="radio" name="attr"   class="attr" value="2" /> 【列表】</label>
                                                    <label><input style="width: auto;" type="radio" name="attr"   class="attr" value="3" /> 【图文】</label>
                                            </li>
                                            <li>
                                                 <span class="t001">跳转链接：</span>
                                                 <input name="url" type="text" style="width: 150px;" value=""/>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                 <span class="t001">主体内容：</span>
                                                 <textarea name="content" id="content" style="width:100px; height:300px;"></textarea>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                 <span class="t001">缩略图片：</span>
                                                 <input type="hidden" id="pic" name="pic" value=""/>
                                                 <img class="pic" src="/yijiyi" id="logoimg" style="width:150px; overflow-x: hidden;"/>
                                                 <span id="uploadify-button" style="border: 1px solid #CCC; padding: 3px 5px; cursor: pointer;" class="upload-txt" type="1">上传缩略图</span>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                 <span class="t001">组　　图：</span>
                                                    <span>[  <a href="javascript:;" id="pic-arr-uploadify-button" type="2">上传组图</a> ] [ <a href="javascript:;" class="pic-arr-show">展开</a> ]</span>
                                                        <div class="pic_arr hide">
                                                                                                                    <div class="next cl"></div>
                                                        </div>
                                            </li>
                                            
                                            <li>
                                                 <span class="t001">SEO 标 题：</span>
                                                 <textarea name="seotitle" style="width:300px; height:100px;"></textarea>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                 <span class="t001">seo关键词：</span>
                                                 <textarea name="keywords" style="width:300px; height:100px;"></textarea>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                 <span class="t001">SEO 描 述：</span>
                                                 <textarea name="description" style="width:300px; height:100px;"></textarea>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                 <span class="t001">排 列 排 序：</span>
                                                 <input name="orderid" type="text" style="width: 100px;" value=""/>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                         
                                            <li class="button">
                                                <input type="hidden" name="action" value="add">
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
                    <input type="hidden" name="type" id="type" value=""/>
            </form>
    </div>

<div class="cl"></div>
</div>


<script type="text/javascript" src="/yijiyi/Public/YiJiaYi/javascript/jquery.form.js"></script>
<link rel="stylesheet" href="/yijiyi/Public/tool/ueditor/themes/default/default.css" />
<link rel="stylesheet" href="/yijiyi/Public/tool/ueditor/plugins/code/prettify.css" />
<script charset="utf-8" src="/yijiyi/Public/tool/ueditor/kindeditor-all.js"></script>
<script charset="utf-8" src="/yijiyi/Public/tool/ueditor/lang/zh-CN.js"></script>
<script charset="utf-8" src="/yijiyi/Public/tool/ueditor/plugins/code/prettify.js"></script>
<script>
        KindEditor.ready(function(K) {
                var editor1 = K.create('textarea[name="content"]', {
                        cssPath : '/yijiyi/Public/tool/ueditor/plugins/code/prettify.css',
                        uploadJson : '/yijiyi/Public/tool/ueditor/php/upload_json.php',
                        fileManagerJson : '/yijiyi/Public/tool/ueditor/php/file_manager_json.php',
                        allowFileManager : true,
                        afterCreate : function() {
                                var self = this;
                                K.ctrl(document, 13, function() {
                                        self.sync();
                                        K('form[name=example]')[0].submit();
                                });
                                K.ctrl(self.edit.doc, 13, function() {
                                        self.sync();
                                        K('form[name=example]')[0].submit();
                                });
                        }
                });
                prettyPrint();
        });
</script>




<script>
  
    $(".pic-arr-show").on("click",function(){
            var htm = $(this).html();
            $(".pic_arr").removeClass("hide");
            if(htm == "展开"){
                    $(this).html("收起"); 
            }else{
                    $(this).html("展开"); 
                    $(".pic_arr").addClass("hide");
            }
    });
    
    $("#type").val("");
    $('#pic-arr-uploadify-button, #uploadify-button').on("click", function() {
                $("#type").val("");
                var type = $(this).attr("type");
                $("#type").val(type);
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
                    if(data.type == 1){
                        var str = data.picurl;
                        str.replace(/\./g,'_thumb.');
                        var img_str ='/yijiyi'+data.picurl+"?"+(Math.random()*100);
                        $(".pic").attr("src",img_str);
                        $("#pic").val(data.picurl);
                    }else{
                        var len = $(".pic_arr").find(".pic-arr-list").length;
                        var htm  = '<div class="pic-arr-list"><input type="hidden" name="pic_arr[]" id="pic_arr"  value="'+data.picurl+'" />';
                            htm += '<img src="/yijiyi/'+data.picurl+'"  style="width:100px;height: 100px;"/></div>';
                        if(len == 0){
                            $(".pic_arr").find(".next").before(htm);
                        }else{
                            $(".pic_arr .pic-arr-list:first-child").before(htm); 
                        }
                    }
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
                <div class="footer-butt-l"><a href='/yijiyi/index.php?m=YiJiaYicms&c=Index&a=index'></a></div>
                    <span class="footer-title">栏目类型 - 添加</span>
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