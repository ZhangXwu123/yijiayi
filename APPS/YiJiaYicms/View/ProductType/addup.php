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
                                                 <span class="t001">分类名称：</span>
                                                 <input name="title" type="text" style="width: 250px;" value="<?php echo $title; ?>"/>
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