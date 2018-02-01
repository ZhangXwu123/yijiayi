<?php

/* 栏目管理
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YiJiaYicms\Controller;
use Think\Controller;


class ColumnController extends CommonController{
    
    public function __construct() {
        parent::__construct();
    }
   
    public function  index(){
                $keyworld = I("keyworld","");
                $coloumid = !empty($this->g_coloumid)?$this->g_coloumid:"";
                $sql = "";
                if(!empty($keyworld)){
                           $sql .=" and title like '%$keyworld%'";   
                }
                if($coloumid){
                          $sql .=" and column_id = $coloumid ";     
                }
                
                
                $reuslt = $this->GetPage("select * from `".PR."column_list` where ".sql_tf." $sql order by addtime desc ",20);
                $str ='';
                $url1 = $this->a_url("","YiJiaYicms","Column","is_switch2","",array("id","if"));
                $url2 = $this->a_url("","YiJiaYicms","Column","addup","",array("id","if"));
                $url3 = $this->a_url("","YiJiaYicms","Column","del2","",array("id","if"));
                foreach($reuslt as $key=>$v){
                            $str .='<tr>'; 
                            $str .='<td>'.$v["id"].'</td>';
                            $str .='<td><img src="__ROOT__'.$v["pic"].'" style="width:60px; height:60px; border:1px solid #ccc; padding:1px; margin:1px;" /></td>'; 
                            $flag_span="";
                            if(!empty($v["flag"])){
                                        $flag_arr = explode(",",$v["flag"]);
                                        if(in_array(1,$flag_arr)){
                                                $flag_span .=' <span class="green">置顶[1]</span> ';  
                                        }
                                        if(in_array(2,$flag_arr)){
                                                $flag_span .=' <span class="green">特荐[1]</span> ';    
                                        }
                                        if(in_array(3,$flag_arr)){
                                                $flag_span .=' <span class="green">推荐[1]</span> ';    
                                        }
                            }
                            if($v["ismb"]==1) $ismb=' <b class="red">[会员可读]</b> '; else $ismb='';
                            
                            $str .='<td title="'.$v["title"].'" style="text-align: left; padding-left:10px;">'.str_replace("$keyworld","<span class='red'>$keyworld</span>",$v["title"])."  ".$flag_span.$ismb.'</td>'; 

                            $lanmu = $this->GetOne("select title from `".PR."column` where  id=".$v["column_id"]." ");
                            $str .='<td>'.$lanmu["title"].'</td>'; 

                            $str .='<td>'.$v["author"].'</td>'; 
                            $str .='<td style="text-align: left; padding-left:10px;">'.$this->mb_str($v["description"],30).'</td>'; 

                            $str .='<td>'.$v["orderid"].'</td>'; 
                            if($v["is_status"]==1){
                                    $fabu = '<span class="green">是</span>';
                            }else{
                                    $fabu = '<span class="green">否</span>'; 
                            }
                            $str .='<td>'.$fabu.'</td>'; 
                            if(empty($v["uptime"])){
                                    $genxingtime =date("Y-m-d",$v["addtime"]); 
                            }else{
                                    $genxingtime =date("Y-m-d",$v["uptime"]);  
                            }
                            $str .='<td>'.$genxingtime.'</td>'; 


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
                
                $columStr = "";
                $column_reuslt = $this->query("select * from `".PR."column` where ".sql_true." and attr=2 ");
                foreach($column_reuslt as $key=>$v){
                        if($coloumid == $v["id"]){
                                $check = ' selected="selected"';
                        }else{
                                $check = '';
                        }
                        $columStr .='<option '.$check.' value="'.$v["id"].'">'.$v["title"].'</option>';
                }
                $this->a_url("add_url", "YiJiaYicms", "Column", "addup",'','',1);
                $title ="栏目管理列表";
                $this->assign(array("ctitle"=>$title,'keyworld'=> $keyworld,"str"=>$str,'columStr'=>$columStr));
                $this->veiws("Column","index"); 
    }
    
    public function addup(){
                $id     = !empty($this->g_id)?$this->g_id:"";
                $action = !empty($this->p_action)?$this->p_action:"";
                $upload = I("upload","");

                if ($action && ($action == "add" || $action == "edit")) {
                            $data["title"]          = $this->p_title;
                            $data["column_id"]      = $this->p_column_id;
                            $flag                   = I("flag","");
                            $data["source"]         = $this->p_source;
                            $data["author"]         = $this->p_author;
                            $data["url"]            = $this->p_url;
                            $data["description"]    = $this->p_description;
                            $data["content"]        = I("content", "");
                            $data["pic"]            = $this->p_pic;
                            $pic_arr                = I("pic_arr", "");
                            $data["orderid"]        = $this->p_orderid;
                            $data["is_status"]      = $this->p_is_status;
                            $data["ismb"]      = $this->p_ismb;

                            if(!$data["title"]){
                                    $this->ShowMsgC("请输入文章标题！");
                            }
                            if(!$data["column_id"]){
                                    $this->ShowMsgC("请选择文章相对应的栏目类型！");
                            }
                            if(!empty($flag)){
                                    $data["flag"] = join(",",$flag);    
                            }else{
                                    $data["flag"] = "";
                            }
                            if(!empty($pic_arr)){
                                    $data["pic_arr"] = join("|", $pic_arr); 
                            }else{
                                    $data["pic_arr"] = "";
                            }

                            if ($action == "edit") {
                                    $this->level(2,"edit");//权限判断
                                    $id  =$this->p_id;
                                    if (!$id) {
                                            $this->ShowMsgC("操作错误(212)！");
                                    }
                                    //该产品是否已使用
                                    $data["uptime"] = time();
                                    $data["upadmin"] = adminid;
                                    if (M("column_list")->where(" md5(id) = '" . md5($id) . "' ")->save($data)) {
                                            $this->ShowMsgC("操作成功！", $this->a_url("", "YiJiaYicms", "Column", "index", '', array("id")));
                                    }else{
                                            $this->ShowMsgC("操作错误(203)！");
                                    }
                            } else {
                                    $data["switch"] = "true";
                                    $data["addtime"] = time();
                                    $data["addadmin"] = adminid;
                                    if (M("column_list")->add($data)) {
                                            $this->ShowMsgC("操作成功！", $this->a_url("", "YiJiaYicms", "Column", "index", '', array("id")));
                                    } else {
                                            $this->ShowMsgC("操作错误(203)！");
                                    }
                            }
                            exit;
                }

                if ($upload == 1 && !empty($_FILES)) { //上传
                            $result = $this->uplodes($_FILES, date("YmdHis",thistime).$this->getRandChar(2),0, 0, 0, 'YiJiaYi/column');
                            if ($result[0] > 0) {
                                    exit(json_encode(array("error" => 1, "errortxt" => $result[1])));
                            }
                            exit(json_encode(array("error" => 0, "picurl" => $result[2],"type"=>$this->p_type)));
                }

                $admin_row = $this->GetOne("select * from `".PR."column_list` where md5(md5(id))='" . md5($id) . "' ");
                $this->assign($admin_row);

                if (!$id) {
                        $action = "add";
                        $title = " - 添加";
                } else {
                        $title = " - 修改";
                        $action = "edit";
                }
                $arr = array();
                $columnStr  = "";
                $column_result =$this->column2(0,0,$arr,0);
                foreach($column_result as $key=>$v){
                       if(!empty($admin_row["column_id"]) && $admin_row["column_id"] == $v["id"]){
                                $check = ' selected="selected" ';
                       }else{
                                $check = '';
                       }
                       $columnStr .= '<option '.$check.' value="'.$v["id"].'">'.$v["title"].'</option>'; 
                }
                $this->assign(array('ctitle'=>"栏目列表管理".$title,'action'=>$action,'columnStr'=>$columnStr));
                $this->veiws("Column","addup");  
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
                        if($this->GetOne("select id from `".PR."column_list` where md5(md5(id))='".md5($id)."' ")){
                                $row = $this->query("update `".PR."column_list` set $is_switch where md5(id) = '".$id."' ");
                                if($row == "false"){
                                        $this->ShowMsgC("操作失败(2)！"); 
                                }else{
                                        $this->ShowMsgC("",$this->a_url("","YiJiaYicms","Column","index",'',array("id","if")));
                                }
                        }
            }
    }
        
    public function del2(){
        $id = !empty($this->g_id)?$this->g_id:"";
        if(empty($id)){
                    $this->ShowMsgC("操作失败(1)！"); 
        }else{
                if($this->GetOne("select id from `".PR."column_list` where md5(md5(id))='".md5($id)."' ")){
                        $row = $this->query("update `".PR."column_list` set switch='del',deltime='".thistime."',deladmin='".adminid."' where md5(id) = '".$id."' ");
                        if($row == "false"){
                                $this->ShowMsgC("操作失败(2)！"); 
                        }else{
                                $this->ShowMsgC("删除成功！",$this->a_url("","YiJiaYicms","Column","index","",array("id")));
                        }
                }
        }
    }
    
    
    
    
    
    //栏目类型
    public function column(){
                $reuslt = $this->column2(0, 0,$arr, 1);
                $str ='';
                $url1 = $this->a_url("","YiJiaYicms","Column","is_switch","",array("id","if","position"));
                $url2 = $this->a_url("","YiJiaYicms","Column","column_addup","",array("id","if","position"));
                $url3 = $this->a_url("","YiJiaYicms","Column","del","",array("id","if","position"));
                $url4 = $this->a_url("","YiJiaYicms","Column","show_position","",array("id","position"));
                foreach($reuslt as $key=>$v){
                                $str .='<tr>'; 
                                $str .='<td>'.$v["id"].'</td>';

                                switch($v["attr"]){
                                        case 1:
                                            $attr ='&nbsp;&nbsp;<span style="color:#ccc">[ 单页 ]</span>';
                                            break;
                                        case 2:
                                            $attr ='&nbsp;&nbsp;<span style="color:#ccc">[ 列表 ]</span>';
                                            break;
                                        case 3:
                                            $attr ='&nbsp;&nbsp;<span style="color:#ccc">[ 图文 ]</span>';
                                            break;
                                        default:
                                            $attr="";
                                }

                                $str .='<td style="text-align: left; padding-left: 10px;">'.$v["title"].$attr.'</td>'; 
                                $url =  !empty($v["url"])?$v["url"]:"/";
                                $str .='<td style="text-align: left; padding-left: 10px;">'.$url.'</td>'; 
                                $site = $this->GetOne("select site from `".PR."site` where id=".$v["siteid"]." ");
                                $str .='<td>站点【'.$site["site"].'】</td>'; 
                                $str .='<td>'.$v["orderid"].'</td>';  


                                $butt ="";
                                if($v["switch"]=='true'){
                                    $butt .='<a href="'.$url1.'&if=false&id='.md5($v["id"]).'">停用</a>';
                                }else{
                                    $butt .='<a href="'.$url1.'&if=true&id='.md5($v["id"]).'">启用</a>';
                                }
                                $butt .='<a href="'.$url2.'&id='.md5($v["id"]).'">修改</a>';   
                                $butt .='<a onclick="confirms(\'确定要删除吗？\',\''.$url3.'&id='.md5($v["id"]).'\')">删除</a>';   

                                $show_position_arr = explode(",",$v["show_weizhi"]); 
                                if(in_array(1,$show_position_arr)){
                                       $position_title1 ='顶部禁用'; 
                                 }else{
                                       $position_title1 ='顶部启用'; 
                                 }
                                if(in_array(2,$show_position_arr)){
                                       $position_title2 ='左侧禁用'; 
                                 }else{
                                       $position_title2 ='左侧启用'; 
                                 }
                                if(in_array(3,$show_position_arr)){
                                       $position_title3 ='底部禁用'; 
                                 }else{
                                       $position_title3 ='底部启用'; 
                                 }
                                $butt .='<a href="'.$url4.'&position=1&id='.md5($v["id"]).'">'.$position_title1.'</a>'; 
                                $butt .='<a href="'.$url4.'&position=2&id='.md5($v["id"]).'">'.$position_title2.'</a>'; 
                                $butt .='<a href="'.$url4.'&position=3&id='.md5($v["id"]).'">'.$position_title3.'</a>'; 
                                $str .='<td class="action-butt">'.$butt.'</td>'; 
                                $str .='</tr>'; 
                }

                $this->a_url("add_url","YiJiaYicms","Column","column_addup");
                $title ="栏目类型";
                $this->assign(array("ctitle"=>$title,'keyworld'=> $keyworld,"str"=>$str));
                $this->veiws("Column","column"); 
    }
    
    public function column_addup(){
                $id     = !empty($this->g_id)?$this->g_id:"";
                $action = !empty($this->p_action)?$this->p_action:"";
                $upload = I("upload","");
        
                if($action && ($action == "add" || $action == "edit")){
                            $title                  = $this->p_title;
                            $pid                    = $this->p_pid;
                            $siteid                 = $this->p_siteid;
                            $attr                   = $this->p_attr;
                            $url                    = $this->p_url;
                            $pic                    = I("pic","");
                            $pic_arr                = I("pic_arr", "");
                            $content                = I("content","");
                            $seotitle               = $this->p_seotitle;
                            $keywords               = $this->p_keywords;
                            $description            = $this->p_description;
                            $orderid                = isset($this->p_orderid)?$this->p_orderid:0;

                            if(!$pid) $pid=0;
                            
                            if(!$title) $this->ShowMsgC("请输入栏目名称！");
                            
                            if(!$siteid) $siteid=0;
                           
                            if(!empty($pic_arr)){
                                    $pic_arr = join("|", $pic_arr); 
                            }else{
                                    $pic_arr = "";
                            }
                            
                            if($action == "edit"){
                                        $this->level(2,"column_addup_edit");//权限判断
                                        $id = $this->p_id;
                                        if(!$id){
                                             $this->ShowMsgC("操作错误(212)！");
                                        }
                                        $result = $this->query("update `".PR."column` set pid='$pid',title='$title',attr='$attr',content='$content',url='$url',pic='$pic',pic_arr='$pic_arr',seotitle='$seotitle',keywords='$keywords',description='$description',orderid='$orderid',uptime='".thistime."',upadmin='".adminid."' where id = $id ");
                                        if(!(string)$result){
                                                 $this->ShowMsgC("操作错误(203)！");
                                        }else{
                                                 $this->ShowMsgC("操作成功！", $this->a_url("", "YiJiaYicms", "Column", "column",'',array("id")));
                                        }
                            }else{
                                        $sql = "($pid,'$title','$attr','$content','$url','$pic','$pic_arr','$seotitle','$keywords','$description',$orderid,'true',".thistime.",".adminid.")";
                                        //exit("insert into`".PR."column`(pid,title,attr,content,url,pic,pic_arr,seotitle,keywords,description,orderid,switch,addtime,addadmin) values $sql");
                                        $result = $this->query("insert into`".PR."column`(pid,title,attr,content,url,pic,pic_arr,seotitle,keywords,description,orderid,switch,addtime,addadmin) values $sql");
                                        if(!(string)$result){
                                                $this->ShowMsgC("操作错误(203)！");
                                        }else{
                                                $this->ShowMsgC("操作成功！", $this->a_url("", "YiJiaYicms", "Column", "column",'',array("id")));
                                        }
                            }
                            exit;
                }

                if ($upload == 1 && !empty($_FILES)) { //上传
                            $result = $this->uplodes($_FILES, date("YmdHis",thistime).$this->getRandChar(2),0, 0, 0, 'YiJiaYi/column');
                            if ($result[0] > 0) {
                                    exit(json_encode(array("error" => 1, "errortxt" => $result[1])));
                            }
                            exit(json_encode(array("error" => 0, "picurl" => $result[2],"type"=>$this->p_type)));
                }

                $row = $this->GetOne("select * from `".PR."column` where md5(md5(id))='".md5($id)."' ");
                $this->assign($row);

                if(!$id){
                    $action="add";
                    $title = " - 添加";
                }else{
                    $title = " - 修改";
                    $action="edit";
                }
                
                $columnStr  = "";
                $column_result =$this->column2();
                $siteResult = $this->query("select * from `".PR."site` ");
                
                foreach($column_result as $key=>$v){
                       if(!empty($row["pid"]) && $row["pid"] == $v["id"]){
                                $check = ' selected="selected" ';
                       }else{
                                $check = '';
                       }
                       $columnStr .= '<option '.$check.' value="'.$v["id"].'">'.$v["title"].'</option>'; 
                }
                $this->assign(array('ctitle'=>"栏目类型".$title,'action'=>$action,'columnStr'=>$columnStr,'siteResult'=>$siteResult));
                $this->veiws("Column","column_addup");  
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
                    if($this->GetOne("select id from `".PR."column` where md5(md5(id))='".md5($id)."' ")){
                            $row = $this->query("update `".PR."column` set $is_switch where md5(id) = '".$id."' ");
                            if($row == "false"){
                                $this->ShowMsgC("操作失败(2)！"); 
                            }else{
                                $this->ShowMsgC("",$this->a_url("","YiJiaYicms","Column","column",'',array("id","if")));
                            }
                    }
            }
    }
        
    public function del(){
        $id         = !empty($this->g_id)?$this->g_id:"";
        if(empty($id)){
                    $this->ShowMsgC("操作失败(1)！"); 
        }else{
                    if($this->GetOne("select id from `".PR."column` where md5(md5(id))='".md5($id)."' ")){
                        $row = $this->query("update `".PR."column` set switch='del',deltime='".thistime."',deladmin='".adminid."' where md5(id) = '".$id."' ");
                        if($row == "false"){
                                $this->ShowMsgC("操作失败(2)！"); 
                        }else{
                                $this->ShowMsgC("删除成功！",$this->a_url("","YiJiaYicms","Column","column","",array("id")));
                        }
                    }
        }
    }
    
    public function show_position(){
         $id = I("id","");
         $position = I("position","");
         
         if(empty($id)){
            $this->ShowMsgC("操作失败(1)！"); 
         }else{
            if($result = $this->GetOne("select * from `".PR."column` where md5(md5(id))='".md5($id)."' ")){
                
                $show_position_arr = explode(",",$result["show_weizhi"]);
                if(!in_array($position,$show_position_arr)){
                    array_push($show_position_arr,$position);
                }else{
                   $key = array_search($position,$show_position_arr);
                   array_splice($show_position_arr, $key,1);
                }
                if(!empty($show_position_arr))
                    $join_arr =  join(",",$show_position_arr);
                else
                    $join_arr =""; 
                $row = $this->query("update `".PR."column` set show_weizhi='$join_arr',uptime='".thistime."',upadmin='".adminid."' where md5(id) = '".$id."' ");
                if($row == "false"){
                    $this->ShowMsgC("操作失败(2)！"); 
                }else{
                    $this->ShowMsgC("",$this->a_url("","YiJiaYicms","Column","column","",array("id")));
                }
            }
        }
         
    }
    
    
    
    
}