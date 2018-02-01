<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose /yijiayi/Public/JiCheng/tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>管理系统</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link href="/yijiayi/Public/JiCheng/css/css.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/yijiayi/Public/JiCheng/javascript/jquery-1.12.3.min.js"></script>
        <script type="text/javascript" src="/yijiayi/Public/JiCheng/tool/laydate/laydate.js"></script>
        <script type="text/javascript" src="/yijiayi/Public/JiCheng/javascript/js.js"></script>
        
       
    </head>
    <body>
        <div class="master"><div class="header-top">
    <h2>后台管理
        <span class="head-add">欢迎 admin2 登录，使用系统！<a style="border: none;" href="/yijiayi/index.php?m=YiJiaYicms&c=Login&a=index">退出登录</a><span>
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
                                                 <input name="title" type="text" style="width: 250px;" value="技术管理员"/>
                                                 <span class="sm001"><b class="red">*</b>   带 * 的为必填项。</span>
                                            </li>
                                            <li>
                                                 <span class="t001">描　　述：</span>
                                                 <textarea name="des" style="width:300px; height:100px;">开发管理员拥有最高权限。请合理分配权限。</textarea>
                                            </li>
                                            <li>
                                                 <span class="t001">权限等级：</span>
                                                 <select name="level">
                                                     <option value="0">--请选择--</option>
                                                     <option  selected="selected"  value="1">1</option><option   value="2">2</option><option   value="3">3</option><option   value="4">4</option><option   value="5">5</option><option   value="6">6</option><option   value="7">7</option><option   value="8">8</option><option   value="9">9</option><option  disabled="disabled" style="color:#ccc;"  value="10">10</option><option   value="11">11</option><option   value="12">12</option><option   value="13">13</option><option   value="14">14</option><option   value="15">15</option><option   value="16">16</option><option   value="17">17</option><option   value="18">18</option><option   value="19">19</option><option   value="20">20</option><option   value="21">21</option><option   value="22">22</option><option   value="23">23</option><option   value="24">24</option><option   value="25">25</option><option   value="26">26</option><option   value="27">27</option><option   value="28">28</option><option   value="29">29</option><option   value="30">30</option><option   value="31">31</option><option   value="32">32</option><option   value="33">33</option><option   value="34">34</option><option   value="35">35</option><option   value="36">36</option><option   value="37">37</option><option   value="38">38</option><option   value="39">39</option><option   value="40">40</option><option   value="41">41</option><option   value="42">42</option><option   value="43">43</option><option   value="44">44</option><option   value="45">45</option><option   value="46">46</option><option   value="47">47</option><option   value="48">48</option><option   value="49">49</option><option   value="50">50</option>                                                 </select>
                                                 <span class="sm001"><b class="red">*</b></span>
                                            </li>
                                </ul>
                            
                            
                                <div class="cl"></div><hr>
                                <div class="group-content">
                                        <ul>
                                           <li><label class="title-qx"><input type="checkbox"  name="limits[]" value="YiJiaYicms_Index">系统管理</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Index_index">列表</label></li><li><ul class="sub-ul"><li><label class="title-qx"><input  type="checkbox" name="limits[]" value="YiJiaYicms_Index">密码修改</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Index_EditPassword">列表</label></li><li><label class="title-qx"><input  type="checkbox" name="limits[]" value="YiJiaYicms_Config">基本设置</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Config_index">列表</label></li><li><label class="title-qx"><input  type="checkbox" name="limits[]" value="YiJiaYicms_Advertis">广告管理</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Advertis_index">列表</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Advertis_add">添加</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Advertis_edit">修改</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Advertis_del">删除</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Advertis_is_switch">启用禁用</label></li><li><label class="title-qx"><input  type="checkbox" name="limits[]" value="YiJiaYicms_Link">友情链接</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Link_index">列表</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Link_add">添加</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Link_edit">修改</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Link_del">删除</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Link_is_switch">启用禁用</label></li><li><label class="title-qx"><input  type="checkbox" name="limits[]" value="YiJiaYicms_Log">日志管理</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Log_index">列表</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Log_look">查看</label></li><li><label class="title-qx"><input  type="checkbox" name="limits[]" value="YiJiaYicms_City">地区管理</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_City_index">列表</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_City_is_switch">启用禁用</label></li><li><label class="title-qx"><input  type="checkbox" name="limits[]" value="YiJiaYicms_Index">代码编辑</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Index_EditCode">列表</label></li></ul></li><li><label class="title-qx"><input type="checkbox"  name="limits[]" value="YiJiaYicms_AdminGroup">管理员管理</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_AdminGroup_index">列表</label></li><li><ul class="sub-ul"><li><label class="title-qx"><input  type="checkbox" name="limits[]" value="YiJiaYicms_AdminGroup">管理员列表</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_AdminGroup_index">列表</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_AdminGroup_add">添加</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_AdminGroup_edit">修改</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_AdminGroup_del2">删除</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_AdminGroup_is_switch2">启用禁用</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_AdminGroup_JSGetCity">地区联动</label></li><li><label class="title-qx"><input  type="checkbox" name="limits[]" value="YiJiaYicms_AdminGroup">管理员组</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_AdminGroup_group">列表</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_AdminGroup_is_switch">启用禁用</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_AdminGroup_del">删除</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_AdminGroup_group_addup_add">添加</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_AdminGroup_group_addup_edit">修改</label></li></ul></li><li><label class="title-qx"><input type="checkbox"  name="limits[]" value="YiJiaYicms_Column">栏目管理</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Column_index">列表</label></li><li><ul class="sub-ul"><li><label class="title-qx"><input  type="checkbox" name="limits[]" value="YiJiaYicms_Column">栏目列表</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Column_index">列表</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Column_add">添加</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Column_edit">修改</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Column_del2">删除</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Column_is_switch2">启用禁用</label></li><li><label class="title-qx"><input  type="checkbox" name="limits[]" value="YiJiaYicms_Column">栏目分类</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Column_column">列表</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Column_column_addup_add">添加</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Column_column_addup_edit">修改</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Column_is_switch">启用禁用</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Column_del">删除</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Column_show_position">栏目显示位置</label></li></ul></li><li><label class="title-qx"><input type="checkbox"  name="limits[]" value="YiJiaYicms_ZhaoPin">招聘管理</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_ZhaoPin_index">列表</label></li><li><ul class="sub-ul"><li><label class="title-qx"><input  type="checkbox" name="limits[]" value="YiJiaYicms_ZhaoPin">招聘列表</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_ZhaoPin_index">列表</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_ZhaoPin_add">添加</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_ZhaoPin_edit">修改</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_ZhaoPin_del">删除</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_ZhaoPin_is_switch">启用禁用</label></li></ul></li><li><label class="title-qx"><input type="checkbox"  name="limits[]" value="YiJiaYicms_Product">产品管理</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Product_index">列表</label></li><li><ul class="sub-ul"><li><label class="title-qx"><input  type="checkbox" name="limits[]" value="YiJiaYicms_Product">产品列表</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Product_index">列表</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Product_add">添加</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Product_edit">修改</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Product_del">删除</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Product_is_switch">启用禁用</label></li><li><label class="title-qx"><input  type="checkbox" name="limits[]" value="YiJiaYicms_ProductType">产品分类</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_ProductType_index">列表</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_ProductType_add">添加</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_ProductType_edit">修改</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_ProductType_del">删除</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_ProductType_is_switch">启用禁用</label></li></ul></li><li><label class="title-qx"><input type="checkbox"  name="limits[]" value="YiJiaYicms_Member">用户管理</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Member_index">列表</label></li><li><ul class="sub-ul"><li><label class="title-qx"><input  type="checkbox" name="limits[]" value="YiJiaYicms_Member">用户列表</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Member_index">列表</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Member_edit">修改</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Member_del">删除</label><label><input type="checkbox"  name="limits[]" value="YiJiaYicms_Member_is_switch">启用禁用</label></li></ul></li>                                        </ul>
                                        <div class="cl"></div>
                                </div>
                                
                                <div class="cl"></div>
                                <div class="butt2">
                                          <input type="hidden" name="action" value="edit">
                                           <input type="hidden" name="id" value="1">
                                           <button class="sub-mit" style="padding: 2px 10px; border:1px solid #ccc; cursor: pointer;">提交</button>
                                 </div>
                            
                                <div class="cl"></div>
                        </div>
            </form>
    </div>

