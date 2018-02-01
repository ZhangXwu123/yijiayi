<div class="header-top">
    <h2>后台管理
        <span class="head-add">欢迎 <?php echo $admin_username; ?> 登录，使用系统！<a style="border: none;" href="<?php echo $login_out_url ?>">退出登录</a>
                <a style="margin-left:50px;" href="<?php echo $add_url; ?>">管理员添加</a>
        <span>
    </h2>
    <div class="condition">
         <form action="" method="get">
                <ul>
                    <li>搜索：
                        <input type="text" style="width:180px;" name="keyworld" value="<?php echo $keyworld; ?>"/>
                        &nbsp;&nbsp;&nbsp;地区：
                        
                        <select name="city1" id="city1" onchange="get_select01('<?php echo $JSGetCity;?>',$(this).val(),'2','city2');">
                            <option value="">--请选择--</option>
                            <?php echo $city1Str; ?>
                        </select>
                        &nbsp;
                        <select name="city2" id="city2" onchange="get_select01('<?php echo $JSGetCity;?>',$(this).val(),'3','city3');">
                            <option value="">--请选择--</option>
                            <?php echo $city2Str; ?>
                        </select>
                        &nbsp;
                        <select name="city3" id="city3">
                            <option value="">--请选择--</option>
                            <?php echo $city3Str; ?>
                        </select>
                        
                        &nbsp;&nbsp;&nbsp;管理组：
                        <select name="group">
                            <option value="">--请选择--</option>
                            <?php echo $GroupStr; ?>
                        </select>
                        <?php echo $_model; ?>
                        <input type="submit" class="butt" value="确定">
                    </li>
                </ul>
         </form>
         <div class="cl"></div>
    </div>
    <div class="cl"></div>
</div>

<div class="sub-page">
    
        <div class="tb-cn">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                         <tr>
                                <td bgcolor="#e1e1e1"><strong>头像</strong></td>
                                <td bgcolor="#e1e1e1"><strong>用户名</strong></td>
                                <td bgcolor="#e1e1e1"><strong>性别</strong></td>
                                <td bgcolor="#e1e1e1"><strong>身份证</strong></td>
                                <td bgcolor="#e1e1e1"><strong>手机号</strong></td>
                                <td bgcolor="#e1e1e1"><strong>QQ号</strong></td>
                                <td bgcolor="#e1e1e1"><strong>邮箱地址</strong></td>
                                <td bgcolor="#e1e1e1"><strong>学历</strong></td>
                                <td bgcolor="#e1e1e1"><strong>所在地区</strong></td>
                                <td bgcolor="#e1e1e1"><strong>所属管理员组</strong></td>
                                <td bgcolor="#e1e1e1"><strong>登录时间</strong></td>
                                <td bgcolor="#e1e1e1"><strong>登录IP</strong></td>
                                <td bgcolor="#e1e1e1"><strong>上次登录时间</strong></td>
                                <td bgcolor="#e1e1e1"><strong>上次登录IP</strong></td>
                                <td bgcolor="#e1e1e1"><strong>注册时间</strong></td>
                                <td bgcolor="#e1e1e1"><strong>操作</strong></td>
                        </tr>
                        <?php echo $str; ?>
               </table>
            
            <div class="pagelist">
                    <?php echo $page; ?>
            </div>
       </div>
<div class="cl"></div>
</div>