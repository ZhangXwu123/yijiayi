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
                                <div id="ts" class="hide" style=" width: 370px; margin:10px 0px; padding:5px 0px; text-align: center; border:1px #ccc solid; color:#ff8013;"></div>
                                <ul>
                                            <li>
                                                 <span class="t001">栏目类型：</span>
                                                 <select name="column_id">
                                                        <option value="0">--顶级栏目--</option>
                                                        <?php echo $columnStr; ?>
                                                 </select>
                                                 <span class="sm001"><b class="red">*</b>   带 * 的为必填项。</span>
                                            </li>
                                            <li>
                                                 <span class="t001">标　　题：</span>
                                                 <input name="title" type="text" style="width: 300px;" value="<?php echo $title; ?>" />
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                    <span class="t001">属　　性：</span>
                                                    <?php 
                                                            $flag_arr = explode(",",$flag);
                                                            $check1 = !empty($flag_arr[0])?" checked='checked' ":"";
                                                            $check2 = !empty($flag_arr[1])?" checked='checked' ":"";
                                                            $check3 = !empty($flag_arr[2])?" checked='checked' ":"";
                                                    ?>
                                                    <label><input style="width: auto;" type="checkbox" name="flag[]" <?php echo $check1;  ?> value="1"> 置顶[1]</label>&nbsp;&nbsp;
                                                    <label><input style="width: auto;" type="checkbox" name="flag[]" <?php echo $check2;  ?>  value="2"> 特荐[1]</label>&nbsp;&nbsp;
                                                    <label><input style="width: auto;" type="checkbox" name="flag[]" <?php echo $check3;  ?>  value="3"> 推荐[1]</label>
                                            </li>
                                            
                                            <li>
                                                 <span class="t001">文章来源：</span>
                                                 <input name="source" type="text" style="width: 150px;" value="<?php echo $source; ?>"/>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                 <span class="t001">跳转链接：</span>
                                                 <input name="url" type="text" style="width: 150px;" value="<?php echo $url; ?>"/>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                 <span class="t001">作者编辑：</span>
                                                 <input name="author" type="text" style="width: 150px;" value="<?php echo $author; ?>"/>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                 <span class="t001">摘　　要：</span>
                                                 <textarea name="description" style="width:300px; height:100px;"><?php echo $description;  ?></textarea>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                 <span class="t001">主体内容：</span>
                                                 <textarea name="content" id="content" style="width:100px; height:300px;"><?php echo $content;  ?></textarea>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                 <span class="t001">缩略图片：</span>
                                                 <input type="hidden" id="pic" name="pic" value="<?php echo $pic; ?>"/>
                                                 <img class="pic" src="__ROOT__<?php echo $pic; ?>" id="logoimg" style="width:150px; overflow-x: hidden;"/>
                                                 <span id="uploadify-button" style="border: 1px solid #CCC; padding: 3px 5px; cursor: pointer;" class="upload-txt" type="1">上传缩略图</span>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                 <span class="t001">组　　图：</span>
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
                                                    <span class="t001">是否发布：</span>
                                                    <label><input style="width: auto;" type="radio" name="is_status" <?php echo $is_status ==1?'checked="checked"':""; ?>  value="1" /> 是</label>&nbsp;&nbsp;
                                                     <label><input style="width: auto;" type="radio" name="is_status" <?php echo $is_status ==0?'checked="checked"':""; ?>  value="0" /> 否</label>
                                                     <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            
                                           <li>
                                                    <span class="t001">会员可见：</span>
                                                   <label><input style="width: auto;" type="radio" name="ismb" <?php echo $ismb ==1?'checked="checked"':""; ?>  value="1" /> 是</label>&nbsp;&nbsp;
                                                   <label><input style="width: auto;" type="radio" name="ismb" <?php echo $ismb ==0?'checked="checked"':""; ?>  value="0" /> 否</label>
                                                    <span class="sm001"><b class="red">*</b></span>
                                            </li>

                                            <li>
                                                 <span class="t001">排列排序：</span>
                                                 <input name="orderid" type="text" style="width: 100px;" value="<?php echo $orderid; ?>"/>
                                                 <span class="sm001"><b class="red">*</b></span>
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
