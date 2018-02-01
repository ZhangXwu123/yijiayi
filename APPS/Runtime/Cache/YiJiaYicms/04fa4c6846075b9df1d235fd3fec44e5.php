<?php if (!defined('THINK_PATH')) exit();?><div class="header-top">
        <h2>后台管理
            <span class="head-add">欢迎 <?php echo $admin_username; ?> 登录，使用系统！<a style="border: none;" href="<?php  echo $login_out_url ?>">退出登录</a><span>
        </h2>
        <div class="cl"></div>
</div>


<div class="index-main">
    <ul class='index-menu'>
      <?php echo $desktop; ?>
<!--        <li><a href="#"><div class="menu-pic"></div><span class="menu-title">系统首页首页首</span></a></li>-->
    </ul>
    <div class="cl"></div>
      <?php if($TiXing){ ?>
        <div style=" position: fixed; right: 5px; top: 80px; width: 320px; height: 95px; border-radius: 15px ; background: #FFF; border: 1px solid #ccc; overflow: hidden; font-size: 12px;">
                <?php  if($stock) echo $stock; if($order) echo $order; if($fa_huo) echo $fa_huo; ?>
        </div>
      <?php } ?>
</div>