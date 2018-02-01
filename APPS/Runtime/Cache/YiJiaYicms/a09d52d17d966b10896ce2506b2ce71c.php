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
                                                <span class="t001">旧　密　码：</span>
                                                <input type="password" name="oldpassword" placeholder="请输入原始密码..." />
                                                <span class="sm001"><b class="red">*</b>   带 * 的为必填项。</span>
                                            </li>
                                            <li>
                                                <span class="t001">新　密　码：</span>
                                                <input type="password" name="password" placeholder="请输入新密码..." />
                                                <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li>
                                                <span class="t001">确 认 密 码 ：</span>
                                                <input type="password" name="confirpassword" placeholder="请输入确认密码..." />
                                                <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                            <li class="button">
                                                <input type="hidden" name="action" value="<?php echo $action; ?>">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                <button class="sub-mit">确认修改 </button>
                                            </li>
                                </ul>
                                <div class="cl"></div>
                        </div>
            </form>
    </div>

<div class="cl"></div>
</div>