<div class="header-top">
    <h2>后台管理
        <span class="head-add">欢迎 <?php echo $admin_username; ?> 登录，使用系统！<a style="border: none;" href="<?php echo $login_out_url ?>">退出登录</a><span>
    </h2>
    <div class="condition">
         <form action="" method="get">
                <ul>
                    <li>搜索：
                        <input type="text" style="width:180px;" name="keyworld" value="<?php echo $keyworld; ?>"/>
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
            <form action="" method="post">
                        <div class="add-mod">
                                <ul>
                                            <li>
                                                <div style="margin-left:15px; border: 1px solid #E5E5E5;  padding: 10px 5px; font-size: 12px; height:250px; overflow-x: hidden;">
                                                    <?php echo $spanfile; ?>
                                                </div>
                                            </li>
                                            <li>
                                                 <span class="t001">代 码 编 辑： </span>
                                                 <textarea name="file_code" style="width: 260px; height: 100px; font-size: 11px;"><?php echo $file_code; ?></textarea>
                                            </li>
                                            <li class="button">
                                                <input type="hidden" name="action" value="<?php echo $action; ?>">
                                                <input type="hidden" name="path" value="<?php echo $keyworld; ?>">
                                                <button class="sub-mit">提交</button>
                                            </li>
                                </ul>
                                <div class="cl"></div>
                        </div>
            </form>
    </div>

<div class="cl"></div>
</div>