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
                                                 <span class="t001">职位名称：</span>
                                                 <input name="title" type="text" style="width: 250px;" value="<?php echo $title; ?>"/>
                                            </li>
                                            <li>
                                                 <span class="t001">职位类别：</span>
                                                 <input name="type" type="text" style="width: 250px;" value="<?php echo $type; ?>"/>
                                            </li>
                                            <li>
                                                 <span class="t001">职位描述：</span>
                                                 <textarea name="description" style="width:300px; height:100px;"><?php echo $description;  ?></textarea>
                                            </li>
                                            <li>
                                                 <span class="t001">招聘详情：</span>
                                                 <textarea name="content" id="content" style="width:100px; height:300px;"><?php echo $content;  ?></textarea>
                                            </li>

                                            <li>
                                                 <span class="t001">发布时间：</span>
                                                 <input type="text" name="fbtime" id="begintime"  value="<?php if($fbtime) echo date("Y-m-d H:i:s",$fbtime); ?>" />
                                            </li>

                                            <li>
                                                 <span class="t001">排列排序：</span>
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
        
    </div>

<div class="cl"></div>
</div>


<script type="text/javascript" src="Javascript/jquery.form.js"></script>
<link rel="stylesheet" href="__PUBLIC__/tool/ueditor/themes/default/default.css" />
<link rel="stylesheet" href="__PUBLIC__/tool/ueditor/plugins/code/prettify.css" />
<script charset="utf-8" src="__PUBLIC__/tool/ueditor/kindeditor-all.js"></script>
<script charset="utf-8" src="__PUBLIC__/tool/ueditor/lang/zh-CN.js"></script>
<script charset="utf-8" src="__PUBLIC__/tool/ueditor/plugins/code/prettify.js"></script>
<script>
        KindEditor.ready(function(K) {
                var editor1 = K.create('textarea[name="content"]', {
                        cssPath : '__PUBLIC__/tool/ueditor/plugins/code/prettify.css',
                        uploadJson : '__PUBLIC__/tool/ueditor/php/upload_json.php',
                        fileManagerJson : '__PUBLIC__/tool/ueditor/php/file_manager_json.php',
                        allowFileManager : true,
                        afterCreate : function() {
                                var self = this;
                                K.ctrl(document, 13, function() {
                                        self.sync();
                                        K('form[name=example]')[0].submit();
                                });
                                K.ctrl(self.edit.doc, 13, function() {
                                        self.sync();
                                        K('form[name=example]')[0].submit();
                                });
                        }
                });
                prettyPrint();
        });
</script>