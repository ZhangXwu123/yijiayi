<?php if (!defined('THINK_PATH')) exit();?><div class="header-top">
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
                                                 <span class="t001">网 站 标 题： </span>
                                                 <input type="text" name="web_title" style="width: 300px;" value="<?php echo $web_title; ?>"/>
                                            </li>

                                            <li>
                                                 <span class="t001">网 站 地 址： </span>
                                                 <input name="web_address" type="text" style="width: 250px;" value="<?php echo $web_address; ?>"/>
                                            </li>


                                            <li>
                                                 <span class="t001">网 站 logo： </span>
                                                 <input type="hidden" id="web_logo" name="web_logo" value="<?php echo $web_logo; ?>"/>
                                                 <img class="web_logo" src="/yijiayi<?php echo $web_logo; ?>" id="logoimg" style="width: 220px;height: 80px; overflow-x: hidden;"/>
                                                 <span id="uploadify-button" style="border: 1px solid #CCC; padding: 3px 5px; cursor: pointer;" class="upload-txt">上传logo</span>
                                            </li>


                                            <li>
                                                 <span class="t001">关键字设置： </span>
                                                 <input name="web_keyworld" type="text" value="<?php echo $web_keyworld; ?>"/>
                                            </li>

                                            <li>
                                                 <span class="t001">网 站 描 述： </span>
                                                 <textarea name="web_description" style="width: 260px; height: 100px;"><?php echo $web_description; ?></textarea>
                                            </li>


                                            <li> 
                                                 <span class="t001">服 务 热 线：</span>
                                                 <input name="web_tel" type="text" value="<?php echo $web_tel; ?>" placeholder="多个号码用英文&quot;,&quot;号隔开" />
                                            </li>

                                            <li> 
                                                <span class="t001">认 证 链 接：</span>
                                                <input name="web_link" type="text" placeholder="多个号码用英文&quot;,&quot;号隔开" value="<?php echo $web_link; ?>"/>
                                            </li>

                                            <li> 
                                                <span class="t001">前 端 图 片：</span>
                                                <input name="web_img_url" type="text" placeholder="前端图片远程地址.." value="<?php echo $web_img_url; ?>"/>
                                            </li>
                                            
                                             <li> 
                                                 <span class="t001">页 脚 信 息：</span>
                                                 <input name="web_footinfo" type="text" value="<?php echo $web_footinfo; ?>" placeholder="" />
                                            </li>
                                             <li> 
                                                 <span class="t001">备&nbsp;&nbsp;&nbsp;&nbsp;案&nbsp;&nbsp;&nbsp;号：</span>
                                                 <input name="web_beian" type="text" value="<?php echo $web_beian; ?>" placeholder="" />
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
            </form>
    </div>

<div class="cl"></div>
</div>

<script type="text/javascript" src="__PUBLIC__/JiCheng/javascript/jquery.form.js"></script>
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

</script>