<?php

/* 广告模块
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YiJiaYicms\Controller;
use Think\Controller;
class AdvertisController extends CommonController{
 
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
         $url1 = $this->a_url("","YiJiaYicms","Advertis","is_switch","",array("id","if"));
         $url2 = $this->a_url("","YiJiaYicms","Advertis","addup","",array("id","if"));
         $url3 = $this->a_url("","YiJiaYicms","Advertis","del","",array("id","if"));
         $reuslt = $this->GetPage("select * from `".PR."ad` where ".sql_tf." $sql order by addtime desc, orderid  asc,colunmid asc ",20);
         foreach($reuslt as $key=>$v){
                        $str .='<tr>'; 
                        $type_t = $this->GetOne("select * from `".PR."ad_type` where id= ".$v["type"]." ");
                        $str .='<td title="'.$v["title"].'" style="text-align: left; padding: 15px;"><a target="_blank" href="'.$v["url"].'"> <img src="__ROOT__'.$v["pic"].'" style="width:60px; height:60px; border:1px solid #ccc; margin:2px; padding:1px;"> </a></td>';  
                        $str .='<td style="text-align: left; padding: 15px;">'.$type_t["title"]." [".$type_t["id"]."]".'</td>'; 
                        $str .='<td style="text-align: left; padding: 15px;">'.$v["title"].'</td>'; 
                        $colunmResult   = $this->GetOne("select title from `".PR."column` where id=".$v["colunmid"]." ");
                        $siteResult     = $this->GetOne("select site from `".PR."site` where id=".$v["siteid"]." ");
                        if(!empty($colunmResult))   $colunmStr= $colunmResult["title"]; else $colunmStr='栏目未设置';
                        if(!empty($siteResult))     $siteStr= $siteResult["site"]; else $siteStr='站点未设置';
                        $str .='<td style="text-align: left; padding: 15px;"> [ 站点'.$siteStr.' ] * '.$colunmStr.'</td>'; 
                        
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
         
        $this->a_url("add_url", "YiJiaYicms", "Advertis", "addup",'','',1);
        $title ="广告管理";
        $this->assign(array("ctitle"=>$title,'keyworld'=> $keyworld,"str"=>$str));
        $this->veiws("Advertis","index"); 
    }
    public function addup(){
        $id     = !empty($this->g_id)?$this->g_id:"";
        $action = !empty($this->p_action)?$this->p_action:"";
        $upload = I("upload","");
        
        if($action && ($action == "add" || $action == "edit")){
                    $title              = trim(I("title",""));
                    $type               = $this->p_type;
                    $colunmid           = $this->p_colunmid;
                    $siteid             = $this->p_siteid;
                    $pic                = $this->p_pic;
                    $url                = $this->p_url;
                    $orderid            = !empty(I("orderid"))?I("orderid"):0;
                    if(!$type){
                            $this->ShowMsgC("请设置广告投放范围！");
                    }
                    $colunmid = empty($colunmid)?0:$colunmid;
                    $siteid =   empty($siteid)?0:$siteid;
                    
                    if(!$title){
                            $this->ShowMsgC("请输入广 告 标 题！");
                    }

                    if(!$pic){
                            $this->ShowMsgC("请上传广告图片！");
                    }

                    if($orderid && !is_numeric($orderid)){
                            $this->ShowMsgC("请输入数字型排序序号！");
                    }

                    if($action == "edit"){
                                $id = $this->p_id;
                                $this->level(2,"edit");//权限判断

                                if(!$id){
                                    $this->ShowMsgC("操作错误(212)！");
                                }
                                
                                $result = $this->query("update `".PR."ad` set title='$title',type='$type',colunmid='$colunmid',siteid='$siteid',url='$url',pic='$pic',orderid='$orderid',uptime='".thistime."',upadmin='".adminid."' where id = $id ");
                                
                                if($result == "false"){
                                    $this->ShowMsgC("操作错误(203)！");
                                }else{
                                    $this->ShowMsgC("操作成功！", $this->a_url("", "YiJiaYicms", "Advertis", "index",'',array("id")));
                                }
                    }else{
                                $sql = "($type,$colunmid,$siteid,'$title','$pic','$url',$orderid,'true',".thistime.",".adminid.")";
                                $result = $this->query("insert into`".PR."ad`(type,colunmid,siteid,title,pic,url,orderid,switch,addtime,addadmin) values $sql");
                                if($result == "false"){
                                    $this->ShowMsgC("操作错误(203)！");
                                }else{
                                    $this->ShowMsgC("操作成功！", $this->a_url("", "YiJiaYicms", "Advertis", "index",'',array("id")));
                                }
                    }
                    exit;
        }
        
        if ($upload == 1 && !empty($_FILES)) { //上传
                    $result = $this->uplodes($_FILES, date("YmdHis",thistime).$this->getRandChar(2),0, 220, 80, 'YiJiaYi/'.date("Y",thistime)."/".date("Ymd",thistime));
                    if ($result[0] > 0) {
                            exit(json_encode(array("error" => 1, "errortxt" => $result[1])));
                    }
                    exit(json_encode(array("error" => 0, "picurl" => $result[2])));
        }
        
        $row = $this->GetOne("select * from `".PR."ad` where md5(md5(id))='".md5($id)."' ");
        $this->assign($row);
                
        $type_row =$this->query("select * from `".PR."ad_type` where ".sql_true." order by orderid asc ");
        $option_str="";
        foreach($type_row as $key=>$v){
                if($row["type"] == $v["id"]){
                    $select = ' selected ="selected " ';
                }else{
                    $select = '';
                }
                $option_str .= '<option '.$select.' value="'.$v["id"].'">'.$v["title"].'</option>';
        }
        
        $siteResult = $this->query("select * from `".PR."site` ");
        $type_row =$this->column2();
        
        if(!$id){
                $action="add";
                $title = " - 添加";
        }else{
                $title = " - 修改";
                $action="edit";
        }
        $this->assign(array('option_str'=>$option_str,'ctitle'=>"广告管理".$title,'action'=>$action,'type_row'=>$type_row,'siteResult'=>$siteResult));
        $this->veiws("Advertis","addup");  
        
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
                        if($this->GetOne("select id from `".PR."ad` where md5(md5(id))='".md5($id)."' ")){
                                    $result = $this->query("update `".PR."ad` set $is_switch where md5(id) = '".$id."' ");
                                    if(!(string)$result){
                                            $this->ShowMsgC("操作失败(2)！"); 
                                    }else{
                                            $this->ShowMsgC("",$this->a_url("","YiJiaYicms","Advertis","index",'',array("id","if")));
                                    }
                        }
            }
    }
        
    public function del(){
            $id = !empty($this->g_id)?$this->g_id:"";
            if(empty($id)){
                $this->ShowMsgC("操作失败(1)！"); 
            }else{
                if($this->GetOne("select id from `".PR."ad` where md5(md5(id))='".md5($id)."' ")){
                            $result = $this->query("update `".PR."ad` set switch='del',deltime='".thistime."',deladmin='".adminid."' where md5(id) = '".$id."' ");
                            if(!(string)$result){
                                    $this->ShowMsgC("操作失败(2)！"); 
                            }else{
                                    $this->ShowMsgC("删除成功！",$this->a_url("","YiJiaYicms","Advertis","index","","",1));
                            }
                }
            }
    }
    
    
}