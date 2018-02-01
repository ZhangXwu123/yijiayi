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
                                                 <span class="t001">管理员组：</span>
                                                 <input name="title" type="text" style="width: 250px;" value="<?php echo $title; ?>"/>
                                                 <span class="sm001"><b class="red">*</b>   带 * 的为必填项。</span>
                                            </li>
                                            <li>
                                                 <span class="t001">描　　述：</span>
                                                 <textarea name="des" style="width:300px; height:100px;"><?php echo $des;  ?></textarea>
                                            </li>
                                            <li>
                                                 <span class="t001">权限等级：</span>
                                                 <select name="level">
                                                     <option value="0">--请选择--</option>
                                                     <?php echo $option_str; ?>
                                                 </select>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                </ul>
                            
                            
                                <div class="cl"></div><hr>
                                <div class="group-content">
                                        <ul>
                                           <?php echo $str; ?>
                                        </ul>
                                        <div class="cl"></div>
                                </div>
                                
                                <div class="cl"></div>
                                <div class="butt2">
                                          <input type="hidden" name="action" value="<?php echo $action; ?>">
                                           <input type="hidden" name="id" value="<?php echo $id; ?>">
                                           <button class="sub-mit" style="padding: 2px 10px; border:1px solid #ccc; cursor: pointer;">提交</button>
                                 </div>
                            
                                <div class="cl"></div>
                        </div>
            </form>
    </div>

<div class="cl"></div>
</div>
