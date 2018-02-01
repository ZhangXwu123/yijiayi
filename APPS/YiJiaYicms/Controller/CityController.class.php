<?php

/* 友情链接
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YiJiaYicms\Controller;
use Think\Controller;
class CityController extends CommonController{
 
    public function __construct() {
        parent::__construct();
    }
    public function index(){
            $keyworld  = I("keyworld","");
            $sql       = "";
            if(!empty($keyworld)){
                  //$sql = " and title like '%$keyworld%' ";  
            }
            $str ='';
            $url1   = $this->a_url("","YiJiaYicms","City","is_switch",'',array("id","if"));
            $txt   =file_get_contents("city.txt");
            $reuslt = explode("|",$txt);
            foreach($reuslt as $key=>$v){
                        $str .='<tr>'; 
                        $v1   = explode(",",$v);
                        $str .='<td title="'.$v["title"].'" style="text-align: left; padding: 15px;">'.$v1[0].'</td>'; 
                        $str .='<td title="'.$v["title"].'" style="text-align: left; padding: 15px;">'.$v1[2].'</td>'; 
                      
                        $butt ="";
                        
                        if($v1[3]=="true"){
                             $butt .='<a href="'.$url1.'&if=false&id='.$v1[0].'">禁用</a>';
                         }else{
                             $butt .='<a href="'.$url1.'&if=true&id='.$v1[0].'">启用</a>';
                         }
                        $str .='<td class="action-butt">'.$butt.'</td>'; 
                        $str .='</tr>'; 
            }
           $title ="地区管理";
           $this->assign(array("ctitle"=>$title,'keyworld'=> $keyworld,"str"=>$str));
           $this->veiws("City","index"); 
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
                        if($this->GetOne("select id from `".PR."area` where id=".$id." ")){
                                    $result = $this->query("update `".PR."area` set $is_switch where id =".$id." ");
                                    if(!(string)$result){
                                            $this->ShowMsgC("操作失败(2)！"); 
                                    }else{
                                            $this->CreateCityJson(1);
                                            $this->ShowMsgC("",$this->a_url("","YiJiaYicms","City","index",'',array("id","if")));
                                    }
                        }
                        $this->ShowMsgC("操作失败(error)！"); 
            }
    }
    
    public function CreateCityJson($edit=0){
            $cityArr = array();
            $CityArr = $this->citylist(0,0,$cityArr,1);
            $folder_path .= BASE_PATH."/city.txt";
            $handle = fopen($folder_path,"a");
            $str ="";
            foreach($CityArr as $key=>$v){
                    if(empty($str)){
                        $fenge ="";
                    }else{
                        $fenge ="|";
                    }
                    $str .= $fenge.join(",",$v);
            }
            file_put_contents($folder_path," ");
            fwrite($handle,$str);
            fclose($handle);
            if(!$edit)
                $this->ShowMsgC("地区更新成功！");
    }
}