<div class="cl"></div>
</div>            <div class="cl"></div>
            <div class="footer">
                <div class="footer-butt-l"><a href='/yijiayi/index.php?m=YiJiaYicms&c=Index&a=index'></a></div>
                    <span class="footer-title"></span>
                    <div class="footer-butt-r"><a onmouseover="click_gongneng('1')"></a></div>
                    
                    <div class="menu-gongneng hide">
<!--                            <ul class="nav1">
                                <li>
                                    <a href="#">系统首页</a>
                                </li>
                                <li>
                                    <a href="#">系统首页</a>
                                    <ul class="sub_nav hide">
                                        <li><a href="#">二级导航</a></li>
                                        <li class="li2">
                                            <a href="#">二级导航</a>
                                            <ul class="sub_nav hide">
                                                <li><a href="#">三级导航</a></li>
                                            </ul>
                                         </li>
                                    </ul>
                                </li>
                           
                            </ul>-->
                             <ul class="nav1"> <li><a href="">系统管理</a><ul class="sub_nav hide"><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Index&a=EditPassword">密码修改</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Config&a=index">基本设置</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Advertis&a=index">广告管理</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Link&a=index">友情链接</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Log&a=index">日志管理</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=City&a=index">地区管理</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Index&a=EditCode">代码编辑</a></li></ul></li> <li><a href="">管理员管理</a><ul class="sub_nav hide"><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=AdminGroup&a=index">管理员列表</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=AdminGroup&a=group">管理员组</a></li></ul></li> <li><a href="">栏目管理</a><ul class="sub_nav hide"><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Column&a=column">栏目分类</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Column&a=index">栏目列表</a></li></ul></li> <li><a href="">招聘管理</a><ul class="sub_nav hide"><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=ZhaoPin&a=index">招聘列表</a></li></ul></li> <li><a href="">产品管理</a><ul class="sub_nav hide"><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=ProductType&a=index">产品分类</a></li><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Product&a=index">产品列表</a></li></ul></li> <li><a href="">用户管理</a><ul class="sub_nav hide"><li><a href="/yijiayi/index.php?m=YiJiaYicms&c=Member&a=index">用户列表</a></li></ul></li></ul>                    </div>
                   <div class="cl"></div>
            </div>
        </div>
    </body>
</html>