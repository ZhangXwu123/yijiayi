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
                                                    <span class="t001">投 放 范 围：</span>
                                                    <select name="type">
                                                        <option value="0">---请选择投放范围---</option>
                                                        <?php echo $option_str; ?>
                                                    </select>
                                            </li>
                                            
                                            <li>
                                                    <span class="t001">所属栏目：</span>
                                                    <select name="colunmid">
                                                       <option value="">---请选择---</option>
                                                       <?php  $str=""; foreach ($type_row as $key=>$v){ if($colunmid == $v["id"]){ $sss = 'selected="selected"'; }else{ $sss =""; } $str .='<option '.$sss.' value="'.$v["id"].'">'.$v["title"].'</option>'; } echo $str; ?>
                                                   </select>
                                              </li>
                                              <li>
                                                    <span class="t001">所属站点：</span>
                                                     <select name="siteid">
                                                       <option value="">---请选择---</option>
                                                       <?php  $str=""; foreach ($siteResult as $key=>$v){ if($siteid == $v["id"]){ $sss = 'selected="selected"'; }else{ $sss =""; } $str .='<option '.$sss.' value="'.$v["id"].'">站点【'.$v["site"].'】</option>'; } echo $str; ?>
                                                    </select>
                                            </li>

                                            <li>
                                                 <span class="t001">广 告 标 题：</span>
                                                 <input name="title" type="text" style="width: 250px;" value="<?php echo $title; ?>"/>
                                            </li>


                                            <li>
                                                 <span class="t001">广 告 图 片：</span>
                                                 <input type="hidden" id="pic" name="pic" value="<?php echo $pic; ?>"/>
                                                 <img class="pic" src="/yijiyi<?php echo $pic; ?>" id="logoimg" style="width:250px;height: 100px; overflow-x: hidden;"/>
                                                 <span id="uploadify-button" style="border: 1px solid #CCC; padding: 3px 5px; cursor: pointer;" class="upload-txt">上传广告</span>
                                            </li>


                                            <li>
                                                 <span class="t001">跳 转 链 接：</span>
                                                 <input type="text" name="url" id="shipin_link"  value="<?php echo $url; ?>" />
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
            </form>
    </div>

<div class="cl"></div>
</div>



<script type="text/javascript" src="__PUBLIC__/YiJiaYi/javascript/jquery.form.js"></script>
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
                                         var img_str ='/yijiyi'+data.picurl+"?"+(Math.random()*100);
                                         $(".pic").attr("src",img_str);
                                         $("#pic").val(data.picurl);
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