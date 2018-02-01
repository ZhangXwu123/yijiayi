<?php

/* 友情链接
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YiJiaYicms\Controller;
use Think\Controller;
class LinkController extends CommonController{
 
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
            $url1 = $this->a_url("","YiJiaYicms","Link","is_switch",'',array("id","if"));
            $url2 = $this->a_url("","YiJiaYicms","Link","addup","",array("id","if"));
            $url3 = $this->a_url("","YiJiaYicms","Link","del","",array("id","if"));
            $reuslt = $this->GetPage("select * from `".PR."link` where ".sql_tf." $sql order by orderid  asc ",20);
            foreach($reuslt as $key=>$v){
                        $str .='<tr>'; 
                        if($v["type"] ==1){
                            $type_t = "<span class='green'> 文字类型 </span>";
                            $title_t = '<a target="_blank" href="'.$v["url"].'"> '.$v["title"].' </a>';
                        }else{
                            $type_t = "<span class='green'> logo图片类型 </span>";
                            $title_t = '<a target="_blank" href="'.$v["url"].'"> <img src="__ROOT__'.$v["pic"].'" style="width:150px; height:80px; border:1px solid #ccc; margin:2px;padding:1px;"> </a>';
                        }
                        $str .='<td title="'.$v["title"].'" style="text-align: left; padding: 15px;">'.$title_t.'</td>'; 
                        $str .='<td>'.$type_t.'</td>'; 
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
           $this->a_url("add_url", "YiJiaYicms", "Link", "addup",'','',1);
           $title ="友情链接管理";
           $this->assign(array("ctitle"=>$title,'keyworld'=> $keyworld,"str"=>$str));
           $this->veiws("Link","index"); 
    }
    public function addup(){
        $id     = !empty($this->g_id)?$this->g_id:"";
        $action = !empty($this->p_action)?$this->p_action:"";
        $upload = I("upload","");
        
        if($action && ($action == "add" || $action == "edit")){
                    $title              = trim(I("title",""));
                    $type               = $this->p_type;
                    $pic                = $this->p_pic;
                    $url                = $this->p_url;
                    $orderid            = !empty(I("orderid"))?I("orderid"):0;
                    if(!$type || ($type !=1 && $type !=2 )){
                            $this->ShowMsgC("请选择友情链接类型！");
                    }
                    if($type ==1 && !$title){
                            $this->ShowMsgC("请输入链 接 名 称！");
                    }
                    if($type ==2 && !$pic){
                            $this->ShowMsgC("请上传友情链接logo图片！");
                    }

                    if($action == "edit"){
                                $id = $this->p_id;
                                $this->level(2,"edit");//权限判断
                                if(!$id){
                                    $this->ShowMsgC("操作错误(212)！");
                                }
                                $result = $this->query("update `".PR."link` set title='$title',type='$type',url='$url',pic='$pic',orderid='$orderid',uptime='".thistime."',upadmin='".adminid."' where id = $id ");
                                if($result == "false"){
                                        $this->ShowMsgC("操作错误(203)！");
                                }else{
                                        $this->ShowMsgC("操作成功！", $this->a_url("", "YiJiaYicms", "Link", "index",'',array("id")));
                                }
                    }else{

                                $sql = "($type,'$title','$pic','$url',$orderid,'true',".thistime.",".adminid.")";
                                $result = $this->query("insert into`".PR."link`(type,title,pic,url,orderid,switch,addtime,addadmin) values $sql");
                                if($result == "false"){
                                        $this->ShowMsgC("操作错误(203)！");
                                }else{
                                        $this->ShowMsgC("操作成功！", $this->a_url("", "YiJiaYicms", "Link", "index",'',array("id")));
                                }
                    }
                    exit;
        }
        
        if ($upload == 1 && !empty($_FILES)) { //上传
                    $result = $this->uplodes($_FILES, date("YmdHis",thistime).$this->getRandChar(2),0, 220, 80, 'JCHK/'.date("Y",thistime)."/".date("Ymd",thistime));
                    if ($result[0] > 0) {
                            exit(json_encode(array("error" => 1, "errortxt" => $result[1])));
                    }
                    exit(json_encode(array("error" => 0, "picurl" => $result[2])));
        }
        
        $row = $this->GetOne("select * from `".PR."link` where md5(md5(id))='".md5($id)."' ");
        $this->assign($row);
        
        if(!$id){
                $action="add";
                $title = " - 添加";
        }else{
                $title = " - 修改";
                $action="edit";
        }
        $this->assign(array('ctitle'=>"友情链接管理".$title,'action'=>$action));
        $this->veiws("Link","addup");  
        
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
                        if($this->GetOne("select id from `".PR."link` where md5(md5(id))='".md5($id)."' ")){
                                    $result = $this->query("update `".PR."link` set $is_switch where md5(id) = '".$id."' ");
                                    if(!(string)$result){
                                            $this->ShowMsgC("操作失败(2)！"); 
                                    }else{
                                            $this->ShowMsgC("",$this->a_url("","YiJiaYicms","Link","index",'',array("id","if")));
                                    }
                        }
            }
    }
        
    public function del(){
            $id = !empty($this->g_id)?$this->g_id:"";
            if(empty($id)){
                $this->ShowMsgC("操作失败(1)！"); 
            }else{
                if($this->GetOne("select id from `".PR."link` where md5(md5(id))='".md5($id)."' ")){
                            $result = $this->query("update `".PR."link` set switch='del',deltime='".thistime."',deladmin='".adminid."' where md5(id) = '".$id."' ");
                            if(!(string)$result){
                                    $this->ShowMsgC("操作失败(2)！"); 
                            }else{
                                    $this->ShowMsgC("删除成功！",$this->a_url("","YiJiaYicms","Link","index","","",1));
                            }
                }
            }
    }

}

