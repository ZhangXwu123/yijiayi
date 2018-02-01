<?php

/* 招聘
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YiJiaYicms\Controller;
use Think\Controller;
class ZhaoPinController extends CommonController{
 
    public function __construct() {
        parent::__construct();
    }
    public function index(){
            $keyworld  = I("keyworld","");
            $sql       = "";
            if(!empty($keyworld)){
                  $sql = " and title like '%$keyworld%' ";  
            }
            $str ='';
            $url1 = $this->a_url("","YiJiaYicms","ZhaoPin","is_switch",'',array("id","if"));
            $url2 = $this->a_url("","YiJiaYicms","ZhaoPin","addup","",array("id","if"));
            $url3 = $this->a_url("","YiJiaYicms","ZhaoPin","del","",array("id","if"));
            $reuslt = $this->GetPage("select * from `".PR."zhaopin` where ".sql_tf." $sql order by orderid  asc ",20);
            foreach($reuslt as $key=>$v){
                        $str .='<tr>'; 
                        $str .='<td title="'.$v["title"].'" style="text-align: left; padding: 15px;">'.$v["title"].'</td>'; 
                        $str .='<td>'.$v["type"].'</td>'; 
                        $str .='<td style="text-align: left; padding: 15px;">'.  $this->mb_str($v["description"],32).'</td>'; 
                        $str .='<td>'.date("Y-m-d",$v["fbtime"]).'</td>'; 
                        $str .='<td>'.$v["orderid"].'</td>'; 
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
           $this->a_url("add_url", "YiJiaYicms", "ZhaoPin", "addup",'','',1);
           $title ="招聘管理";
           $this->assign(array("ctitle"=>$title,'keyworld'=> $keyworld,"str"=>$str));
           $this->veiws("ZhaoPin","index"); 
    }
    public function addup(){
        $id     = !empty($this->g_id)?$this->g_id:"";
        $action = !empty($this->p_action)?$this->p_action:"";
    
        
        if($action && ($action == "add" || $action == "edit")){
                    $title              = trim(I("title",""));
                    $type               = $this->p_type;
                    $description        = I("description","");
                    $content            = I("content","");
                    $fbtime             = $this->p_fbtime;
                    $orderid            = !empty(I("orderid"))?I("orderid"):0;
                    if(!$title){
                            $this->ShowMsgC("请输入职位名称！");
                    }
                    if(!empty($fbtime)){
                        $fbtime = strtotime($fbtime);
                    }else{
                        $fbtime = thistime;
                    } 
                    if($action == "edit"){
                                $id = $this->p_id;
                                $this->level(2,"edit");//权限判断
                                if(!$id){
                                    $this->ShowMsgC("操作错误(212)！");
                                }
                                $result = $this->query("update `".PR."zhaopin` set title='$title',type='$type',description='$description',content='$content',fbtime='$fbtime',orderid='$orderid',uptime='".thistime."',upadmin='".adminid."' where id = $id ");
                                if($result == "false"){
                                        $this->ShowMsgC("操作错误(203)！");
                                }else{
                                        $this->ShowMsgC("操作成功！", $this->a_url("", "YiJiaYicms", "ZhaoPin", "index",'',array("id")));
                                }
                    }else{

                                $sql = "('$title','$type','$description','$content',$fbtime,'true',".thistime.",".adminid.",$orderid)";
                                $result = $this->query("insert into`".PR."zhaopin`(title,type,description,content,fbtime,switch,addtime,addadmin,orderid) values $sql");
                                if($result == "false"){
                                        $this->ShowMsgC("操作错误(203)！");
                                }else{
                                        $this->ShowMsgC("操作成功！", $this->a_url("", "YiJiaYicms", "ZhaoPin", "index",'',array("id")));
                                }
                    }
                    exit;
        }
        
        
        $row = $this->GetOne("select * from `".PR."zhaopin` where md5(md5(id))='".md5($id)."' ");
        $this->assign($row);
        
        if(!$id){
                $action="add";
                $title = " - 添加";
        }else{
                $title = " - 修改";
                $action="edit";
        }
        $this->assign(array('ctitle'=>"添加招聘信息".$title,'action'=>$action));
        $this->veiws("ZhaoPin","addup");  
        
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
                        if($this->GetOne("select id from `".PR."zhaopin` where md5(md5(id))='".md5($id)."' ")){
                                    $result = $this->query("update `".PR."zhaopin` set $is_switch where md5(id) = '".$id."' ");
                                    if(!(string)$result){
                                            $this->ShowMsgC("操作失败(2)！"); 
                                    }else{
                                            $this->ShowMsgC("",$this->a_url("","YiJiaYicms","ZhaoPin","index",'',array("id","if")));
                                    }
                        }
            }
    }
        
    public function del(){
            $id = !empty($this->g_id)?$this->g_id:"";
            if(empty($id)){
                $this->ShowMsgC("操作失败(1)！"); 
            }else{
                if($this->GetOne("select id from `".PR."zhaopin` where md5(md5(id))='".md5($id)."' ")){
                            $result = $this->query("update `".PR."zhaopin` set switch='del',deltime='".thistime."',deladmin='".adminid."' where md5(id) = '".$id."' ");
                            if(!(string)$result){
                                    $this->ShowMsgC("操作失败(2)！"); 
                            }else{
                                    $this->ShowMsgC("删除成功！",$this->a_url("","YiJiaYicms","ZhaoPin","index","","",1));
                            }
                }
            }
    }

}

