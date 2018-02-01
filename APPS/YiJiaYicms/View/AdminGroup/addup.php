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
                                                 <span class="t001">用　户　名：</span>
                                                 <input name="username" type="text" style="width: 250px;" value="<?php echo $username; ?>"/>
                                                 <span class="sm001"><b class="red">*</b>   带 * 的为必填项。</span>
                                            </li>
                                            <li>
                                                 <span class="t001">密　　　码：</span>
                                                 <input name="password" type="password" style="width: 150px;"/>
                                            </li>
                                            <li>
                                                 <span class="t001">确 认 密 码 ：</span>
                                                 <input name="reppassword" type="password" style="width: 150px;"/>
                                            </li>
                                            <li>
                                                 <span class="t001">头　　　像：</span>
                                                 <input type="hidden" id="pic" name="facepic" value="<?php echo $facepic; ?>"/>
                                                 <img class="pic" src="__ROOT__<?php echo $facepic; ?>" id="logoimg" style="width:80px;height: 80px; overflow-x: hidden;"/>
                                                 <span id="uploadify-button" style="border: 1px solid #CCC; padding: 3px 5px; cursor: pointer;" class="upload-txt">上传头像</span>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                 <span class="t001">工　　　号：</span>
                                                 <input name="gonghao" type="text" style="width: 150px;" value="<?php echo $gonghao; ?>"/>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                 <span class="t001">身　份　证：</span>
                                                 <input name="IDcard" type="text" style="width: 250px;" value="<?php echo $IDcard; ?>"/>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                           <li>
                                                    <span class="t001">性　　　别：</span>
                                                     <?php 
                                                                $check1 = $check2="";
                                                                if($sex =="y"){
                                                                        $check1 =' checked="checked"';
                                                                }elseif($sex =="n"){
                                                                        $check2 =' checked="checked"';
                                                                }else{
                                                                        $check1 =' checked="checked"'; 
                                                                }
                                                     ?>
                                                    <label><input type="radio"  style="width:10px;" name="sex" <?php echo $check1; ?> value="y"/> 男</label>&nbsp;&nbsp;
                                                     <label><input type="radio" style="width:10px;"  name="sex" <?php echo $check2; ?> value="n"/> 女</label>
                                                     <span class="sm001"><b class="red">*</b></span>
                                            </li>

                                            <li>
                                                 <span class="t001">手　机　号：</span>
                                                 <input name="mobile" type="text" style="width: 100px;" value="<?php echo $mobile; ?>"/>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                 <span class="t001">Q Q / 微 信：</span>
                                                 <input name="qq" type="text" style="width: 100px;" value="<?php echo $qq; ?>"/>
                                            </li>
                                            <li>
                                                 <span class="t001">邮 箱 地 址 ：</span>
                                                 <input name="email" type="text" style="width: 250px;" value="<?php echo $email; ?>"/>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                 <span class="t001">文 化 程 度 ：</span>
                                                 <select name="culture">
                                                     <option value="">--请选择--</option>
                                                     <?php echo $CultureStr; ?>
                                                 </select>
                                            </li>
                                            
                                            <li>
                                                 <span class="t001">所 在 城 市 ：</span>
                                                 <select name="cityarr[]" id="city1" onchange="get_select01('<?php echo $JSGetCity;?>',$(this).val(),'2','city2');">
                                                     <option value="">--请选择--</option>
                                                     <?php echo $city1Str; ?>
                                                 </select>
                                                 <select name="cityarr[]" id="city2" onchange="get_select01('<?php echo $JSGetCity;?>',$(this).val(),'3','city3');">
                                                     <option value="">--请选择--</option>
                                                     <?php echo $city2Str; ?>
                                                 </select>
                                                 <select name="cityarr[]" id="city3">
                                                     <option value="">--请选择--</option>
                                                     <?php echo $city3Str; ?>
                                                 </select>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                 <span class="t001">详 细 地 址 ：</span>
                                                 <input name="address" type="text" style="width: 250px;" value="<?php echo $address; ?>"/>
                                            </li>

                                            <li>
                                                 <span class="t001">管 理 员 组 ：</span>
                                                 <select name="admingroup">
                                                     <option value="">--请选择--</option>
                                                     <?php echo $GroupStr; ?>
                                                 </select>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                 <span class="t001">备　　　注：</span>
                                                 <textarea name="beizhu" style="width:200px; height:100px;"><?php echo $beizhu;  ?></textarea>
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



<script type="text/javascript" src="Javascript/jquery.form.js"></script>
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
                                         var img_str ='__ROOT__'+data.picurl+"?"+(Math.random()*100);
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
