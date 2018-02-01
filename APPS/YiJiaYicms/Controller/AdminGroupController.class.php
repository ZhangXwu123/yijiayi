<?php

/* 管理员管理
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YiJiaYicms\Controller;
use Think\Controller;

class AdminGroupController extends CommonController{
    
    public function __construct() {
        parent::__construct();
    }
    //管理员管理
    public function index(){
                $keyworld   = I("keyworld",'');
                $group      = I("group",'');
                $city1      = I("city1",'');
                $city2      = I("city2",'');
                $city3      = I("city3",'');
                if($keyworld){
                    $sql =" and (username like '%$keyworld%' or gonghao='$keyworld' or mobile =$keyworld) ";
                }else{
                    $sql ="";
                }
                
                if($city3) 
                    $sql .=" and city= '$city3'";   
                elseif($city2)
                    $sql .=" and city= '$city2'"; 
                elseif($city1)
                    $sql .=" and city= '$city1'"; 
                
                
                if(!empty($group))
                     $sql .=" and admingroup= $group";   
                
                
                $GroupStr ="";
                $groupArr ="";
                $result_admingroup = $this->query("select id,title from `".PR."admin_group` where level >=".adminlevel." ");
                foreach($result_admingroup  as $key=>$v){
                        if($group == $v["id"]){
                            $check =  ' selected="selected" ';
                        }else{
                            $check = "";
                        }
                        $groupArr[]= $v["id"];
                        $GroupStr .='<option '.$check.' value="'.$v["id"].'">'.$v["title"].'</option>';
                }
                $sql .= " and admingroup in(".join(",",$groupArr).") ";   
                
               $str ="";
               $rep = $this->GetPage("select * from `".PR."admin` where ".sql_tf." and sys!='true' $sql ORDER BY id desc ");

               $url1 = $this->a_url("","YiJiaYicms","AdminGroup","is_switch2","",array("id","if"));
               $url2 = $this->a_url("","YiJiaYicms","AdminGroup","addup","",array("id","if"));
               $url3 = $this->a_url("","YiJiaYicms","AdminGroup","del2","",array("id","if"));
               foreach ($rep as $key=>$v){
                        $str .= '<tr>';
                        $str .= '<td><a target="_blank" href="'.$v["url"].'"> <img src="__ROOT__'.$v["facepic"].'" style="width:60px; height:60px; border:1px solid #ccc; margin:2px;padding:1px;"> </a></td>';
                        $str .= '<td>'.$v["username"].'</td>';
                        if($v["sex"] == 'y'){
                                 $sex = "男";
                        }else{
                                 $sex = "女"; 
                        }
                        $str .= '<td>'.$sex.'</td>';
                        $str .= '<td>'.$v["IDcard"].'</td>';
                        $str .= '<td>'.$v["mobile"].'</td>';
                        $str .= '<td>'.$v["qq"].'</td>';
                        $str .= '<td>'.$v["email"].'</td>';
                        $culture_row = $this->GetOne("select title from `".PR."culture` where id=".$v["culture"]);
                        $str .= '<td>'.$culture_row["title"].'</td>';
                        $city_row = $this->GetOne("select name from `".PR."area` where id=".$v["city"]."");
                        $str .= '<td>'.$city_row["name"].'</td>';
                        $groupname = $this->GetOne("select title from `".PR."admin_group` where id=".$v["admingroup"]." ");
                        $str .= '<td>'.$groupname["title"].'</td>';
                        $str .= '<td>'.date("Y-m-d",$v["logintime"]).'</td>';
                        $str .= '<td>'.$v["loginip"].'</td>';
                        $str .= '<td>'.date("Y-m-d",$v["last_logintime"]).'</td>';
                        $str .= '<td>'.$v["last_loginip"].'</td>';
                        $str .= '<td>'.date("Y-m-d",$v["addtime"]).'</td>';

                        $butt ="";
                        
                        if($v["switch"]=="true"){
                             $butt .='<a href="'.$url1.'&if=false&id='.md5($v["id"]).'">禁用</a>';
                         }else{
                             $butt .='<a href="'.$url1.'&if=true&id='.md5($v["id"]).'">启用</a>';
                         }
                        $butt .='<a href="'.$url2.'&id='.md5($v["id"]).'">修改</a>';   
                        $butt .='<a onclick="confirms(\'确定要删除吗？\',\''.$url3.'&id='.md5($v["id"]).'\')">删除</a>';

                        $str .= '<td class="action-butt">'.$butt.'</td>';


                        $str .= '</tr>';

                }
                
                
                $city_Fun =$this->ListCity($city1,$city2,$city3);
                $city1Str   = $city_Fun[0];
                $city2Str   = $city_Fun[1];
                $city3Str   = $city_Fun[2];
    
                $this->a_url("add_url", "YiJiaYicms", "AdminGroup", "addup",'','',1);
                $title ="管理员列表";
                $this->assign(array("ctitle"=>$title,'keyworld'=> $keyworld,"str"=>$str,'GroupStr'=>$GroupStr,'city1Str'=>$city1Str,'city2Str'=>$city2Str,'city3Str'=>$city3Str,"JSGetCity"=>$this->a_url("", "YiJiaYicms", "AdminGroup", "JSGetCity",'',"",1)));
                $this->veiws("AdminGroup","index"); 
    }
    
    public function addup(){
                $id     = !empty($this->g_id)?$this->g_id:"";
                $action = !empty($this->p_action)?$this->p_action:"";
                $upload = I("upload","");

                
                //管理员组
                $admin_row = $this->GetOne("select * from `" . PR . "admin` where md5(md5(id))='".md5($id)."' ");
                $GroupStr ="";
                $groupArr ="";
                $result_admingroup = $this->query("select id,title from `".PR."admin_group` where level >=".adminlevel." ");
                foreach($result_admingroup  as $key=>$v){
                        if($admin_row["admingroup"] == $v["id"]){
                                    $check = ' selected="selected"';
                        }else
                                    $check = '';
                        $groupArr[]= $v["id"];
                        $GroupStr .='<option '.$check.' value="'.$v["id"].'">'.$v["title"].'</option>';
                }
                if ($action && ($action == "add" || $action == "edit")) {

                                $username       = $this->p_username;
                                $password       = trim($this->p_password);
                                $reppassword    = trim($this->p_reppassword);
                                $facepic        = $this->p_facepic;
                                $gonghao        = $this->p_gonghao;
                                $IDcard         = $this->p_IDcard;
                                $sex            = $this->p_sex;
                                $mobile         = $this->p_mobile;
                                $qq             = $this->p_qq;
                                $email          = $this->p_email;
                                $culture        = $this->p_culture;
                                $cityarr        = I("cityarr","");
                                $city           = $this->p_city;
                                $address        = $this->p_address;
                                $admingroup     = $this->p_admingroup;
                                $beizhu         = $this->p_beizhu;
                                
                                if(empty($username)){
                                        $this->ShowMsgC("请设置用户名！");
                                }
                                if ($action == "add" && !$password) {
                                        $this->ShowMsgC("请设置初始密码！");
                                }
                                if ($password) {
                                            if (!$reppassword) {
                                                    $this->ShowMsgC("您还没有输入确认密码，请输入确认密码！");
                                            }
                                            if ($reppassword != $password) {
                                                    $this->ShowMsgC("您输入的两次密码不一致，请检查！");
                                            }
                                            $salts = $this->getRandChar(4);
                                            $password   = sha1(sha1($password).$salts);
                                            $upPass     = " ,password='$password',salts='$salts' ";
                                }else{
                                            $upPass     = "";
                                }
                                if(!$facepic){
                                          //  $this->ShowMsgC("需要设置头像！");
                                }
                                if($action == "edit"){
                                        if(!empty($this->p_id)){
                                                $id     =   $this->p_id;
                                                $not_id = " and id !=".$this->p_id;
                                        }else{
                                                $this->ShowMsgC("参数错误(error:01)！");
                                        }
                                }else{
                                                $not_id ="";
                                }
                                if(!$gonghao){
                                            $this->ShowMsgC("需要设置工号！");
                                }else{
                                        $result01 = $this->GetOne("select * from `".PR."admin` where gonghao='$gonghao' $not_id ");
                                        if($result01){
                                                    $this->ShowMsgC("工号已存在，请重新设置工号！");
                                        }
                                }
                                if(!$IDcard){
                                            $this->ShowMsgC("请设置身份证号！");
                                }
                                if(!$sex){
                                            $this->ShowMsgC("请设置性别！");
                                }
                                if(!$mobile){
                                            $this->ShowMsgC("请您输入手机号！");
                                }else{
                                            if ($this->mobile($mobile)) {
                                                    $result02 = $this->GetOne("select * from `".PR."admin` where mobile='$mobile'  $not_id ");
                                                    if($result02){
                                                                $this->ShowMsgC("您输入的手机号已存在，请重新输入！");
                                                    }
                                            } else {
                                                $this->ShowMsgC("手机号输入有误，请重新输入！");
                                            }
                                }
                                if(!$email){
                                            $this->ShowMsgC("邮箱没有设置，请设置邮箱！");
                                }else{
                                             if ($this->emai($email)) {
                                                    $result03 = $this->GetOne("select * from `".PR."admin` where email='$email'  $not_id ");
                                                    if($result03){
                                                                $this->ShowMsgC("邮箱地址已存在，请重新输入！");
                                                    }
                                            } else {
                                                $this->ShowMsgC("邮箱地址有误，请重新输入！");
                                            }
                                }
                                
                                if(empty($cityarr)){
                                            $this->ShowMsgC("所在城市没有设置，请设置！");    
                                }else{
                                            if(!empty($cityarr[2]))
                                                    $city = $cityarr[2];
                                            elseif(!empty($cityarr[1]))
                                                    $city = $cityarr[1];
                                            elseif(!empty($cityarr[0]))
                                                    $city = $cityarr[0];
                                            $cityarr    = join(",",$cityarr);
                                }
                                if(!$city){
                                            $this->ShowMsgC("所在城市没有设置，请设置！".$cityarr);    
                                }else{
                                            $result04 = $this->GetOne("select * from `".PR."area` where id='$city' ");
                                            if(!$result04){
                                                        $this->ShowMsgC("系统中找不到当先设置的所在城市！");
                                            }  
                                }
                                if(!$admingroup){ //管理员组
                                            $this->ShowMsgC("没有分配管理员所在管理员的哪个组，请设置！");    
                                }else{
                                            if(!in_array($admingroup,$groupArr)){
                                                        $this->ShowMsgC("无法设置比当前账户权限还大的管理员组！");
                                            }
                                }
                                if ($action == "edit") {
                                            $this->level(2,"edit");//权限判断
                                            $result = $this->query("update `".PR."admin` set username='$username' $upPass,gonghao='$gonghao',cityarr='$cityarr',city='$city',IDcard='$IDcard',mobile='$mobile',email='$email',qq='$qq',admingroup='$admingroup',address='$address',sex='$sex',culture='$culture',bank='$bank',bankCard='$bankCard',facepic='$facepic',uptime='".thistime."',upadmin='".adminid."' where id = $id ");
                                } else {
                                            $sql = "('$username','$password','$salts','$gonghao',1,'$cityarr','$city','$IDcard','$mobile','$email','$qq',$admingroup,'$address','$sex',$culture,'$bank','$bankCard','$beizhu','$facepic','true',".thistime.",".adminid.")";
                                            $result = $this->query("insert into`".PR."admin`(username,password,salts,gonghao,is_gonghao,cityarr,city,IDcard,mobile,email,qq,admingroup,address,sex,culture,bank,bankCard,beizhu,facepic,switch,addtime,addadmin) values $sql");
                                }
                                if(!(string)$result){
                                        $this->ShowMsgC("操作失败！");
                                }else{
                                        $this->ShowMsgC("操作成功！", $this->a_url("", "YiJiaYicms", "AdminGroup", "index", '', array("id")));
                                }
                                exit;
                }
                
                
                        
                if ($upload == 1 && !empty($_FILES)) { //上传
                            $result = $this->uplodes($_FILES, date("YmdHis",thistime).$this->getRandChar(2),0, 220, 80, 'JCHK/headpic');
                            if ($result[0] > 0) {
                                    exit(json_encode(array("error" => 1, "errortxt" => $result[1])));
                            }
                            exit(json_encode(array("error" => 0, "picurl" => $result[2])));
                }
                
                //-----管理员所在地区---------
                if(!empty($admin_row["city"])){
                        $city_arr = explode(",",$admin_row["cityarr"]);
                        $city1  =$city_arr[0];  //省
                        $city2  =$city_arr[1];  //市
                        $city3  =$city_arr[2];  //区
                }
                $city_Fun =$this->ListCity($city1,$city2,$city3);
                $city1Str   = $city_Fun[0];
                $city2Str   = $city_Fun[1];
                $city3Str   = $city_Fun[2];
                
                
                //教育程度
                $CultureStr ="";
                $culture_result = $this->query("select * from `".PR."culture` where ".sql_true." ");
                foreach($culture_result as $key=>$v){
                        if($admin_row["culture"] == $v["id"]){
                                    $check = ' selected="selected"';
                        }else
                                    $check = '';
                        $CultureStr .='<option '.$check.' value="'.$v["id"].'">'.$v["title"].'</option>';
                }
                
                
                $this->assign($admin_row);
                if (!$id) {
                        $action = "add";
                        $title = " - 添加";
                } else {
                        $title = " - 修改";
                        $action = "edit";
                }
                $this->assign(array('ctitle'=>"管理员管理".$title,'action'=>$action,'GroupStr'=>$GroupStr,'CultureStr'=>$CultureStr,'city1Str'=>$city1Str,'city2Str'=>$city2Str,'city3Str'=>$city3Str,"JSGetCity"=>$this->a_url("", "YiJiaYicms", "AdminGroup", "JSGetCity",'',"",1)));
                $this->veiws("AdminGroup","addup");  
        
    }
    
    public function JSGetCity(){
                $id         = !empty($this->g_id)?$this->g_id:"";
                $level      = !empty($this->g_level)?$this->g_level:"";
                $result     = $this->ajax_Get($id,$level);
                exit(json_encode(array("str"=>$result)));
    }
    
    public function is_switch2(){
            $id = !empty($this->g_id)?$this->g_id:"";
            $if = !empty($this->g_if)?$this->g_if:"";
            if(empty($id)){
                        $this->ShowMsgC("操作失败(1)！"); 
            }else{
                        if($if!="true" && $if !="false" ){
                                    $this->ShowMsgC("参数错误(1)！"); 
                        }
                        if($if == "true"){
                                $is_switch = " switch='true'"; 
                        }else{
                                $is_switch = " switch='false'";   
                        }
                        if($this->GetOne("select id from `".PR."admin` where md5(md5(id))='".md5($id)."' ")){
                                    $result = $this->query("update `".PR."admin` set $is_switch where md5(id) = '".$id."' ");
                                    if(!(string)$result){
                                            $this->ShowMsgC("操作失败(2)！"); 
                                    }else{
                                            $this->ShowMsgC("",$this->a_url("","YiJiaYicms","AdminGroup","index",'',array("id","if")));
                                    }
                        }
            }
    }
    public function del2(){
        $id         = !empty($this->g_id)?$this->g_id:"";
        if(empty($id) || $id !=1){
                $this->ShowMsgC("操作失败(1)！"); 
        }else{
            if($this->GetOne("select id from `".PR."admin` where md5(md5(id))='".md5($id)."' ")){
                        $row = $this->query("update `".PR."admin` set switch='del',deltime='".thistime."',deladmin='".adminid."' where md5(id) = '".$id."' ");
                        if($row == "false"){
                                    $this->ShowMsgC("操作失败(2)！"); 
                        }else{
                                    $this->ShowMsgC("删除成功！",$this->a_url("","YiJiaYicms","AdminGroup","index","",array("id")));
                        }
            }
        }
    }
    
    
    
    
    
    
    //-----管理员组管理-----------------------------------------------------------
    public function group(){
                $level = " and level >=".adminlevel." ";
                if(sys=="true"){
                       $level = ''; 
                }
                $reuslt = $this->GetPage("select * from `".PR."admin_group` where ".sql_tf." $level order by id asc ",20);
                $str ='';
                $url1 = $this->a_url("","YiJiaYicms","AdminGroup","is_switch","",array("id","if"));
                $url2 = $this->a_url("","YiJiaYicms","AdminGroup","group_addup","",array("id","if"));
                $url3 = $this->a_url("","YiJiaYicms","AdminGroup","del","",array("id","if"));
                foreach($reuslt as $key=>$v){
                        $str .='<tr>'; 
                        $str .='<td style="text-align: left; padding-left:10px;">'.$v["title"].'</td>'; 
                        $str .='<td style="text-align: left; padding-left:10px;">'.$v["des"].'</td>'; 

                        $butt ="";
                        if($v["switch"]=="true"){
                                    $butt .='<a href="'.$url1.'&if=false&id='.md5($v["id"]).'">禁用</a>';
                        }else{
                                    $butt .='<a href="'.$url1.'&if=true&id='.md5($v["id"]).'">启用</a>';
                        }
                        if($v["id"] ==1){
                                $butt  ='<span>禁用</span>';    
                                $butt .='<a href="'.$url2.'&id='.md5($v["id"]).'">修改</a>'; 
                                $butt .='<span>删除</span>';        
                        }else{
                                $butt .='<a href="'.$url2.'&id='.md5($v["id"]).'">修改</a>';   
                                $butt .='<a onclick="confirms(\'确定要删除吗？\',\''.$url3.'&id='.md5($v["id"]).'\')">删除</a>';  
                        }
                        $str .='<td class="action-butt">'.$butt.'</td>'; 
                        $str .='</tr>'; 
                }
                $this->a_url("add_url", "YiJiaYicms", "AdminGroup", "group_addup",'','',1);
                $title ="管理员组";
                $this->assign(array("ctitle"=>$title,'keyworld'=> $keyworld,"str"=>$str));
                $this->veiws("AdminGroup","group"); 
    }
    public function is_switch(){
            $id = !empty($this->g_id)?$this->g_id:"";
            $if = !empty($this->g_if)?$this->g_if:"";
            if(empty($id)){
                        $this->ShowMsgC("操作失败(1)！"); 
            }else{
                        if($if!="true" && $if !="false" ){
                                    $this->ShowMsgC("参数错误(1)！"); 
                        }
                        if($if == "true"){
                                $is_switch = " switch='true'"; 
                        }else{
                                $is_switch = " switch='false'";   
                        }
                        if($this->GetOne("select id from `".PR."admin_group` where md5(md5(id))='".md5($id)."' ")){
                                    $result = $this->query("update `".PR."admin_group` set $is_switch where md5(id) = '".$id."' ");
                                    if(!(string)$result){
                                            $this->ShowMsgC("操作失败(2)！"); 
                                    }else{
                                            $this->ShowMsgC("",$this->a_url("","YiJiaYicms","AdminGroup","group",'',array("id","if")));
                                    }
                        }
            }
    }
        
    public function del(){
            $id = !empty($this->g_id)?$this->g_id:"";
            if(empty($id)){
                $this->ShowMsgC("操作失败(1)！"); 
            }else{
                if($this->GetOne("select id from `".PR."admin_group` where md5(md5(id))='".md5($id)."' ")){
                            $row = $this->query("update `".PR."admin_group` set switch='del',deltime='".thistime."',deladmin='".adminid."' where md5(id) = '".$id."' ");
                            if($row == "false"){
                                $this->ShowMsgC("操作失败(2)！"); 
                            }else{
                                $this->ShowMsgC("删除成功！",$this->a_url("","YiJiaYicms","AdminGroup","group","",array("id")));
                            }
                }
            }
    }
    
    public function group_addup(){
            $id     = !empty($this->g_id)?$this->g_id:"";
            $action = !empty($this->p_action)?$this->p_action:"";
        
        
            if($action && ($action == "add" || $action == "edit")){
                        $title              = trim($this->p_title);
                        $des                = trim($this->p_des);
                        $level              = I("level","");
                        $limits_arr         = I("limits","");

                        if(empty($title)){
                                    $this->ShowMsgC("请输入管理员组名称！");
                        }
                        if(empty($des)){
                                    $this->ShowMsgC("请输入对管理员组的描述！");
                        }
                        if(empty($level)){
                                    $this->ShowMsgC("请设置权限等级！");
                        }else{
                                    $level_sql="";
                                    if($this->p_id){
                                        $level_sql =" and id !=$id";
                                    }
                                    if($this->GetOne("select id from `".PR."admin_group` where level=$level $level_sql ")){
                                                $this->ShowMsgC("您当前选中的等级已被使用，无法进行分配！");
                                    }
                        }
                        if(!empty($limits_arr)){
                                    $limits = join(",",$limits_arr);
                        }

                        if($action == "edit"){

                                    $id = $this->p_id;
                                    $this->level(2,"group_addup_edit");//权限判断

                                    if(!$id || ($id==1 && admingroup !=1)){
                                        $this->ShowMsgC("操作错误(212)！");
                                    }
                                    $result = $this->query("update `".PR."admin_group` set title='$title',des='$des',level='$level',limits='$limits',uptime='".thistime."',upadmin='".adminid."' where id = $id ");
                                    if($result == "false"){
                                        $this->ShowMsgC("操作错误(203)！");
                                    }else{
                                        $this->ShowMsgC("操作成功！", $this->a_url("", "YiJiaYicms", "AdminGroup", "group",'',array("id")));
                                    }
                        }else{
                                    $sql = "('$title','$des',$level,'$limits','true',".thistime.",".adminid.")";
                                    $result = $this->query("insert into `".PR."admin_group`(title,des,level,limits,switch,addtime,addadmin) values $sql");
                                    if($result == "false"){
                                        $this->ShowMsgC("操作错误(203)！");
                                    }else{
                                        $this->ShowMsgC("操作成功！", $this->a_url("", "YiJiaYicms", "AdminGroup", "group",'',array("id")));
                                    }
                        }
                        exit;
            }
        
        $admin_goup_row = $this->GetOne("select level,limits from `".PR."admin_group` where id=".admingroup." "); //当前管理员所具有的权限
                
        $row = $this->GetOne("select * from `".PR."admin_group` where md5(md5(id))='".md5($id)."' ");
        $this->assign($row);
        $i=1;
        if(!empty($row)){
          $i=$row["level"]; 
        }
        if($admin_goup_row){
          $i = $admin_goup_row["level"];   
        }
        for($i;$i<=50;$i++){
            if(!empty($row) && $row["level"] == $i){
                $sss = ' selected="selected"';
            }else{
                $sss = "";
            }
            if($row["level"] != $i &&  $this->GetOne("select id from `".PR."admin_group` where level=$i ")){
                $sss .=' disabled="disabled" style="color:#ccc;"';
            }
            $option_str .= '<option '.$sss.'  value="'.$i.'">'.$i.'</option>';
        }
        
        
        if(!$id){
            $action="add";
            $title = " - 添加";
        }else{
            $title = " - 修改";
            $action="edit";
        }
        if($row){
            $update_data = explode(",",$row["limits"]);
        }else{
            $update_data="";
        }
        
        
        
        if(admingroup ==1 || sys=="true"){
            $add_data = 1;
        }else{
            $add_data = explode(",",$admin_goup_row["limits"]);
        }
        
        
        $str = $this->Get_Level(1,0,$add_data,$update_data);
        //$str2 = $this->Get_Level(2,0,$add_data,$update_data);
        //$str3 = $this->Get_Level(3,0,$add_data,$update_data);
        
        $this->assign(array('str'=>$str,'str2'=>$str2,'str3'=>$str3,'_title'=>$title,'action'=>$action,'option_str'=>$option_str));
        
        
        $this->veiws("AdminGroup","group_addup"); 
    }
    
    public function Get_Level($site=1,$pid=0,$add_data,$update_data){
        $result = $this->query("select * from `".PR."admin_menu` where ".sql_true." and site=$site and pid=$pid  order by id asc,orderid asc");
        $str ="";
        foreach($result as $key=>$v){
            $pid2 = $v["id"];
            $arr = explode(',',$v['motion']);
            $motion_str ='';
            $m = $v["m"];
            $c = $v["c"];
            $mtr = $v["mtr"];
            $method = $v["method"];
            if(!empty($mtr) && !empty($update_data) && in_array($m."_".$c.$mtr,$update_data)){
                    $checked1 =' checked="checked"';  
            }else{
                    $checked1 =""; 
            }
            
            //Admin_Index,Admin_Index_index,Fadyw_Member,Fadyw_Member_index,Fadyw_Member_Look,Fadyw_Member,Fadyw_Fiance,Fadyw_Fiance_index,Fadyw_Member
            if($add_data ==1 || (!empty($add_data) && in_array($m."_".$c.$mtr,$add_data))){
                
                    foreach($arr as $key2=>$v2){
                        if($add_data ==1 || in_array($m."_".$c.'_'.$v2,$add_data)){
                          
                                if(!empty($v2)){
                                    if(!empty($update_data) && in_array($m."_".$c.'_'.$v2,$update_data)){
                                        $checked2 =' checked="checked"';
                                        if(!$mtr) $checked1 =' checked="checked"';
                                    }else{
                                        $checked2 =""; 
                                    }
                                    $title =  $this->get_Language($v2,$method);
                                    $motion_str .='<label><input type="checkbox" '.$checked2.' name="limits[]" value="'.$m."_".$c.'_'.$v2.'">'.$title.'</label>';
                                }  
                                
                        }
                    }
                    
                    
                    if($v["pid"] ==0){
                        $str .='<li><label class="title-qx"><input type="checkbox" '.$checked1.' name="limits[]" value="'.$m."_".$c.$mtr.'">'.$v["title_cn"].'</label>'.$motion_str.'</li>';
                        if($this->GetOne("select id  from `".PR."admin_menu` where ".sql_true." and site=$site and pid=$pid2 ")){
                            $str .='<li><ul class="sub-ul">'.$this->Get_Level($site,$pid2,$add_data,$update_data).'</ul></li>';
                        }
                    }else{
                        $str .='<li><label class="title-qx"><input '.$checked1.' type="checkbox" name="limits[]" value="'.$m."_".$c.$mtr.'">'.$v["title_cn"].'</label>'.$motion_str.'</li>'; 
                        if($this->GetOne("select id  from `".PR."admin_menu` where ".sql_true." and site=$site and pid=$pid2 ")){
                            $str .='<li><ul class="sub-ul">'.$this->Get_Level($site,$pid2,$add_data,$update_data).'</ul></li>';
                        }
                    }
                    
                    
           }//添加权限结束
          
           
        }
        return $str;
    }
    
    public function get_Language($key='',$method=''){
        $lang["index"] = '列表';
        $lang["column"] = '列表';
        $lang["group"] = '列表';
        $lang["type"] = '列表';
        
        
        $lang["EditPassword"] = '列表';
        $lang["look"] = '查看';
        $lang["EditCode"] = '列表';
        $lang["JSGetCity"] = '地区联动';
        
        
        $lang["add"] = '添加';
        $lang["edit"] = '修改';
        $lang["del"] = '删除';
        $lang["del2"] = '删除';
        $lang["check"] = '审核';
        
        
        
        $lang["is_switch"] = '启用禁用';
        $lang["is_switch2"] = '启用禁用';
        $lang["online"] = '上线下线';
        $lang["colse"] = '关闭';
        $lang["plun"] = '在线咨询';
        
        
        $lang["del_type"] = '删除';
        $lang["addup_type_add"] = '添加';
        $lang["addup_type_edit"] = '修改';
        
        $lang["group_addup_add"] = '添加';
        $lang["group_addup_edit"] = '修改';
        
        $lang["column_addup_add"] = '添加';
        $lang["column_addup_edit"] = '修改';
        $lang["show_position"] = '栏目显示位置';
        
        $lang["ajax_get_select"] = '联动筛选';
      
        $lang["display"] = '启/禁用';
        $lang["Look"] = '查看';
        $lang["dial"] = '处理';
        $lang["ajax_get_select"] = '联动';
        $lang["addup"] = '添加';
        $lang["checkinfo"] = '列表';

        $lang["kefu"] = '客服跟踪';

        
        $lang["loginput"] = '登录';
        
        if($method){
            return  $lang[$method][$key];
        }else{
            return $lang[$key];
        }
         
    }
    
}

