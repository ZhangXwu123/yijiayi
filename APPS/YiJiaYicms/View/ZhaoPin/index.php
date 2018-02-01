<div class="header-top">
    <h2>后台管理
        <span class="head-add">欢迎 <?php echo $admin_username; ?> 登录，使用系统！<a style="border: none;" href="<?php echo $login_out_url ?>">退出登录</a>
                <a style="margin-left:50px;" href="<?php echo $add_url; ?>">添加招聘信息</a>
        <span>
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
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                         <tr>
                                <td bgcolor="#e1e1e1" style="text-align: left; padding: 15px;"><strong>职位名称</strong></td>
                                <td bgcolor="#e1e1e1"><strong>职位类型</strong></td>
                                <td bgcolor="#e1e1e1" style="text-align: left; padding: 15px;"><strong>职位描述</strong></td>
                                <td bgcolor="#e1e1e1"><strong>发布时间</strong></td>
                                <td bgcolor="#e1e1e1"><strong>排列排序</strong></td>
                                <td bgcolor="#e1e1e1"><strong>添加时间</strong></td>
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