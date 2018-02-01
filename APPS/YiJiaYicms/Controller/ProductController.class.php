<?php

/* 产品
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YiJiaYicms\Controller;
use Think\Controller;
class ProductController extends CommonController{
 
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
            $url1 = $this->a_url("","YiJiaYicms","Product","is_switch",'',array("id","if"));
            $url2 = $this->a_url("","YiJiaYicms","Product","addup","",array("id","if"));
            $url3 = $this->a_url("","YiJiaYicms","Product","del","",array("id","if"));
            $reuslt = $this->GetPage("select * from `".PR."product` where ".sql_tf." $sql order by orderid  asc ",20);
            foreach($reuslt as $key=>$v){
                        $str .='<tr>'; 
                        $str .='<td><img src="__ROOT__'.$v["pic"].'" style="width:80px; height:80px; border:1px solid #ccc; "></td>'; 
                        $str .='<td title="'.$v["title"].'" style="text-align: left; padding: 15px;">'.$v["title"].'</td>'; 
                        $type_name=  $this->GetOne("select title from `".PR."product_type` where id=".$v["type"]." ");
                        $str .='<td style="text-align: left; padding: 15px;">'.$type_name["title"].'</td>'; 
                        $str .='<td style="text-align: left; padding: 15px;">'.  $this->mb_str($v["description"],35).'</td>'; 
                        $str .='<td>'.$v["hits"].'</td>'; 
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
           $this->a_url("add_url", "YiJiaYicms", "Product", "addup",'','',1);
           $title ="产品管理";
           $this->assign(array("ctitle"=>$title,'keyworld'=> $keyworld,"str"=>$str));
           $this->veiws("Product","index"); 
    }
    public function addup(){
        $id     = !empty($this->g_id)?$this->g_id:"";
        $action = !empty($this->p_action)?$this->p_action:"";
        $upload = I("upload","");
        
        if($action && ($action == "add" || $action == "edit")){
                    $title              = trim(I("title",""));
                    $type               = $this->p_type;
                    $description        = $this->p_description;
                    $content            = I("content","");
                    $pic                = $this->p_pic;
                    $pic_arr            = I("pic_arr", "");
                    $orderid            = !empty(I("orderid"))?I("orderid"):0;
                    if(!$title){
                            $this->ShowMsgC("请输入产品名称！");
                    }
                    if(empty($type))  $this->ShowMsgC("请选择产品分类！");
                    
                    
                    if(!empty($pic_arr)){
                            $pic_arr = join("|", $pic_arr); 
                    }else{
                            $pic_arr = "";
                    }

                    if($action == "edit"){
                                $id = $this->p_id;
                                $this->level(2,"edit");//权限判断
                                if(!$id){
                                    $this->ShowMsgC("操作错误(212)！");
                                }
                                $result = $this->query("update `".PR."product` set title='$title',type='$type',description='$description',content='$content',pic='$pic',pic_arr='$pic_arr',orderid='$orderid',uptime='".thistime."',upadmin='".adminid."' where id = $id ");
                                if($result == "false"){
                                        $this->ShowMsgC("操作错误(203)！");
                                }else{
                                        $this->ShowMsgC("操作成功！", $this->a_url("", "YiJiaYicms", "Product", "index",'',array("id")));
                                }
                    }else{

                                $sql = "($type,'$title','$description','$content','$pic','$pic_arr',$orderid,'true',".thistime.",".adminid.")";
                                $result = $this->query("insert into`".PR."product`(type,title,description,content,pic,pic_arr,orderid,switch,addtime,addadmin) values $sql");
                                if($result == "false"){
                                        $this->ShowMsgC("操作错误(203)！");
                                }else{
                                        $this->ShowMsgC("操作成功！", $this->a_url("", "YiJiaYicms", "Product", "index",'',array("id")));
                                }
                    }
                    exit;
        }
        
         if ($upload == 1 && !empty($_FILES)) { //上传
                    $result = $this->uplodes($_FILES, date("YmdHis",thistime).$this->getRandChar(2),0, 0, 0, 'JCHK/Product');
                    if ($result[0] > 0) {
                            exit(json_encode(array("error" => 1, "errortxt" => $result[1])));
                    }
                    exit(json_encode(array("error" => 0, "picurl" => $result[2],"type"=>$this->p_type)));
        }
        
        
        $row = $this->GetOne("select * from `".PR."product` where md5(md5(id))='".md5($id)."' ");
        $this->assign($row);
        
        $type_row =  $this->query("select * from `".PR."product_type` where ".sql_true." ");
        
        
        foreach($type_row as $key=>$v){
               if(!empty($row["type"]) && $row["type"] == $v["id"]){
                        $check = ' selected="selected" ';
               }else{
                        $check = '';
               }
               $type_Str .= '<option '.$check.' value="'.$v["id"].'">'.$v["title"].'</option>'; 
        }
        
        if(!$id){
                $action="add";
                $title = " - 添加";
        }else{
                $title = " - 修改";
                $action="edit";
        }
        $this->assign(array('ctitle'=>"产品管理".$title,'action'=>$action,'type_Str'=>$type_Str));
        $this->veiws("Product","addup");  
        
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
                        if($this->GetOne("select id from `".PR."product` where md5(md5(id))='".md5($id)."' ")){
                                    $result = $this->query("update `".PR."product` set $is_switch where md5(id) = '".$id."' ");
                                    if(!(string)$result){
                                            $this->ShowMsgC("操作失败(2)！"); 
                                    }else{
                                            $this->ShowMsgC("",$this->a_url("","YiJiaYicms","Product","index",'',array("id","if")));
                                    }
                        }
            }
    }
        
    public function del(){
            $id = !empty($this->g_id)?$this->g_id:"";
            if(empty($id)){
                $this->ShowMsgC("操作失败(1)！"); 
            }else{
                if($this->GetOne("select id from `".PR."product` where md5(md5(id))='".md5($id)."' ")){
                            $result = $this->query("update `".PR."product` set switch='del',deltime='".thistime."',deladmin='".adminid."' where md5(id) = '".$id."' ");
                            if(!(string)$result){
                                    $this->ShowMsgC("操作失败(2)！"); 
                            }else{
                                    $this->ShowMsgC("删除成功！",$this->a_url("","YiJiaYicms","Product","index","","",1));
                            }
                }
            }
    }

}

