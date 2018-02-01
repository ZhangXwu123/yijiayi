<?php

/* 产品
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YiJiaYicms\Controller;
use Think\Controller;
class MemberController extends CommonController{
 
    public function __construct() {
        parent::__construct();
    }
    public function index(){
            $keyworld  = I("keyworld","");
            $sql       = "";
            if(!empty($keyworld)){
                  $sql = " and username like '%$keyworld%' ";  
            }
            $str ='';
            $url1 = $this->a_url("","YiJiaYicms","Member","is_switch",'',array("id","if"));
            $url2 = $this->a_url("","YiJiaYicms","Member","addup","",array("id","if"));
            $url3 = $this->a_url("","YiJiaYicms","Member","del","",array("id","if"));
            $reuslt = $this->GetPage("select * from `".PR."member` where ".sql_tf." $sql order by id desc ",20);
            foreach($reuslt as $key=>$v){
                        $str .='<tr>'; 
                        $str .='<td>'.$v["id"].'</td>'; 
                        $str .='<td  style="text-align: left; padding: 15px;">'.$v["username"].'</td>'; 
                        $str .='<td style="text-align: left; padding: 15px;">'.$v["mobile"].'</td>'; 
                        if($v["sex"]==1) $sex="男"; else $sex="女";
                        $str .='<td>'.$sex.'</td>';
                        $str .='<td>'.date("Y-m-d",$v["logintime"]).'</td>'; 
                        $str .='<td>'.$v["loginip"].'</td>'; 
                        $str .='<td>'.date("Y-m-d",$v["addtime"]).'</td>'; 

                        $butt ="";
                        if($v["switch"]=="true"){
                             $butt .='<a href="'.$url1.'&if=false&id='.md5($v["id"]).'">禁用</a>';
                         }else{
                             $butt .='<a href="'.$url1.'&if=true&id='.md5($v["id"]).'">启用</a>';
                         }
                        $butt .='<a href="'.$url2.'&id='.md5($v["id"]).'">修改</a>';   
                        $butt .='<a onclick="confirms(\'确定要删除吗？\',\''.$url3.'&id='.md5($v["id"]).'\')">删除</a>';   
                        $str .='<td class="action-butt">'.$butt.'</td>'; 
                        $str .='</tr>'; 
           }
           $title ="用户管理";
           $this->assign(array("ctitle"=>$title,'keyworld'=> $keyworld,"str"=>$str));
           $this->veiws("Member","index"); 
    }
    public function addup(){
        $id     = !empty($this->g_id)?$this->g_id:"";
        $action = !empty($this->p_action)?$this->p_action:"";
        $upload = I("upload","");
        
        if($action && ($action == "add" || $action == "edit")){
                    $username       = I("username","");
                    $mobile         = I("mobile","");
                    $password       = I("password","");
                    $sex            = I("sex","");
                    $id             = $this->p_id;
                    
                    if(!$id){
                        $this->ShowMsgC("操作错误(212)！");
                    }
                    if(!$username){
                            $this->ShowMsgC("请输入用户姓名！");
                    }
                    if(!$mobile){
                            $this->ShowMsgC("请输入用户手机号！");
                    }
                    if(!$this->mobile($mobile)){
                            $this->ShowMsgC("输入的手机号码有误！");
                    }
                    if($this->GetOne("select id from `".PR."member` where ".sql_true." and id!=$id and md5(username)='".md5($username)."'")){
                            $this->ShowMsgC("用户名已被注册，请重新输入！");
                    }
                    if($result=  $this->GetOne("select id from `".PR."member` where  ".sql_true." and id!=$id and md5(mobile)='".md5($mobile)."'")){
                            $this->ShowMsgC("手机号已注册，请重新输入！"); 
                    }
                    if(!empty($password)){
                            if(strlen($password)<6 || strlen($password)>20){
                                $this->ShowMsgC("密码的长度为6-20字符！"); 
                            }
                            $password =md5(md5($password));
                            $sql=",password='$password'";
                    }else{
                            $sql="";
                    }
                    if($action == "edit"){
                                $this->level(2,"edit");//权限判断
                                $result = $this->query("update `".PR."member` set username='$username' $sql,sex='$sex',mobile='$mobile',uptime='".thistime."',upadmin='".adminid."' where id = $id ");
                                if($result == "false"){
                                        $this->ShowMsgC("操作错误(203)！");
                                }else{
                                        $this->ShowMsgC("操作成功！", $this->a_url("", "YiJiaYicms", "Member", "index",'',array("id")));
                                }
                    }
                    exit;
        }
        
        $row = $this->GetOne("select * from `".PR."member` where md5(md5(id))='".md5($id)."' ");
        $this->assign($row);
        
        $title = " - 修改";
        $action="edit";
        $this->assign(array('ctitle'=>"用户管理".$title,'action'=>$action,'type_Str'=>$type_Str));
        $this->veiws("Member","addup");  
        
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
                        if($this->GetOne("select id from `".PR."member` where md5(md5(id))='".md5($id)."' ")){
                                    $result = $this->query("update `".PR."member` set $is_switch where md5(id) = '".$id."' ");
                                    if(!(string)$result){
                                            $this->ShowMsgC("操作失败(2)！"); 
                                    }else{
                                            $this->ShowMsgC("",$this->a_url("","YiJiaYicms","Member","index",'',array("id","if")));
                                    }
                        }
            }
    }
        
    public function del(){
            $id = !empty($this->g_id)?$this->g_id:"";
            if(empty($id)){
                $this->ShowMsgC("操作失败(1)！"); 
            }else{
                if($this->GetOne("select id from `".PR."member` where md5(md5(id))='".md5($id)."' ")){
                            $result = $this->query("update `".PR."member` set switch='del',deltime='".thistime."',deladmin='".adminid."' where md5(id) = '".$id."' ");
                            if(!(string)$result){
                                    $this->ShowMsgC("操作失败(2)！"); 
                            }else{
                                    $this->ShowMsgC("删除成功！",$this->a_url("","YiJiaYicms","Member","index","","",1));
                            }
                }
            }
    }

}

