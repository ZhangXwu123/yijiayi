<div class="header-top">
    <h2>后台管理
        <span class="head-add">欢迎 <?php echo $admin_username; ?> 登录，使用系统！<a style="border: none;" href="<?php echo $login_out_url ?>">退出登录</a><span>
    </h2>
    <div class="cl"></div>
</div>

<div class="sub-page">
    <div class="tb-cn">
            <form action="" method="post">
                        <div class="add-mod">
                                <ul>
                                           <li>
                                                 <span class="t001">产品类别：</span>
                                                 <select name="type">
                                                        <option value="0">--请选择产品类别--</option>
                                                        <?php echo $type_Str; ?>
                                                 </select>
                                                 <span class="sm001"><b class="red">*</b>   带 * 的为必填项。</span>
                                            </li>
                                            <li>
                                                 <span class="t001">产品名称：</span>
                                                 <input name="title" type="text" style="width: 250px;" value="<?php echo $title; ?>"/>
                                            </li>
                                            <li>
                                                 <span class="t001">产品简介：</span>
                                                 <textarea name="description" style="width:300px; height:100px;"><?php echo $description;  ?></textarea>
                                            </li>
                                            
                                            <li>
                                                 <span class="t001">产品图片：</span>
                                                 <input type="hidden" id="pic" name="pic" value="<?php echo $pic; ?>"/>
                                                 <img class="pic" src="__ROOT__<?php echo $pic; ?>" id="logoimg" style="width:150px; overflow-x: hidden;"/>
                                                 <span id="uploadify-button" style="border: 1px solid #CCC; padding: 3px 5px; cursor: pointer;" class="upload-txt" type="1">上传缩略图</span>
                                                
                                            </li>
                                            <li>
                                                 <span class="t001">产品详情：</span>
                                                 <textarea name="content" id="content" style="width:100px; height:300px;"><?php echo $content;  ?></textarea>
                                                 
                                            </li>
                                            <li>
                                                 <span class="t001">产品组图：</span>
                                                    <span>[  <a href="javascript:;" id="pic-arr-uploadify-button" type="2">上传组图</a> ] [ <a href="javascript:;" class="pic-arr-show">展开</a> ]</span>
                                                        <div class="pic_arr hide">
                                                            <?php
                                                                  foreach(explode("|",$pic_arr) as $key=>$v){
                                                                        if($v)
                                                                            echo '<div class="pic-arr-list"><input type="hidden" name="pic_arr[]" id="pic_arr"  value="'.$v.'" /><img src="__ROOT__'.$v.'"  style="width:100px;height: 100px;"/></div>'; 
                                                                  }
                                                            ?>
                                                        <div class="next cl"></div>
                                                        </div>
                                            </li>
                                            <li>
                                                 <span class="t001">排 列 排 序：</span>
                                                 <input type="text" name="orderid" id="orderid" style="width: 80px;" value="<?php echo $orderid; ?>" />
                                            </li>

                                            <li class="button">
                                                <input type="hidden" name="action" value="<?php echo $action; ?>">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
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


<script type="text/javascript" src="Javascript/jquery.form.js"></script>
<link rel="stylesheet" href="__PUBLIC__/tool/ueditor/themes/default/default.css" />
<link rel="stylesheet" href="__PUBLIC__/tool/ueditor/plugins/code/prettify.css" />
<script charset="utf-8" src="__PUBLIC__/tool/ueditor/kindeditor-all.js"></script>
<script charset="utf-8" src="__PUBLIC__/tool/ueditor/lang/zh-CN.js"></script>
<script charset="utf-8" src="__PUBLIC__/tool/ueditor/plugins/code/prettify.js"></script>
<script>
        KindEditor.ready(function(K) {
                var editor1 = K.create('textarea[name="content"]', {
                        cssPath : '__PUBLIC__/tool/ueditor/plugins/code/prettify.css',
                        uploadJson : '__PUBLIC__/tool/ueditor/php/upload_json.php',
                        fileManagerJson : '__PUBLIC__/tool/ueditor/php/file_manager_json.php',
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
                        var img_str ='__ROOT__'+data.picurl+"?"+(Math.random()*100);
                        $(".pic").attr("src",img_str);
                        $("#pic").val(data.picurl);
                    }else{
                        var len = $(".pic_arr").find(".pic-arr-list").length;
                        var htm  = '<div class="pic-arr-list"><input type="hidden" name="pic_arr[]" id="pic_arr"  value="'+data.picurl+'" />';
                            htm += '<img src="__ROOT__/'+data.picurl+'"  style="width:100px;height: 100px;"/></div>';
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
    
    

</script>
