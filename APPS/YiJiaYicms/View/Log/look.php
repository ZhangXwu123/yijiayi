<div class="header-top">
    <h2>后台管理
        <span class="head-add">欢迎 <?php echo $admin_username; ?> 登录，使用系统！<a style="border: none;" href="<?php echo $login_out_url ?>">退出登录</a>  
        <span>
    </h2>
        
    <div class="condition">
         <form action="" method="get">
                <ul>
                    <li>搜索：
                        <input type="text" style="width:380px;" name="keyworld" value="<?php echo $keyworld; ?>"/>
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
                  <div style="margin-left:15px;  padding: 10px 5px; font-size: 12px;  overflow-x: hidden;">
                            <?php echo $file_code; ?>
                 </div>
        </div>
<div class="cl"></div>
</div>