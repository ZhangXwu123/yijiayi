<?php

/* 日志管理
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YiJiaYicms\Controller;
use Think\Controller;
class LogController extends CommonController{
 
    public function __construct() {
        parent::__construct();
    }
    public function index(){
           $keyworld    = I("keyworld","");
          
           $spanfile    = $this->getFile($keyworld);

           $title ="系统操作日志管理";
           $this->assign(array("ctitle"=>$title,'keyworld'=> $keyworld,"spanfile"=>$spanfile));
           $this->veiws("Log","index"); 
    }
    
    public function look(){
           $keyworld    = I("keyworld","");
           $file_code = str_replace("<?php", "", $this->getContent($keyworld));
           $file_code = str_replace("?>", "",$file_code);
           $file_code = str_replace("\n", "<br/>",$file_code);
           $title ="系统操作日志管理 -- 查看";
           $this->assign(array("ctitle"=>$title,'keyworld'=> $keyworld,"file_code"=>$file_code));
           $this->veiws("Log","look"); 
    }
    
    
       
    public function getContent($path=""){
        if(empty($path)){
            return ;
        }else{
            $handle = opendir($path);
            while(($fname = readdir($handle)) !== false){
                        if($fname != '.' && $fname != '..')
			{
                                if(is_dir("$path")){
                                    return ;
                                }else{
                                    return file_get_contents("$path");
                                    break;
                                }
			}
            }
        }
        return ;
    }
    
    public function getFile($path=""){
            if(empty($path)){
                    $path = BASE_PATH."log";
            }
                
            $span_file ="";
            $handle = opendir($path);
            $edit_url = $this->a_url("","YiJiaYicms","Log","look","",array("keyworld"));
            $k=1;
            while(($fname = readdir($handle)) !== false)
            {
			if($fname != '.' && $fname != '..')
			{
                                if(is_dir("{$path}/{$fname}")){
                                    $span_file .='<span style=" display: block;width: 100%; padding: 5px 0px; margin: 2px; ">FILE '.$k."： ".$fname.'</span>';
                                }else{
                                    $span_file .='<span style=" display: block;width: 100%; padding: 5px 0px; margin: 2px; ">FILE '.$k."： "."{$fname}".'<a href="'.$edit_url.'&keyworld='."{$path}/{$fname}".'" style="color:red; margin-left:35px;">查看</a></span>';
                                }
                                $k++;
			}
                        
            }
            closedir($handle);
            return $span_file;
    }
    
    
}

